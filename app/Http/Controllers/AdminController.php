<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Message;
use App\Word;
use App\User;
use App\Location;
use App\Talent;
use App\Article;
use App\Job;
use App\Discussion;

class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('admin');
	}

	public function merger($words,$hold){
		$hold=explode(' ', $hold);
		return array_merge($words,$hold);
	}

	public function autocomplete(){
		$words=Word::where('valid',1)->orderBy('count','desc')->get();
		$reject=Word::where('valid',0)->orderBy('count','desc')->get();
		// dd($words->toArray());
		return view('dashboard.autocomplete',compact('words','reject'));
	}

	public function manage(){
		$locations=Location::all();
		$talents=Talent::all();
		return view('dashboard.manage',compact('talents','locations'));
	}

	public function wordAct($act,$id){
		$word=Word::where('id',$id)->firstOrFail();
		$word->valid=0;
		if($act=='restore'){
			$word->valid=1;
		}
		$word->update();
		return redirect()->back();
	}
	public function autoreset(){
		$words=[];
		$reject=[];
		foreach(Talent::all() as $talent){
			$words=$this->merger($words,$talent->title);
		}
		foreach(Location::all() as $loc){
			$words=$this->merger($words,$loc->title);
		}
		foreach(User::all() as $a){
			$words=$this->merger($words,$a->name);
			$words=$this->merger($words,$a->bio);
		}
		foreach(Job::all() as $a){
			$words=$this->merger($words,$a->title);
			$words=$this->merger($words,$a->content);
		}
		$words = array_map('strtolower', $words);
		$words=array_count_values($words);
		foreach ($words as $word => $count){
			$a=Word::where('word',$word)->count();
			if($a){
				$w=Word::where('word',$word)->first();
				$w->update(['word'=>$word,'count'=>$count]);
			}
			else{
				Word::create(['word'=>$word,'count'=>$count]);
			}
		}
		return redirect()->back();
	}

	public function users(){
		$users=User::user()->get();
		return view('dashboard.users',compact('users'));
	}

	public function editors(){
		$users=User::editor()->get();
		return view('dashboard.editors',compact('users'));
	}

	public function admins(){
		$users=User::admin()->get();
		return view('dashboard.admins',compact('users'));
	}
	public function user_delete(User $user){
		if($user->admin){
			return redirect()->back()->with('status-alert','Admin can not be Deleted');
		}
		$user->delete();
		return redirect()->back()->with('status-danger','User Deleted');
	}

	public function makeEditor(User $user){
		$user->update(['editor'=>true]);
		return redirect('dashboard/editors')->with('status','User Assigned Editor');
	}

	public function makeUser(User $user){
		$user->update(['editor'=>false]);
		return redirect('dashboard/users')->with('status-alert','Editor unassigned to User');
	}

	public function messages(){
		$messages=Message::latest()->get();
		return view('dashboard.messages',compact('messages'));
	}

	public function delete_message($message){
		Message::where('id',$message)->firstOrFail()->delete();
		return redirect()->back()->with('status-danger','Message Deleted');
	}

	public function articles(){
		$articles=Article::latest()->get();
		return view('dashboard.articles',compact('articles'));
	}
	public function discussions(){
		$discussions=Discussion::latest()->get();
		return view('dashboard.discussions',compact('discussions'));
	}
}
