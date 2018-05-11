<?php

use App\Mail\Mail;

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

$mail = new Mail;

Route::get('/send', function() use ($mail) {
  return view('app/email/welcome2');
  $mail->from('donaldpakkies@gmail.com', 'Don!');
  $mail->to('donald@sov.tech');
  $mail->view('app/email/signature');

  $res = $mail->send('Don!!', 'Subject');

  // if ($res['status'] == "success") {
  //   echo "Success!";
  // }
  // else {
  //   echo "failed";
  // }
});

Route::get('/config', function() {
  view('app/email/welcome');
});