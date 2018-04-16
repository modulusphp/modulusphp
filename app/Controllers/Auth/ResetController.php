<?php

class ResetController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Password Reset Controller
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
    echo 'ResetController was successfully created!';
  }
}