<?php

namespace App\Http\Middleware;

use App\Core\Auth;

class DevelopmentMiddleware
{
  public function handle()
  {
    if (getenv('APP_ENV') != 'local') {
      redirect();
    }
  }
}