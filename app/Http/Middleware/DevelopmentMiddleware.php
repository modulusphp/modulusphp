<?php

namespace App\Http\Middleware;

use App\Core\Auth;

class DevelopmentMiddleware
{
  public function handle()
  {
    if (config('app.env') != 'local') {
      redirect();
    }
  }
}