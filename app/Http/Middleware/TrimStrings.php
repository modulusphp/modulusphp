<?php

namespace App\Http\Middleware;

use Modulus\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
  /**
   * The names of the attributes that should not be trimmed.
   *
   * @var array
   */
  protected $except = [
    'csrf_token',
    'password',
    'password_confirmation',
  ];
}
