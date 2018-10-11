<?php

namespace App\Http\Middleware;

use Modulus\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
  /**
   * The URIs that should be accessible while maintenance mode is enabled.
   *
   * @var array
   */
  protected $except = [
    //
  ];
}
