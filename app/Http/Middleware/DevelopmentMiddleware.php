<?php

namespace App\Http\Middleware;

use App\Core\Auth;

class DevelopmentMiddleware
{
  public function handle()
  {
    if (env('APP_ENV') != 'local') {
      redirect();
    }
  }
}