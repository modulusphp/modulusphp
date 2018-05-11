<?php

namespace App\Http\Controllers\Auth;

use App\Mail\Mail;
use App\Core\Auth;
use App\Models\User;
use App\Http\Requests\Request;
use App\Http\Controllers\Controller;

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
      return view('auth/forgot');
    }

    $response = $this->validator($request->data());
    
    if ($response != null) {
      $form = $request->data();
      $errors = $response->ToArray();
      return view('auth/forgot', compact('form', 'errors'));
    }

    // if there where no errors, check if user exists
    $response = $this->checkuser($request->input('username'));

    // if the user already exists, return to the view with errors
    if ($response != null) {
      $form = $request->data();
      $failed = $response;
      return view('auth/forgot', compact('form', 'failed'));
    }

    $user = $this->getUser($request->input('username'));
    $this->notify($user);

    $success = "A reset link has been sent to your email address.";
    return view('auth/forgot', compact('success'));
  }

  /**
   * Reset password
   * 
   * @return string
   */
  public function reset()
  {
    echo 'reset password';
  }

  /**
   * Get a validator for an incoming login request.
   * 
   * @param  array $request
   * @return array
   */
  private function validator($request)
  {
    $response = Auth::validate($request, [
      'username' => 'required'
    ]);

    return $response;
  }

  /**
   * Check if user exists
   * 
   * @param  string $username
   * @param  string $email
   * @return response
   */
  private function checkuser($username)
  {
    $response = array();
    $usernameError = array('username' => 'A user with the username "'.$username.'" doesn\'t exist.');
    $emailError = array('email' => 'A user with the email "'.$username.'" doesn\'t exist.');

    if (filter_var(($username), FILTER_VALIDATE_EMAIL)) {
      $checkEmail = User::where('email', $username)->first();

      if ($checkEmail == null) {
        $response = array_merge($response, $emailError);
      }
    }
    else {
      $checkUsername = User::where('username', $username)->first();

      if ($checkUsername == null) {
        $response = array_merge($response, $usernameError);
      }
    }

    return $response;
  }

  private function getUser($username) {
    if (filter_var(($username), FILTER_VALIDATE_EMAIL)) {
      $checkEmail = User::where('email', $username)->first();
      return $checkEmail;
    }
    else {
      $checkUsername = User::where('username', $username)->first();
      return $checkUsername;
    }
  }

  public function notify($user)
  {
    $username = $user->username;
    $email = new Mail;

    $email->to($user->email);
    $email->view('app/email/reset', compact('username'));

    $res = $email->send('click on the button below to reset your password', 'Forgot password?');
  }
}