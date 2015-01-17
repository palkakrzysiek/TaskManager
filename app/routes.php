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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('users/{id}', function($id) {
	$user = User::find($id);
	return View::make('users.index')
		->with('user', $user);
});

Route::get('users', function() {
	$users = User::all();
	return View::make('users.index')
		->with('users', $users);
});

Route::get('about', function() {
	return View::make('about')->with('number_of_users', User::count());
});

Route::get('users/groups/{name}', function($name){
	$group = Group::whereName($name)->with('users')->first();
	return View::make('users.index')
		->with('group', $group)
		->with('users', $group->users);
});
