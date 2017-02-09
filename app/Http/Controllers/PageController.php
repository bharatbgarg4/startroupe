<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Message;
use App\Article;
use App\User;
use App\Talent;
use App\Job;
use App\Users;
use App\Location;
use App\Link;
use Input;
use App\Http\Requests\LinkRequest;
use App\Http\Requests\MessageRequest;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
	public function index(){
		if(Auth::user()){
			return redirect('dashboard');
		}
		$users=User::all()->take(8);
		$talents=Talent::all()->take(4);
		$links=Link::all();
		$select_talent=Talent::lists('title', 'slug')->toArray();
		$select_location=Location::lists('title', 'slug')->toArray();
		return view('pages.index',compact('users','talents','links','select_talent','select_location'));
	}

	public function createLink(LinkRequest $request){
		$input=$request->all();
		Link::create($input);
		return redirect()->back()->with('status','Link Created');
	}

	public function comingsend(Request $request){
		$user=$request->all();
		// dd($user);
		if($user['name']){
			if($user['email']){
				Mail::queue('emails.invite',['user'=>$user],
					function($m){
						$m->to('bharatbgarg4@gmail.com','Bharat Garg')
						->cc('kalra.parampreetsingh@gmail.com','parampreet singh kalra')
						->cc('himanshu.vasistha@gmail.com','himanshu vasistha')
						->subject(env('SITE_NAME').' User Register Notification');
					});
			}
		}
		return redirect('coming-soon');
	}

	public function coming(){
		return view('pages.coming');
	}


	public function search(Request $request){
		$input=$request->all();
		// dd($input);
		$talent=$input['talent'];
		$location=$input['location'];
		$type='jobs';
		if(array_key_exists('type_talent',$input)){
			$type='talent';
		}
		if($location=='all'){
			if($talent=='all'){
				$url='/'.$type;
			}
			else{
				$url='/'.$type.'/'.$talent;
			}
		}
		else{
			$url='/'.$type.'/'.$talent.'/'.$location;
		}
		return redirect($url);
	}

	public function deleteLink(Link $link){

		return redirect()->back()->with('status-danger','Link Deleted');
	}

	public function talent(Talent $talent){
		$users=$talent->users->take(8);
		$talents=Talent::all();
		return view('pages.index',compact('users','talents'));
	}

	public function sendMessage(MessageRequest $request){
		$input=$request->all();
		Message::create($input);
		return redirect('/')->with('status','Message Sent');
	}

	public function searchJobs($type){
		if (Input::has('query')) {
			// $talents=Talent::all();
			// $locations=Location::all();
			$select_talent=Talent::lists('title', 'id')->toArray();
			$select_location=Location::lists('title', 'id')->toArray();
			$location=0;
			$talent=0;
			$users=0;
			$jobs=0;
			$query = Input::get('query');
			if($type=='talent'){
				$search1=User::where('name', 'LIKE', "%$query%")->get();
				$search2=User::where('bio', 'LIKE', "%$query%")->get();
				$users=$search2->merge($search1);
			}
			if($type=='jobs'){
				$search1=Job::where('title', 'LIKE', "%$query%")->get();
				$search2=Job::where('content', 'LIKE', "%$query%")->get();
				$jobs=$search2->merge($search1);
			}
			return view('talent.index',compact('type','jobs','users','select_talent','select_location','talent','location','query'));
		}
		else{
			return redirect('/');
		}
	}

	public function verify($token){
		if(!$token){
			return redirect('404');
		}
		$user=User::where('confirmation_code',$token)->firstorfail();
		$user->is_confirmed=true;
		$user->confirmation_code=null;
		$user->save();
		Mail::send('emails.welcome',['user'=>$user],
			function($m) use ($user){
				$m->to($user->email, $user->username)
				->subject('Welcome To '.env('SITE_NAME'));
			});
		return redirect('/')->with('status','Your Email have been verified. You can now login.');
	}
}
