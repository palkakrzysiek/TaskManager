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

Route::get('user/{id}', function($id){
	return "User #$id";
})->where('id', '\d+');

Route::get('users', function() {
//	$users = User::all();
//	foreach ($users as $user)
	return "Users: " . User::find(1)->name ;
});

Route::get('about', function() {
	return View::make('about')->with('number_of_users', User::count());
});
