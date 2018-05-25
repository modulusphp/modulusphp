<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/', function() {
  view('welcome');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| The following routes have been disabled. Feel free to enable them.
|
|--------------------------------------------------------------------------
|
| Route::group(['middleware' => 'auth', 'auth' => true], function() {
|
|    Route::get('/login', 'LoginController@index');
|    Route::post('/login', 'LoginController@index');
|
|    Route::get('/logout', 'LoginController@logout');
|
|    Route::get('/register', 'RegisterController@index');
|    Route::post('/register', 'RegisterController@store');
|
|    Route::get('/password/forgot', 'PasswordController@forgot');
|    Route::post('/password/forgot', 'PasswordController@forgot');
|
|    Route::post('/password/reset', 'PasswordController@reset');
|    Route::get('/password/reset', 'PasswordController@reset');
|    Route::get('/password/reset/{token}', 'PasswordController@reset');
|
| });
|
|---------------------------------------------------------------------------
*/