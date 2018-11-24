<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouterResolver within a group which contains
| the "api" middleware group. Build your first API!
|
*/

Route::get('/access_token', function (Request $request) {

  return response()->json([
    'access_token' => $request->input('access_token'),
    'token_type' => 'Bearer',
    'status' => 'success',
    'code' => 200
  ], 200);

})->middleware('auth.basic');
