<?php

namespace App;

use Modulus\Hibernate\Model;
use Modulus\Framework\API\User as API;

class User extends API
{
  use Model;

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
}
