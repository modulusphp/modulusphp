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
  public function forgot(Request $request = null)
  {
    if ($request == null) {
      return view('auth.forgot');
    }

    $response = $this->validator($request->data(), true);

    if ($response != null) {
      $form = $request->data();
      $errors = $response->ToArray();
      return view('auth.forgot', compact('form', 'errors'));
    }

    $response = User::check($request->input('username'));

    if ($response != null) {
      $form = $request->data();
      $failed = $response;
      return view('auth.forgot', compact('form', 'failed'));
    }

    $response = User::search($request->input('username'))->notify();

    if ($response['status'] == 'success') {
      $message = "A reset link has been sent to your email address.";
      return view('auth.forgot', compact('message'));
    }
    else {
      $message = "An error occured, could not send a reset link.";
      return view('auth.forgot', compact('message'));
    }
  }

  /**
   * Reset password
   *
   * @return  view
   */
  public function reset($request = null)
  {
    if (is_string($request)) {
      if (Password::verify($request) == false) {
        $error = "Opps, the \"reset token\" is invalid";
        return view('auth/reset', compact('error'));
      }
  
      $reset = Password::where('token', $request)->first();
      $user = User::where('email', $reset->email)->first();
      $token = $request;
  
      return view('auth/reset', compact('user', 'token'));
    }

    if ($request == null) {
      return redirect('/login');
    }

    $response  = $this->validator($request->data());

    $reset = Password::where('token', $request->input('reset_token'))->first();
    $user = User::where('email', $reset->email)->first();
    $token = $reset->token;

    if ($response != null) {
      $errors = $response->ToArray();
      return view('auth/reset', compact('errors', 'user', 'token'));
    }

    // save password
    $user = User::where('email', $user->email)->first();
    $user->password = $request->input('password');
    $user->save();

    $success = true;
    return view('auth/reset', compact('success'));
  }

  /**
   * Get a validator for an incoming login request.
   *
   * @param  array $request
   * @return array
   */
  private function validator($request, $forgot = false)
  {
    if ($forgot == true) {
      $response = Auth::validate($request, [
        'username' => 'required'
      ]);

      return $response;
    }

    $response = Auth::validate($request, [
      'password' => 'required|confirmed|min:8',
    ]);

    return $response;
  }
}