<?php

namespace App\Http\Controllers\Auth;

use App\Core\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use ModulusPHP\Http\Requests\Request;
use ModulusPHP\Framework\Rules\Unique;

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
  public function validator(Request $request)
  {
    $response = $request->validate([
      'username' => [
        'required', 'min:2', 'alpha_dash',
        new Unique('users')
      ],
      'email' => [
        'required', 'email',
        new Unique('users'),
      ],
      'password' => 'required|min:6',
    ]);

    return $response;
  }
}