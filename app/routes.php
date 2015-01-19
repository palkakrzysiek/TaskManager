<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::model('user', "User");
Route::model('group', "Group");
Route::model('project', "Project");
Route::model('task', "Task");

if (Request::is('users*'))
{
	require __DIR__.'/routes/users_routes.php';
}

Route::get('/', function()
{
	return View::make('about')
		->with('number_of_users', User::count());
});

Route::get('about', function() {
	return View::make('about')->with('number_of_users', User::count());
});


Route::get('login', function() {
	return View::make('login');
});

Route::post('login', function(){
	if(Auth::attempt(Input::only('email', 'password'))) {
		return Redirect::intended('/');
	} else {
		return Redirect::back()
			->withInput()
			->with('error', "Invalid credentials");
	}
});

Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('/')
		->with('message', 'You are now logged out');
});
