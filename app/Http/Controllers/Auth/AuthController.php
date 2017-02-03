<?php

namespace App\Http\Controllers\Auth;
use Mail;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/
	protected $redirectPath = 'dashboard';
	protected $loginPath = 'signin';
	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'username' => 'required|max:255|unique:users',
			'password' => 'required',
			]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */

	protected function create(array $data)
	{
		$confirmation_code=str_random(60);
		if(env('ENABLE_RECAPTCHA')){
			$captcha=$data['g-recaptcha-response'];
			$respon=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".env('GOOGLE_RECAPTCHA_SECRET')."&response=".$captcha);
			$respon=json_decode($respon,true);
			if(!$respon['success']){
				return redirect()->back()->with('status-danger','Spam');
			}
		}

		$editor=intval($data['type']);
		if(!$editor){
			$data['artist']=intval($data['artist']);
		}
		$data['editor']=$editor;
		$data['confirmation_code']=$confirmation_code;
		$data['password']=bcrypt($data['password']);
		$user=User::create($data);
		Mail::queue('emails.verify', ['token' => $confirmation_code], function($message) use ($user){
			$message->to($user->email, $user->username)
			->subject('Verify Your email');
		});
		Mail::queue('emails.notify',['user'=>$user],
			function($m){
				$m->to('bharatbgarg4@gmail.com','Bharat Garg')
				->subject(env('SITE_NAME').' User Register Notification');
			});
		return $user;		
	}
}
