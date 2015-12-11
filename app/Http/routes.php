<?php

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'IndexController@index');
Route::get('/callback', 'IndexController@getUserFromRedirect');
Route::get('/admin', 'AdminAreaController@showLoginForm');
Route::post('/admin', 'AdminAreaController@loginRequest');


/*
|--------------------------------------------------------------------------
| Administrator Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'admin'], function() {

	Route::get('/admin/dashboard', 'AdminAreaController@AdminDashboard');
	Route::get('/admin/users', 'AdminAreaController@usersTable');
});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function() {

	Route::get('/welcome', 'IndexController@showWelcome');
	Route::get('/logout', 'IndexController@logoutUser');

	Route::get('/dashboard', function() {
		abort(503);
	});
});