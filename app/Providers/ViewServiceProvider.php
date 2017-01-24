<?php

namespace App\Providers;
use App\User;
use App\Message;
use App\Article;
use App\Discussion;
use App\Talent;
use App\Location;
use Auth;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.dashboard', function ($view) {
            $count['a']='b';
            if(Auth::user()->admin){
                $count['admins']=User::admin()->count();
                $count['editors']=User::editor()->count();
                $count['users']=User::user()->count();
                // $count['messages']=Message::all()->count();
                // $count['articles']=Article::all()->count();
                // $count['discussions']=Discussion::all()->count();
            }
            // if(Auth::user()->admin or Auth::user()->editor){
                // $count['user_articles']=Auth::user()->articles->count();
            // }
            // if(Auth::check()){
                // $count['user_discussions']=Auth::user()->discussions->count();

            // }
            // $select_talent=Talent::lists('title', 'id')->toArray();
            // $select_location=Location::lists('title', 'id')->toArray();
            $view->with('count',$count);
            // $view->with('select_talent',$select_talent);
            // $view->with('select_location',$select_location);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
