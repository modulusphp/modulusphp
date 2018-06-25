<?php

namespace App\Http\Controllers\Auth;

use App\Core\Log;
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
   * Show login page
   *
   * @return view auth/login
   */
  public function show()
  {
    view('auth.login');
  }

  public function login(Request $request)
  {
    $request->success(function($request) {
      Auth::authorize($request->input('username'));
      redirect();
    });

    view('auth.login');
  }

  /**
   * Validate incoming request
   *
   * @param  Request $request
   */
  public function validator(Request $request)
  {
    $response = $request->validate([
      'username' => 'required',
      'password' => 'required',
    ], function($request, $response) {
      return Auth::attempt();
    });

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