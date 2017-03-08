<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Mail;

class SocialController extends Controller
{
    public function redirectTo($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleCallback(Request $request)
    {
        $social=$request->path();
        $user = Socialite::driver($social)->user();
        $email=$user->getEmail();
        $logu=User::where('email',$email)->first();

        if(!is_null($logu)){
            Auth::login($logu);
        }
        else{
        $name=$user->getName();
        $data=['name'=>$name,'email'=>$email,'token'=>null];
        $data['username']=str_slug($data['name']).'-'.str_random(8);
        $data['password']=bcrypt(str_random(12));
        $user=User::create($data);
        Auth::login($user);
        Mail::queue('emails.notify',['user'=>$user],
                function($m){
                    $m->to('bharatbgarg4@gmail.com','Bharat Garg')
                    ->subject('Startroupe User Registered Via Social');
        });
        Mail::queue('emails.welcome',['user'=>$user],
                function($m) use ($user){
                    $m->to($user->email, $user->name)
                    ->subject('Welcome To Startroupe');
        });
        }
        return redirect('/');
    }
}
