<?php

// HomeController
Route::get('/', 'HomeController@index');

// Auth Controllers
Route::group(['middleware' => 'guest', 'auth' => true], function() {

  Route::get('/login', 'LoginController@index');
  Route::post('/login', 'LoginController@index');

  Route::get('/logout', 'LoginController@logout');

  Route::get('/register', 'RegisterController@index');
  Route::post('/register', 'RegisterController@store');

  Route::get('/password/forgot', 'PasswordController@forgot');
  Route::post('/password/forgot', 'PasswordController@forgot');
  Route::get('/password/reset', 'PasswordController@reset');

});

// TestController
Route::group(['middleware' => 'dev', 'prefix' => 'test'], function() {
  
  Route::get('/cmodulus', 'TestController@cmodulus');
  Route::get('/cmodulus/{name}', 'TestController@cmodulus');
  Route::get('/for', 'TestController@for');
  Route::get('/foreach', 'TestController@foreach');
  Route::get('/if', 'TestController@if');
  Route::get('/if/{name}', 'TestController@if');
  Route::get('/while', 'TestController@while');
  Route::get('/{name}/{age}', 'TestController@index');

  // upload image from a post request
  Route::post('/profilepic', 'TestController@storeProfilePic');
  Route::post('/send', 'TestController@send');

});