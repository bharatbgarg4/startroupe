<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->bind('user',function($user){
            return \App\User::where('username',$user)->firstorfail();
        });
        $router->bind('link',function($link){
            return \App\Link::where('id',$link)->firstorfail();
        });
        $router->bind('job',function($job){
            return \App\Job::where('id',$job)->firstorfail();
        });
        $router->bind('talent',function($talent){
            return \App\Talent::where('slug',$talent)->firstorfail();
        });
        $router->bind('location',function($location){
            return \App\Location::where('slug',$location)->firstorfail();
        });
        $router->bind('article',function($article){
            return \App\Article::where('slug',$article)->firstorfail();
        });
        $router->bind('discussion',function($discussion){
            return \App\Discussion::where('slug',$discussion)->firstorfail();
        });
        $router->bind('discussioncomment',function($discussioncomment){
            return \App\Discussioncomment::where('id',$discussioncomment)->firstorfail();
        });
        $router->bind('articlecomment',function($articlecomment){
            return \App\Articlecomment::where('id',$articlecomment)->firstorfail();
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
