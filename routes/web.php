<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::group(['middleware' => 'guest', 'auth' => true], function() {

  Route::get('/login', 'LoginController@show');
  Route::post('/login', 'LoginController@login');

  Route::get('/logout', 'LoginController@logout');

  Route::get('/register', 'RegisterController@show');
  Route::post('/register', 'RegisterController@store');

  Route::get('/password/forgot', 'PasswordController@showForgot');
  Route::post('/password/forgot', 'PasswordController@notify');

  Route::post('/password/reset', 'PasswordController@reset');
  Route::get('/password/reset', 'PasswordController@reset');
  Route::get('/password/reset/{token}', 'PasswordController@showReset');

});

// From this point, we gonna let vue.js handle the routing.
Route::vue(function() {
  view('welcome');
});