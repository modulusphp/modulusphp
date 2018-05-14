<?php

$dotenv = new Dotenv\Dotenv(__DIR__.'/../../');
$dotenv->overload(__DIR__.'/../../.env');

$dotenv->required([
  'DB_CONNECTION',
  'DB_HOST',
  'DB_PORT',
  'DB_DATABASE',
  'DB_USERNAME',
  'DB_PASSWORD',
]);