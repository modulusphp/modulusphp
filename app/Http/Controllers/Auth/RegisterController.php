<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Modulus\Http\Request;
use Modulus\Security\Hash;
use Modulus\Framework\Rules\Unique;
use Illuminate\Database\Eloquent\Model;
use Modulus\Framework\Auth\MustRegisterNewUser;
use Modulus\Http\Controllers\Auth\RegisterController as Controller;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use MustRegisterNewUser;

  /**
   * Default provider
   *
   * @var string
   */
  protected $provider = 'web';

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = '/home';

  /**
   * Get a validator for an incoming registration request.
   *
   * @return array
   */
  protected function rules() : array
  {
    return [
      'name' => 'required|string|max:255',
      'email' => [
        'required', 'string', 'email', 'max:255', new Unique('users'),
      ],
      'password' => 'required|string|min:6',
    ];
  }

  /**
   * Add new a new user
   *
   * @param \Modulus\Http\Request $request
   * @return \App\User
   */
  protected function create(Request $request) : Model
  {
    return User::create([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'password' => Hash::make($request->input('password'))
    ]);
  }

  /**
   * Musk email
   *
   * @return string
   */
  protected function musk() : string
  {
    return 'email';
  }
}
