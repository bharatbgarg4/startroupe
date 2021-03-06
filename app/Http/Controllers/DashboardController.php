<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Location;
use App\Talent;
use App\Offer;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MobileRequest;
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

	public function mobile(){
		return view('dashboard.mobile');
	}

	public function storemobile(MobileRequest $request){
		$input=$request->all();
		$mobile=$input['mobile'];
		if($mobile==Auth::user()->mobile){
			return redirect()->back()->with('status-alert','Same No. not allowed');
		}
		$otp = substr(str_shuffle("0123456789"), 0, 6);
		$msg="Your verification code for StarTroupe is ".$otp;
		$url="http://bhashsms.com/api/sendmsg.php?user=mindvis&pass=BulkSMS1234&sender=MINDVI&phone=".$mobile."&text=".urlencode($msg)."&priority=ndnd&stype=normal";
		$respon=file_get_contents($url);
		Auth::user()->update(['vmobile'=>$mobile,'otp'=>$otp]);
		return redirect()->back()->with('status',"Verifiction code sent to your Mobile No.");
	}

	public function resendOtp(){
		$otp=Auth::user()->otp;
		if(!$otp){
			return redirect()->back()->with('status-alert','No Request Pending');
		}
		$mobile=Auth::user()->vmobile;
		$msg="Your verification code for StarTroupe is ".$otp;
		$url="http://bhashsms.com/api/sendmsg.php?user=mindvis&pass=BulkSMS1234&sender=MINDVI&phone=".$mobile."&text=".urlencode($msg)."&priority=ndnd&stype=normal";
		echo($url);
		$respon=file_get_contents($url);
		return redirect()->back()->with('status',"Verification Code Sent");
	}

	public function verifymobile(Request $request){
		$input=$request->all();
		if($input['otp']==Auth::user()->otp){
			$mobile=Auth::user()->vmobile;
			Auth::user()->update(['otp'=>null,'mobile'=>$mobile,'vmobile'=>null]);
			return redirect('dashboard')->with('status','Mobile No. Updated');
		}
		else{
			return redirect()->back()->with('status-alert','Try again');
		}
	}
}