<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
  'driver' => env('DB_CONNECTION'), 
  'host' => env('DB_HOST'),
  'username' => env('DB_USERNAME'),
  'password' => env('DB_PASSWORD'),
  'database' => env('DB_DATABASE'),
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix' => 'donaldpakkies_'
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();