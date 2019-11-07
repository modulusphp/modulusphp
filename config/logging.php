<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Default Log Channel
  |--------------------------------------------------------------------------
  |
  | This option defines the default log channel that gets used when writing
  | messages to the logs. The name specified in this option should match
  | one of the channels defined in the "channels" configuration array.
  |
  */

  'default' => env('LOG_CHANNEL', 'single'),

  /*
  |--------------------------------------------------------------------------
  | Default Log Handlers
  |--------------------------------------------------------------------------
  |
  | This option allows you register more than one handler alongside the
  | default handler.
  |
  */

  'with_handlers' => [
    // 'slack'
  ],

  /*
  |--------------------------------------------------------------------------
  | Log Channels
  |--------------------------------------------------------------------------
  |
  | Here you may configure the log channels for your application. Out of
  | the box, Modulus uses the Monolog PHP logging library. This gives
  | you a variety of powerful log handlers / formatters to utilize.
  |
  | Available Drivers: "single", "daily", "slack"
  |
  */

  'channels' => [
    'single' => [
      'driver' => 'single',
      'path' => storage_path('logs/modulus.log'),
      'level' => 'debug',
    ],

    'daily' => [
      'driver' => 'daily',
      'storage' => storage_path('logs/'),
      'name' => 'modulus',
      'level' => 'debug',
      'days' => 14,
    ],

    'slack' => [
      'driver' => 'slack',
      'token' => env('LOG_SLACK_OAUTH_ACCESS_TOKEN', ''),
      'channel' => env('LOG_SLACK_CHANNEL', ''),
      'username' => 'Modulus Log',
      'emoji' => ':boom:',
      'level' => 'critical'
    ]
  ]
];
