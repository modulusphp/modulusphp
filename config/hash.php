<?php

return [

  /*
  |
  |--------------------------------------------------------------------------
  | Password Hashing Algorithm
  |--------------------------------------------------------------------------
  |
  | The hashing algorithm you wish to use when passwords get hashed.
  | modulusPHP uses Argon 2 by default, feel free to change it.
  |
  */

  'argon2' => [
    'algorithm' => PASSWORD_ARGON2I,
    'options' => [
      'memory_cost' => env('HASHING_COST', PASSWORD_ARGON2_DEFAULT_MEMORY_COST),
      'time_cost' => env('HASHING_TIME_COST', PASSWORD_ARGON2_DEFAULT_TIME_COST),
      'threads' => env('HASHING_THREADS', PASSWORD_ARGON2_DEFAULT_THREADS),
    ],
  ],

  'bcrypt' => [
    'algorithm' => PASSWORD_BCRYPT,
    'options' => [
      'cost' => env('HASHING_COST', 10),
    ],
  ],

  'default' => env('HASHING_ALOGRITHM', 'bcrypt')
];