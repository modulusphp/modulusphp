<?php

use Modulus\Support\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the AtlantisPHP's Swish within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/', function(Request $request) {
  view('welcome');
});

Route::get('/home', 'HomeController@index')
      ->middleware('auth')
      ->name('home');

Auth::routes();