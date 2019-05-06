<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Default Queue Connection
  |--------------------------------------------------------------------------
  |
  | Modulus' makes it easy for you to start using queues in your application.
  | You can easily your queues configure using Database drivers.
  |
  | Supported: "sqlite", "mysql", "pgsql", "sqlsrv"
  |
  */

  'default' => env('QUEUE_CONNECTION', 'queue'),

  /*
  |--------------------------------------------------------------------------
  | Queue Connections
  |--------------------------------------------------------------------------
  |
  | Here you may configure the connection information for each server that
  | is used by your application. A default configuration has been added
  | for each back-end shipped with Modulus. You are free to add more.
  |
  | Note: queue connections are merged into database connections, so keep
  |       that in mind, when naming your queue connections
  |
  */

  'connections' => [

    'queue' => [
      'driver' => 'sqlite',
      'database' => storage_path(env('QUEUE_DUMP')),
      'prefix' => '',
    ],

  ]
];
