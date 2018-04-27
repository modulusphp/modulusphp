<?php

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation.
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
    $pageTitle = 'Register | modulusPHP';

    if ($request == null) {
      return View::make('auth/register', compact('pageTitle'));
    }

    // check if the submitted values, meet the minumum requirements
    $response = $this->validator($request->data());

    // if not, return to the view with errors
    if ($response != null) {
      $form = $request->data();
      $errors = $response->ToArray();
      return View::make('auth/register', compact('form', 'errors', 'pageTitle'));
    }

    // if there where no errors, check if user already exists
    $response = $this->checkuser($request->input('username'), $request->input('email')
    );

    // if the user already exists, return to the view with errors
    if ($response != null) {
      $form = $request->data();
      $failed = $response;
      return View::make('auth/register', compact('form', 'failed', 'pageTitle'));
    }

    // if the user doesn't exist, create the user
    $user = $this->create($request);

    // authorize the user and redirect to the home page
    Auth::authorize($user);
    $this->redirect();
  }

  /**
   * Get a validator for an incoming registration request.
   * 
   * @param  array $request
   * @return response
   */
  private function validator($request)
  {
    $response = Auth::validate($request, [
      'username' => 'required|min:4|alpha_dash',
      'email' => 'required|email',
      'password' => 'required|min:8'
    ]);

    return $response;
  }

  /**
   * Create a new user
   * 
   * @param  array $request
   * @return response
   */
  private function create($request)
  {
    $user = User::create([
      'username' => $request->input('username'),
      'email' => $request->input('email'),
      'password' => $request->input('password')
    ]);

    return $user;
  }
  
  /**
   * Check if user exists
   * 
   * @param  string $username
   * @param  string $email
   * @return response
   */
  private function checkuser($username, $email)
  {
    $response = array();
    $username_error = array('username' => 'The username has already been taken');
    $email_error = array('email' => 'The email address has already been taken');

    $check_username = User::where('username', $username)->first();
    $check_email = User::where('email', $email)->first();

    if ($check_username != null) {
      $response = array_merge($response, $username_error);
    }

    if ($check_email != null) {
      $response = array_merge($response, $email_error);
    }

    return $response;
  }
}