<?php

namespace App\Http\Controllers;

use App\User;
use App\Like;
use App\Folio;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

	public function __construct(){
		$this->middleware('admin', ['only' => ['create','store']]);
		$this->middleware('owner', ['only' => ['update','password','folio']]);
		$this->middleware('auth', ['only' => ['like','unlike']]);
	}

	public function create(){
		return view('dashboard.create_user');
	}

	public function store(UserCreateRequest $request){
		$input=$request->all();
		User::create($input);
		return redirect('dashboard/users')->with('status','User Created');
	}

	public function show(User $user){
		$liked=0;
		$images=Folio::where('user_id',$user->id)->where('type','image')->get();
		$videos=Folio::where('user_id',$user->id)->where('type','video')->get();
		$user->update(['viewed'=>Carbon::now(),'views'=>$user->views+1]);
		return view('pages.profile',compact('user','liked','images','videos'));
	}

	public function update(ProfileRequest $request,User $user){
		$input=$request->all();
		$excl=['views','likes', 'email', 'password','viewed','admin','editor'];
		foreach ($excl as $key => $f) {
			unset($input[$f]);
		}
		$input['married']=intval($input['married']);
		$input['travel']=intval($input['travel']);
		if($request->hasFile('imgUrl')){
			$imageName = Auth::user()->username.'-'.str_random(8).'.'.$request->file('imgUrl')->getClientOriginalExtension();
			$request->file('imgUrl')->move(
				base_path() . '/public/uploads/profile/',$imageName);
			$input['imgUrl']='/uploads/profile/'.$imageName;
		}
		if($request->hasFile('coverPic')){
			$imageName = Auth::user()->username.'-'.str_random(8).'.'.$request->file('coverPic')->getClientOriginalExtension();
			$request->file('coverPic')->move(
				base_path() . '/public/uploads/covers/',$imageName);
			$input['coverPic']='/uploads/covers/'.$imageName;
		}
		$user->update($input);
		return redirect('dashboard/'.$user->username.'/profile')->with('status','Profile Updated');
	}

	public function password(ChangePasswordRequest $request,User $user){
		$input=$request->all();
		$user->update(['password'=>bcrypt($input['password'])]);
		return redirect()->back()->with('status','Password Updated');
	}

	public function like(User $user){
		$count=Like::where('user_id',Auth::user()->id)->where('profile_id',$user->id)->count();
		if($count){
			return redirect()->back()->with('status-alert','Already Liked');
		}
		Like::create(['user_id'=>Auth::user()->id,'profile_id'=>$user->id]);
		$likes=Like::where('profile_id',$user->id)->count();
		$user->update(['likes'=>$likes]);
		return redirect()->back();
	}

	public function unlike(User $user){
		Like::where('user_id',Auth::user()->id)->where('profile_id',$user->id)->delete();
		$likes=Like::where('profile_id',$user->id)->count();
		$user->update(['likes'=>$likes]);
		return redirect()->back();
	}

	public function folio(User $user,Request $request){
		$input=$request->all();
		if($request->hasFile('images')){
			foreach ($input['images'] as $image) {
				$imageName = str_random(8).'.'.$image->getClientOriginalExtension();
				$image->move(
					base_path() . '/public/uploads/images/',$imageName);
				$url='/uploads/images/'.$imageName;
				Folio::create(['url'=>$url,'user_id'=>$user->id,'type'=>'image']);
			}
		}
		return redirect()->back();
	}

	public function getId($url){
		if(strpos($url,'embed')){
			$p=explode('embed/', $url);
		}
		if(strpos($url,'watch')){
			$p=explode('watch?v=', $url);
		}
		if(strpos($url,'youtu.be')){
			$p=explode('youtu.be/', $url);
		}
		return substr($p[1], 0, 11);
	}

	public function folioVideo(User $user,Request $request){
		$input=$request->all();
		if($input['url']){
			$url=$this->getId($input['url']);
			Folio::create(['url'=>$url,'user_id'=>$user->id,'type'=>'video']);
		}
		return redirect()->back();
	}
}
