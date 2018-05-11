<?php

namespace App\Http;

class HttpFoundation
{
  public static $Middleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'guest' => \App\Http\Middleware\GuestMiddleware::class,
    'dev' => \App\Http\Middleware\DevelopmentMiddleware::class,
    'gender' => \App\Http\Middleware\UserMiddleware::class,
  ];
}