<?php

class LogoutController extends Controller
{
  /**
   * Log the user out
   * 
   * @return void
   */
  public function index()
  {
    $response = Auth::logout();
    if ($response['status'] == 'success') {
      return $this->redirect();
    }
  }
}