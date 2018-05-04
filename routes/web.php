<?php

// HomeController
Route::get('/', 'HomeController@index');

// Auth Controllers
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@index');

Route::get('/logout', 'LoginController@logout');

Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@store');

Route::get('/password/forgot', 'PasswordController@forgot');
Route::get('/password/reset', 'PasswordController@reset');

// TestController
Route::get('/test/cmodulus', 'TestController@cmodulus');
Route::get('/test/cmodulus/{name}', 'TestController@cmodulus');
Route::get('/test/for', 'TestController@for');
Route::get('/test/foreach', 'TestController@foreach');
Route::get('/test/if', 'TestController@if');
Route::get('/test/if/{name}', 'TestController@if');
Route::get('/test/while', 'TestController@while');
Route::get('/test/{name}/{age}', 'TestController@index');
