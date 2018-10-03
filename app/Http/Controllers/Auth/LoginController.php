<?php

namespace App\Http\Controllers\Auth;

use Modulus\Framework\Auth\MustAuthenticateUser;
use Modulus\Http\Controllers\Auth\LoginController as Controller;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use MustAuthenticateUser;

  /**
   * Default provider
   *
   * @var string
   */
  protected $provider = 'web';

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/home';

  /**
   * Where to redirect users after logout.
   *
   * @var string
   */
  protected $logoutTo = '/login';

  /**
   * Hidden fields
   *
   * @var array
   */
  protected $hidden = [
    'csrf_token'
  ];

  /**
   * Get a validator for an incoming login request.
   *
   * @return array
   */
  protected function rules() : array
  {
    return [
      'email' => 'required|string|email',
      'password' => 'required',
    ];
  }
}
