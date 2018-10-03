<?php

namespace App\Http\Middleware;

use Modulus\Http\Redirect;
use Modulus\Http\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @return void
   */
  protected function redirectTo()
  {
    return Redirect::to('/login')->return(302);
  }
}
