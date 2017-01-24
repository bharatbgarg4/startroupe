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
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    
    public function handleFacebookCallback(Request $request)
    {
        $user = Socialite::driver('facebook')->user();
        $email=$user->getEmail();
        $logu=User::where('email',$email)->first();
        if(!is_null($logu)){
            Auth::login($logu);
        }
        else{
        $name=$user->getName();
        $data=['name'=>$name,'email'=>$email,'confirmation_code'=>Null];
        $user=User::create($data);
        Auth::login($user);
        Mail::queue('emails.notify',['user'=>$user],
                function($m){
                    $m->to('bharatbgarg4@gmail.com','Bharat Garg')
                    ->subject('Startroupe User Registered Via Facebook');
        });
        Mail::queue('emails.welcome',['user'=>$user],
                function($m) use ($user){
                    $m->to($user->email, $user->name)
                    ->subject('Welcome To Startroupe');
        });
        }
        return redirect('/');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    
    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();
        $email=$user->getEmail();
        $logu=User::where('email',$email)->first();
        if(!is_null($logu)){
            Auth::login($logu);
        }
        else{
        $name=$user->getName();
        $data=['name'=>$name,'email'=>$email,'confirmation_code'=>Null];
        $user=User::create($data);
        Auth::login($user);
        Mail::queue('emails.notify',['user'=>$user],
                function($m){
                    $m->to('bharatbgarg4@gmail.com','Bharat Garg')
                    ->subject('Startroupe User Registered Via Google');
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
