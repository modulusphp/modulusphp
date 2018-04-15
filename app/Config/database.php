<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
  'driver' => getenv('DB_CONNECTION'), 
  'host' => getenv('DB_HOST'),
  'username' => getenv('DB_USERNAME'),
  'password' => getenv('DB_PASSWORD'),
  'database' => getenv('DB_DATABASE'),
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix' => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();