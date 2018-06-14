<?php

namespace App\Http\Middleware;

use App\Core\Auth;
use ModulusPHP\Http\Requests\Request;

class DevelopmentMiddleware
{
  public function handle(Request $request)
  {
    if (config('app.env') == 'local') {
      return true;
    }

    redirect();
  }
}