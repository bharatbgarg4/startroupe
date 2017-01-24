<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
{
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect('signin');
        }
        else if(Auth::user()->admin){
            return $next($request);
        }
        else{
            return redirect('dashboard')->with('status-alert','Not Authorised');
        }
    }
}
