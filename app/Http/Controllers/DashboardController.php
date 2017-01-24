<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Location;
use App\Talent;
use App\Offer;

class DashboardController extends Controller
{
	public function __construct(){
		$this->middleware('editor', ['only' => ['jobs']]);
		$this->middleware('auth', ['only' => ['index','applied']]);
		$this->middleware('owner', ['only' => ['articles','discussions','profile']]);
	}

	public function index(){
		if(Auth::user()->editor){
			$latest=User::where('editor',false)->latest()->take(4)->get();
			$rating=User::where('editor',false)->orderBy('likes','desc')->take(4)->get();
			$viewed=User::where('editor',false)->orderBy('viewed','desc')->take(4)->get();
			$fav=User::where('editor',false)->where('talent_id',Auth::user()->talent_id)->orderBy('likes','desc')->take(4)->get();
			return view('dashboard.business',compact('latest','rating','viewed','fav'));
		}
		if(Auth::user()->admin){
			return redirect('dashboard/users');
		}
		return redirect('dashboard/'.Auth::user()->username.'/profile');
	}

	public function profile(User $user){
		$select_location=Location::lists('title', 'id')->toArray();
		$select_talent=Talent::lists('title', 'id')->toArray();
		return view('dashboard.profile',compact('user','select_talent','select_location'));
	}

	public function jobs(){
		$jobs=Auth::user()->jobs()->latest()->get();
		$select_location=Location::lists('title', 'id')->toArray();
		$select_talent=Talent::lists('title', 'id')->toArray();
		return view('dashboard.jobs',compact('jobs','select_talent','select_location'));
	}

	public function applied(){
		$offers=Offer::where('user_id',Auth::user()->id)->get();
		return view('dashboard.applied',compact('offers'));
	}

	public function articles(User $user){
		$articles=$user->articles()->latest()->get();
		return view('dashboard.articles',compact('articles'));
	}

	public function discussions(User $user){
		$discussions=$user->discussions()->latest()->get();
		return view('dashboard.discussions',compact('discussions'));
	}
}