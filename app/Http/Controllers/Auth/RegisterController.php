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
  public function show()
  {
    view('auth.register');
  }

  /**
   * Save user
   *
   * @param  array $request
   * @return view
  */
  public function store(Request $request)
  {
    $request->success(function($request) {
      $user = User::create($request->data());
      Auth::authorize($user->email);

      redirect();
    });

    view('auth.register');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array $request
   * @return response
   */
  public function validate(Request $request)
  {
    $response = Request::validate([
      'username' => 'required|min:2|alpha_dash',
      'email' => 'required|email',
      'password' => 'required|min:6',
    ]);

    $fields = User::isTaken([
      'username',
      'email'
    ]);

    foreach($fields as $key => $unique) {
      $response->errors()->add($key, $unique);
    }

    return $response;
  }
}