<?php

namespace App\Http\Controllers\Auth;

use App\Core\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use ModulusPHP\Http\Requests\Request;

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
  
  /**
   * Sign up page
   *
   * @param  array $request
   * @return view
  */
  public function index()
  {
    return view('auth/register');
  }

  /**
   * Save user
   *
   * @param  array $request
   * @return view
  */
  public function store(Request $request = null)
  {
    // check if the submitted values, meet the minumum requirements
    $response = $this->validator($request->data());

    // if not, return to the view with errors
    if ($response != null) {
      $form = $request->data();
      $errors = $response->ToArray();
      return view('auth/register', compact('form', 'errors'));
    }

    // if there where no errors, check if user already exists
    $response = $this->checkuser($request->input('username'), $request->input('email'));

    // if the user already exists, return to the view with errors
    if ($response != null) {
      $form = $request->data();
      $failed = $response;
      return view('auth/register', compact('form', 'failed'));
    }

    // if the user doesn't exist, create the user
    $user = $this->create($request);

    // authorize the user and redirect to the home page
    Auth::authorize($user);
    return $this->redirect();
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
    $usernameError = array('username' => 'The username has already been taken');
    $emailError = array('email' => 'The email address has already been taken');

    $checkUsername = User::where('username', $username)->first();
    $checkEmail = User::where('email', $email)->first();

    if ($checkUsername != null) {
      $response = array_merge($response, $usernameError);
    }

    if ($checkEmail != null) {
      $response = array_merge($response, $emailError);
    }

    return $response;
  }
}