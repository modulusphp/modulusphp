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
    $this->authorization('guest');
  }

  /**
   * This is the default method.
   * Throw an error.
   * 
   * @return view
  */
  public function index()
  {
    return $this->view('app/errors/404', ['pageURL' => $_SERVER['REQUEST_URI']]);
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