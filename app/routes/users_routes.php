<?php

// Auth required
Route::group(array('before' => 'auth'), function () {
    Route::get('users/{user}', function($user) {
        return View::make('users.single')
            ->with('user', $user);
    });

    Route::get('users', function() {
        $users = User::all();//Company::find(Auth::user()->getCompanyId())->getUsers();
        return View::make('users.index')
            ->with('users', $users);
    });

    Route::get('users/groups/{name}', function($name){
        $group = Group::whereName($name)->with('users')->first();
        return View::make('users.index')
            ->with('group', $group)
            ->with('users', $group->users);
    });
    Route::get('users/create', function () {
        $user = new User;
        return View::make('users.edit')
            ->with('user', $user)
            ->with('method', 'post');
    });

    Route::get('users/{user}/edit', function ($user) {
        return View::make('users.edit')
            ->with('user', $user)
            ->with('method', 'put');
    });

    Route::get('users/{user}/delete', function ($user) {
        return View::make('users.edit')
            ->with('user', $user)
            ->with('method', 'delete');
    });
    Route::group(array('before' => 'csrf'), function () {
        Route::post('users', function () {
            $user = User::create(Input::all);
            return Redirect::to('users/' . $user->id)
                ->with('message', "Successfully created page!");
        });

        Route::put('users/{user}', function (User $user) {
            if (Auth::user()->canEditProfile($user)) {
                //$user->update(Input::all());
                $user->update(array(
                    'name' => Input::get('name'),
                    'surname' => Input::get('surname'),
                    'specialities' => Input::get('specialities'),
                    'group_id' => Input::get('group_id'),
                    'position_id' => Input::get('position_id'),
                    ));
                if(Input::get('password') != '' and Auth::user()->canChangeProfilePass($user)) {
                    $user->update(array(
                        'password' => Hash::make(Input::get('password')),
                    ));
                }
                return Redirect::to('users/' . $user->id)
                    ->with('message', "Successfully updated page!");
            } else {
                return Redirect::to('users/' . $user->id)
                    ->with('message', "Unauthorized operation");
            }
        });

        Route::delete('users/{user}', function (User $user) {
            $user->delete();
            return Redirect::to('users')
                ->with('message', "Successfully deleted page!");
        });
    });
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
    $positions = position::all();
    if(count($positions) > 0){
        $position_options = array_combine($positions->lists('id'),
            $positions->lists('name'));
    } else {
        $position_options = array(null, 'Unspecified');
    }
    $view->with('group_options', $group_options)->with('position_options', $position_options);
});