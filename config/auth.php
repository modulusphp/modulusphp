<?php

return [

  'provider' => [
    'web' => [
      'model' => \App\User::class,
      'with' => 'remember_token',
      'protects' => 'password',
    ],

    'api' => [
      'model' => \App\User::class,
      'with' => 'remember_token',
      'protects' => 'api_key',
    ],

    /*
      'admin' => [
        'model' => \App\Admin::class,
        'with' => 'remember_token',
        'protects' => 'password',
      ],
    */
  ],

  'default' => 'web',

  /*
  |--------------------------------------------------------------------------
  | Security Settings
  |--------------------------------------------------------------------------
  |
  | session_token.token: strtotime. e.g. 30 minutes
  | remember_me.expire: strtotime. e.g: '2 week'
  | reset_token.expire: minutes. e.g: 30
  |
  */

  'expire' => [
    'access_token' => '1 year',
    'session_token' => '10 minutes',
    'remember_token' => '7 days',
    'reset_token' => 15,
  ],
];