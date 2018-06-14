<?php

namespace App\Http;

class HttpFoundation
{
  public static $Middleware = [
    'auth' => \ModulusPHP\Http\Middleware\Authenticate::class,
    'guest' => \ModulusPHP\Http\Middleware\GuestMiddleware::class,
    'dev' => \App\Http\Middleware\DevelopmentMiddleware::class,
  ];
}