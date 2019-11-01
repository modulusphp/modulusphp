<?php

return [

  /*
  |
  |--------------------------------------------------------------------------
  | Hibernate Cache Settings
  |--------------------------------------------------------------------------
  |
  | Here you can configure your cache. The encrption for the file driver
  | will always be set to true even if you change it here.
  |
  */

  'default' => env('HIBERNATE_CACHE', 'file'),

  'encrypt' => env('HIBERNATE_ENCRYPTION', true),


  /*
  |
  |--------------------------------------------------------------------------
  | Hibernate Cache Connections
  |--------------------------------------------------------------------------
  |
  | Here are some of pre-configured cache configurations for your
  | application. Note that you can easily create your own driver, if the
  | available drivers don't meet your application requirements.
  |
  | You can use any of the database connections as a cache driver
  | through https://github.com/donaldp/database-cache-driver
  |
  */

  'connections' => [
  
    'file' => [
      'driver' => 'file',
      'storage' => storage_path('framework/data/.cache')
    ],

    'redis' => [
      'driver' => 'redis',
      'connection' => 'cache'
    ],

    'fallback' => [
      'driver' => 'database',
      'connection' => 'sqlitecache'
    ]

  ]
];
