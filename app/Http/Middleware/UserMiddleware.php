<?php

namespace App\Http\Middleware;

use App\Core\Auth;

class UserMiddleware
{
  public function handle()
  {
    if (Auth::gender == 'female') {
      redirect();
    }
  }
}