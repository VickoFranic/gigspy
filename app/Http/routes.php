<?php

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'IndexController@indexPage');
Route::get('/userData', 'IndexController@loginViaFacebook');
Route::get('/admin', 'AdminController@showLoginForm');
Route::post('/admin', 'AdminController@loginRequest');


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function() {

	Route::get('/welcome', 'IndexController@showWelcome');
	Route::get('/logout', 'IndexController@logoutUser');
	Route::get('/dashboard', 'UserController@userDashboard');
	Route::get('/pages', 'PageController@savePages');
	Route::get('/pageData/{page_id}', 'PageController@pageData');
});


/*
|--------------------------------------------------------------------------
| Administrator Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'admin'], function() {

	Route::get('/admin/dashboard', 'AdminController@adminDashboard');
	Route::get('/admin/users', 'AdminController@usersTable');
});