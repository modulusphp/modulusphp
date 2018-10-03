<?php

namespace App\Http;

class HttpFoundation
{
  /**
   * $RouteModelBinding
   * Route Queries for Models and Collections
   *
   * @var array
   */
  public static $routeModelBinding = [
    'model' => [
      'like' => \Modulus\Http\QueryMaps\LikeModel::class,
    ],
    'groupable' => [
      'like' => \Modulus\Http\QueryMaps\LikeGroup::class,
    ]
  ];

  public static $middleware = [
    \App\Http\Middleware\CheckForMaintenanceMode::class,
  ];

  /**
   * $middlewareGroup
   *
   * @var array
   */
  public static $middlewareGroup = [
    'web' => [
      \App\Http\Middleware\VerifyCsrfToken::class,
    ],
  ];

  /**
   * $routeMiddleware
   *
   * @var array
   */
  public static $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.basic' => \App\Http\Middleware\AuthenticateWithBasicAuth::class,
    'auth.api' => \Modulus\Http\Middleware\AuthenticateWithBearerAuth::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
  ];
}
