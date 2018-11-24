<?php

return [

  'default' => 'web',

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

  /*
  |--------------------------------------------------------------------------
  | Security Settings
  |--------------------------------------------------------------------------
  |
  | access_token: strtotime. e.g. "12 months" (string)
  | session_token: strtotime. e.g. "30 minutes" (string)
  | remember_token: strtotime. e.g: "2 weeks" (string)
  | reset_token: minutes. e.g: 20 (int)
  | magic_token: minutes. e.g. 10 (int)
  |
  */

  'expire' => [
    'access_token' => '1 hour',
    'session_token' => '10 minutes',
    'remember_token' => '7 days',
    'reset_token' => 15,
    'magic_token' => 30,
  ],
];
