<?php

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

  public function __construct()
  {
    $this->authorization('guest');
  }

  /**
   * This is the default method
   *
   * @param  array $request
   * @return redirect
  */
  public function index(Request $request = null)
  {
    $pageTitle = 'Login | modulusPHP';

    if ($request == null) {
      return View::make('auth/login', compact('pageTitle'));
    }

    $response = $this->validator($request->data());
    
    if (@$response->status == 'failed') {
      $form = (array)$response->submission;
      $errors = $response->validator;
      return View::make('auth/login', compact('form', 'errors', 'pageTitle'));
    }
    else if (@$response->status == 'success') {
      return $this->redirect();
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
}