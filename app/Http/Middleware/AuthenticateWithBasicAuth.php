<?php

namespace App\Http\Middleware;

use Modulus\Http\Middleware\AuthenticateWithBasicAuth as Middleware;

class AuthenticateWithBasicAuth extends Middleware
{
  /**
   * Default provider
   *
   * @var string
   */
  protected $provider = 'api';

  /**
   * Hidden fields
   *
   * @var array
   */
  protected $hidden = [
    //
  ];

  /**
   * Field musking
   *
   * * feel free to change the user value, check
   * * out the auth.php config file if you want to
   * * change the :protects value
   *
   * @var array
   */
  protected $checks = [
    'user' => 'secret', ':protects' => ':protects'
  ];
}
