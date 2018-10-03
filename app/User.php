<?php

namespace App;

use Modulus\Security\Hash;
use Modulus\Framework\API;
use Modulus\Framework\Mocks\Model;

class User extends API
{
  use Model;

  /*
  |--------------------------------------------------------------------------
  | User Model
  |--------------------------------------------------------------------------
  |
  | The User Model extends the API class which extends Eloquent.
  |
  | The API class has the "generateSecret()" and "generateKey()" methods,
  | these methods are responsible for assigning the secret and api key
  | to a User.
  |
  */

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'secret', 'name', 'email', 'email_verified_at', 'api_key', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'secret', 'email_verified_at', 'password', 'api_key', 'remember_token',
  ];

  /**
   * Encrypt the password using BCrypt
   *
   * @param string $value;
   * @return string
   */
  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = Hash::make($value);
  }
}