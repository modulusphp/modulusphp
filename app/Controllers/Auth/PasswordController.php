<?php

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

  public function __construct()
  {
    $this->allowed('guest');
  }

  /**
   * Forgot Password
   * 
   * @return string
   */
  public function forgot()
  {
    echo 'forgot password';
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
}