<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Redis Connections
  |--------------------------------------------------------------------------
  |
  | Here are each of the redis connections setup for your application.
  |
  */

  'connections' => [

    'default' => [
      'host' => env('REDIS_HOST', 'redis'),
      'password' => env('REDIS_PASSWORD', 'secret'),
      'port' => env('REDIS_PORT', 6379),
      'database' => 0,
    ],

    'cache' => [
      'host' => env('REDIS_HOST', 'redis'),
      'password' => env('REDIS_PASSWORD', 'secret'),
      'port' => env('REDIS_PORT', 6379),
      'database' => 1,
    ],

    'session' => [
      'host' => env('REDIS_HOST', 'redis'),
      'password' => env('REDIS_PASSWORD', 'secret'),
      'port' => env('REDIS_PORT', 6379),
      'database' => 2,
    ],

  ]
];
