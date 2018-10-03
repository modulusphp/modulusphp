<?php

namespace App\Http\Controllers\Auth;

use Modulus\Framework\Auth\MustGenerateResetPasswordToken;
use Modulus\Http\Controllers\Auth\ForgotPasswordController as Controller;

class ForgotPasswordController extends Controller
{
  use MustGenerateResetPasswordToken;

  /**
   * Default provider
   *
   * @var string
   */
  protected $provider = 'web';

  /**
   * Where to redirect users after password reset
   *
   * @var string
   */
  protected $redirectTo = '/login';

  /**
   * Get a validator for an incoming reset request.
   *
   * @return array
   */
  protected function rules() : array
  {
    return [
      'password' => 'required|confirmed|min:6',
    ];
  }
}
