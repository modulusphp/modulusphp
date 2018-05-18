<?php

namespace App\Http\Controllers\Auth;

use App\Core\Auth;
use App\Http\Controllers\Controller;
use ModulusPHP\Http\Requests\Request;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen.
  |
  */

  /**
   * Sign in page
   *
   * @param  array  $request
   * @return redirect
  */
  public function index(Request $request = null)
  {
    if ($request == null) {
      return view('auth/login');
    }

    $response = $this->validator($request->data());
    
    if (@$response->status == 'failed') {
      $form = (array)$response->submission;
      $errors = $response->validator;
      return view('auth/login', compact('form', 'errors'));
    }
    else if (@$response->status == 'success') {
      return redirect();
    }
  }

  /**
   * Get a validator for an incoming login request.
   * 
   * @param  array $request
   * @return array
   */
  private function validator($request)
  {
    $response = Auth::login($request, [
      'username' => 'required',
      'password' => 'required'
    ]);

    return $response;
  }

  /**
   * Log the user out
   * 
   * @return void
   */
  public function logout()
  {
    $response = Auth::logout();
    if ($response['status'] == 'success') {
      return redirect();
    }
  }
}