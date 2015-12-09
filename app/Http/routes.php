<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/* ODRADITI U ADMIN CONTROLLER */
Route::get('/admin', function() {
	return view('login');
});

Route::post('/admin', function() {

	if (Auth::attempt([
		'email' => Input::get('email'),
		'password' => Input::get('password'),
		'role_id'  => 1
		]))
		return redirect('/admin/vice');

		Session::flash('message', 'Unešeni podaci nisu ispravni.');
		return back();
});
/* ODRADITI U ADMIN CONTROLLER */


Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
	Route::get('/vice', function() {
		return "VICE";
	});
});

Route::get('/', 'IndexController@index');
Route::get('/callback', 'IndexController@getUserFromRedirect');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/welcome', 'IndexController@showWelcome');
	Route::get('/dashboard', function() {
		Auth::logout();
		abort(503);
	});
});