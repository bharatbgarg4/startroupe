<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Owner
{

    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect('signin');
        }
        if(Auth::user()->admin){
            return $next($request);
        }
        $article=$request->route('article');
        $user=$request->route('user');

        if($article){
            if(!(Auth::user()->id==$article->user_id)){
                return redirect()->back()->with('status-alert','Not Authorised');
            }
            if(Auth::user()->id==$article->user_id){
                return $next($request);
            }
        }

        if($user){
            if(!(Auth::user()->id==$user->id)){
                return redirect()->back()->with('status-alert','Not Authorised');
            }
            if(Auth::user()->id==$user->id){
                return $next($request);
            }
        }
    }
}
