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

Route::get('/', function() {
	return Redirect::to('cats');
});

Route::get('cats', function() {
	return "All cats";
});

Route::get('cats/{id}', function($id) {
	return "Cat #$id";
})->where('id', '\d+');

Route::get('about', function() {
	return View::make('about')->with('number_of_cats', 9000);
});
