<?php

if(env('HTTPS')){
	URL::forceSchema('https');
}
Route::get('coming-soon', 'PageController@coming');
Route::post('coming', 'PageController@comingsend');
if(env('SOON')){
	Route::get('/{any}', function ($any) {
		return redirect('coming-soon');
	})->where('any', '.*');
}
Route::get('search/{type}', array(
	'as'    =>  'search',
	'uses'  =>  'PageController@searchJobs'
	));

Route::get('/', 'PageController@index');

Route::post('sms', 'PageController@sms');
Route::get('signin', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('signout', 'Auth\AuthController@getLogout');
Route::get('signup', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('login/{social}', 'SocialController@redirectTo');
Route::get('facebook', 'SocialController@handleCallback');
Route::get('google', 'SocialController@handleCallback');

Route::get('register/verify/{token}', 'PageController@verify');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('dashboard',"DashboardController@index");
Route::get('dashboard/jobs',"DashboardController@jobs");
Route::get('dashboard/applied',"DashboardController@applied");
Route::post('apply/{job}','JobController@apply');
Route::get('dashboard/images','ImageController@index');
Route::post('dashboard/images','ImageController@store');

Route::get('dashboard/autocomplete',"AdminController@autocomplete");
Route::get('dashboard/autoreset',"AdminController@autoreset");
Route::get('dashboard/word/{act}/{id}',"AdminController@wordAct");
Route::get('dashboard/admins',"AdminController@admins");
Route::get('dashboard/editors',"AdminController@editors");
Route::get('dashboard/users',"AdminController@users");
Route::get('dashboard/{user}/delete',"AdminController@user_delete");
Route::get('dashboard/{user}/makeEditor',"AdminController@makeEditor");
Route::get('dashboard/{user}/makeUser',"AdminController@makeUser");
Route::get('dashboard/messages',"AdminController@messages");
Route::get('dashboard/message/{message}/delete',"AdminController@delete_message");
Route::get('dashboard/articles',"AdminController@articles");
Route::get('dashboard/discussions',"AdminController@discussions");

Route::get('dashboard/{user}/articles',"DashboardController@articles");
Route::get('dashboard/{user}/discussions',"DashboardController@discussions");

Route::get('dashboard/user/create',"ProfileController@create");
Route::post('dashboard/user',"ProfileController@store");
Route::get('dashboard/{user}/profile',"DashboardController@profile");
Route::patch('dashboard/{user}','ProfileController@update');
Route::patch('dashboard/{user}/password','ProfileController@password');

Route::get('profile/{user}',"ProfileController@show");
Route::get('profile/{user}/like',"ProfileController@like");
Route::get('profile/{user}/unlike',"ProfileController@unlike");

Route::post('folio/{user}',"ProfileController@folio");
Route::post('folio/video/{user}',"ProfileController@folioVideo");

Route::post('talent/save', 'TalentController@save');
Route::post('location/save', 'TalentController@saveLocation');
Route::get('talent/delete/{talent}', 'TalentController@delete');
Route::get('location/delete/{location}', 'TalentController@deleteLocation');

Route::post('seolink/save', 'PageController@createLink');
Route::post('seolink/{link}/delete', 'PageController@deleteLink');

Route::post('search', 'PageController@search');

Route::get('job/{job}', 'JobController@show');
Route::post('job/save', 'JobController@save');
Route::get('job/delete/{job}', 'JobController@delete');

Route::get('articles','ArticleController@index');
Route::get('article/create','ArticleController@create');
Route::get('article/{article}','ArticleController@show');
Route::post('article','ArticleController@store');
Route::get('article/{article}/edit','ArticleController@edit');
Route::patch('article/{article}','ArticleController@update');
Route::get('article/{article}/delete','ArticleController@delete');

Route::get('discussions','DiscussionController@index');
Route::get('discussion/create','DiscussionController@create');
Route::get('discussion/{discussion}','DiscussionController@show');
Route::post('discussion','DiscussionController@store');
Route::get('discussion/{discussion}/delete','DiscussionController@delete');

Route::post('message','PageController@sendMessage');

Route::post('article/{article}/comment','CommentController@article');
Route::get('article/{article}/comment/{articlecomment}/delete','CommentController@article_delete');
Route::post('discussion/{discussion}/comment','CommentController@discussion');
Route::get('discussion/{discussion}/comment/{discussioncomment}/delete','CommentController@discussion_delete');


Route::get('{type}', 'TalentController@all');
Route::get('{type}/{talent}', 'TalentController@talent');
Route::get('{type}/all/{location}', 'TalentController@location');
Route::get('{type}/{talent}/{location}', 'TalentController@filter');