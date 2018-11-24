<?php

namespace App\Http;

use Modulus\Http\Kernel;

class HttpFoundation extends Kernel
{
  /**
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

  /**
   * The application's global HTTP middleware stack.
   *
   * @var array
   */
  public static $middleware = [
    \App\Http\Middleware\CheckForMaintenanceMode::class,
    \App\Http\Middleware\TrimStrings::class,
    \Modulus\Http\Middleware\ConvertEmptyStringsToNull::class,
  ];

  /**
   *The application's route middleware groups.
   *
   * @var array
   */
  public static $middlewareGroup = [
    'web' => [
      \App\Http\Middleware\VerifyCsrfToken::class,
    ],
    'api' => [
      //
    ],
  ];

  /**
   * The application's route middleware.
   *
   * @var array
   */
  public static $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.basic' => \App\Http\Middleware\AuthenticateWithBasicAuth::class,
    'auth.api' => \Modulus\Http\Middleware\AuthenticateWithBearerAuth::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'cors' => \Modulus\Http\Middleware\MustHandleCors::class,
    'limit' => \Modulus\Http\Middleware\MustNotExceedAllowedRequests::class, // not the best solution
    'private' => \Modulus\Http\Middleware\MustHideRoutes::class,
    'protected' => \Modulus\Http\Middleware\MustProtectRoutes::class,
  ];
}
