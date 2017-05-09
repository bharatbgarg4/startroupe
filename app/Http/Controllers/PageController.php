<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Message;
use App\Article;
use App\User;
use App\Bird;
use App\Talent;
use App\Job;
use App\Users;
use App\Location;
use App\Link;
use Input;
use Mail;

use App\Http\Requests\MessageRequest;
use App\Http\Controllers\Controller;
use App\Word;

class PageController extends Controller
{
	public function autocomplete(){
		$words=Word::where('valid',1)->select('word','count')->get();
		return response()->json($words);
	}

	public function comingsend(Request $request){
		// dd(Bird::all()->toArray());
		// dd(User::all()->toArray());
		$user=$request->all();
		$validator = Validator::make($user, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}
		$user['username']=str_slug($user['name']).'-'.str_random(8);
		$user['password']=str_random(12);
		Bird::create($user);
		$user['password']=bcrypt($user['password']);
		$user=User::create($user);
		Mail::queue('emails.welcome',['user'=>$user],
			function($m) use ($user){
				$m->to($user->email, $user->name)
				->subject('Welcome To Startroupe');
			});
		Mail::queue('emails.invite',['user'=>$user],
			function($m){
				$m->to('bharatbgarg4@gmail.com','Bharat Garg')
				->cc('kalra.parampreetsingh@gmail.com','parampreet singh kalra')
				->cc('himanshu.vasistha@gmail.com','himanshu vasistha')
				->subject(env('SITE_NAME').' User Register Notification');
			});
		return redirect('coming-soon')->with('status','Please check your email for more details');
	}

	public function index(){
		if(Auth::user()){
			return redirect('dashboard');
		}
		$talents=Talent::all()->take(4);
		$links=Link::all();
		$hover=1;
		return view('pages.index',compact('talents','links','hover'));
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

	public function autosearch(Request $request){
		$input=$request->all();
		$type='jobs';
		if(array_key_exists('type_talent',$input)){
			$type='talent';
		}
		return redirect('/search/'.$type.'?query='.$input['word']);
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
		$user=User::where('token',$token)->firstorfail();
		$user->token=null;
		$user->save();
		Mail::send('emails.welcome',['user'=>$user],
			function($m) use ($user){
				$m->to($user->email, $user->username)
				->subject('Welcome To '.env('SITE_NAME'));
			});
		return redirect('/')->with('status','Your Email have been verified. You can now login.');
	}

	public function sms2(Request $request){
		$input=$request->all();
		$username = urlencode('info@geekvis.com');
		$hash = urlencode('a1f71a8bad539afc0afc7edc7174112efbafddcb710d57d141dd1387a4960f11');
		
			// Message details
		$numbers = urlencode($input['mobile']);
		$sender = urlencode('Startroupe');
		$message = rawurlencode($input['message']);
		
			// Prepare data for POST request
		$data = 'username=' . $username . '&hash=' . $hash . '&numbers=' . $numbers . "&sender=" . $sender . "&message=" . $message;
		
			// Send the GET request with cURL
		$ch = curl_init('http://api.txtlocal.com/send/?' . $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		dd($response);
	}

	public function sms(Request $request){
		$input=$request->all();
		$mobile=$input['mobile'];
		$otp = substr(str_shuffle("0123456789"), 0, 4);
		$msg="Your verification code for Startroupe is ".$otp;
		$url="http://bhashsms.com/api/sendmsg.php?user=startroupe_12&pass=Cbieu1234&sender=BHASH&phone=".$mobile."&text=".urlencode($msg)."&priority=ndnd&stype=normal";
		$respon=file_get_contents($url);
		dd($respon);
	}

	public function sms1(Request $request){
		$input=$request->all();
		$username = 'info@geekvis.com';
		$hash = 'a1f71a8bad539afc0afc7edc7174112efbafddcb710d57d141dd1387a4960f11';
		$ak = 'FFEQ3PwfoaM-qMN3eUSLXXJ8BXk5lIcXtMkzgWX8gQ';
		$numbers = array($input['mobile']);
		$sender = urlencode('Startroupe');
		$message = rawurlencode($input['message']);

		$numbers = implode(',', $numbers);
		$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

			// Send the POST request with cURL
		$ch = curl_init('http://api.txtlocal.com/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		dd($response);
	}
}
