<?php

class ForgotController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Forgot Password Controller
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
   * This is the default method
   *
  */
  public function index()
  {
    echo 'ForgotController was successfully created!';
  }
}