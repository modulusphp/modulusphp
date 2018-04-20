<?php

class LogoutController extends Controller
{
  /**
   * Log the user out
   * 
   * @return redirect
   */
  public function index()
  {
    $response = Auth::logout();
    if ($response['status'] == 'success') {
      return $this->redirect();
    }

    // $this->view('app/errors/400');
  }
}