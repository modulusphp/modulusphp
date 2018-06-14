<?php

namespace App\Http\Controllers\Auth;

use App\Core\Auth;
use App\Models\User;
use App\Models\Password;
use App\Http\Controllers\Controller;
use ModulusPHP\Http\Requests\Request;

class PasswordController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Password Controller
  |--------------------------------------------------------------------------
  |
  | This controller is responsible for handling password reset requests.
  | Use this controller to implement the feature.
  |
  */

  /**
   * Forgot Password
   *
   * @return string
   */
  public function showForgot()
  {
    view('auth.forgot');
  }

  /**
   * Reset password
   * 
   * @param Request $request
   */
  public function notify(Request $request)
  {
    $request->success(function($request) {
      $response = User::search($request->input('username'))->notify();

      if ($response['status'] == 'success') {
        $message = "A reset link has been sent to your email address.";
      }
      else {
        $message = "An error occured, could not send a reset link.";
      }

      view('auth.forgot', compact('message'));
    });

    view('auth.forgot');
  }

  /**
   * Show reset password page
   * 
   * @param string $token
   */
  public function showReset(string $token)
  {
    if (Password::verify($token) == false) {
      $message = "Opps, the \"reset token\" is invalid";
      return view('auth.reset', compact('message'));
    }

    $reset = Password::where('token', $token)->first();
    $user = User::where('email', $reset->email)->first();

    view('auth.reset', compact('user', 'token'));
  }

  /**
   * Reset password
   *
   * @return  view
   */
  public function reset(Request $request)
  {
    $request->success(function($request) {
      $email = Password::where('token', $request->input('reset_token'))->first()->email;
      $user = User::where('email', $email)->first();
      $user->password = $request->input('password');
      $user->save();

      $success = true;
      view('auth.reset', compact('success'));
    });

    $token = $request->input('reset_token');

    if (Password::verify($token == false)) {
      $message = "Opps, the \"reset token\" is invalid";
      view('auth.reset', compact('message'));
    }

    $reset = Password::where('token', $token)->first();
    $user = User::where('email', $reset->email)->first();

    view('auth.reset', compact('user', 'token'));

    if (!$request->hasInput('reset_token')) redirect('/login');
  }

  /**
   * Get a validator for an incoming password reset request.
   *
   * @param  array $request
   * @return response
   */
  public function validate(Request $request)
  {
    if ($request->hasInput('reset_token')) {
      $response = Request::validate([
        'password' => 'required|confirmed|min:6',
      ]);

      return $response;
    }

    $response = Request::validate([
      'username' => 'required'
    ]);

    $fields = User::check($request->input('username'));

    foreach($fields as $key => $unique) {
      $response->errors()->add('username', $unique);
    }

    return $response;
  }

}