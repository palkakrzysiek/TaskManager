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

Route::get('/', function()
{
	return View::make('about')
		->with('number_of_users', User::count());
});

Route::get('users/{user}', function($user) {
	return View::make('users.single')
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

Route::get('users/create', function() {
	$user = new User;
	return View::make('users.edit')
		->with('user', $user)
		->with('method', 'post');
});

Route::get('users/{user}/edit', function($user) {
	return View::make('users.edit')
		->with('user', $user)
		->with('method', 'put');
});

Route::get('users/{user}/delete', function($user) {
	return View::make('users.edit')
		->with('user', $user)
		->with('method', 'delete');
});

Route::post('users', function() {
	$user = User::create(Input::all);
	return Redirect::to('users/' . $user->id)
		->with('message', "Successfully created page!");
});

Route::put('users/{user}', function(User $user) {
	$user->update(Input::all());
	return Redirect::to('users/' . $user->id)
		->with('message', "Successfully updated page!");
});

Route::delete('users/{user}', function(User $user) {
	$user->delete();
	return Redirect::to('users')
		->with('message', "Successfully deleted page!");
});

View::composer('users.edit', function($view)
{
	$groups = Group::all();
	if(count($groups) > 0){
		$group_options = array_combine($groups->lists('id'),
			$groups->lists('name'));
	} else {
		$group_options = array(null, 'Unspecified');
	}
	$view->with('group_options', $group_options);
});


