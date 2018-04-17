<?php

session_start();

require_once 'Core/Log.php';

try {
  // try to boot up modulusPHP
  require_once '../vendor/autoload.php';
  require_once '../app/Secure/auth.php';
  require_once 'Config/environment.php';
  require_once 'Config/database.php';
  require_once '../storage/migrations/migrations.php';
  require_once 'Core/File.php';
  require_once 'Core/App.php';
  require_once 'Core/Modulus.php';
  require_once 'Core/Controller.php';
  require_once 'Core/View.php';
}
catch (Exception $e) {
  // output any errors
  Log::debug($e);

  // display a fancy page
  require_once 'Core/Modulus.php';
  require_once 'Core/Controller.php';
  require_once 'Core/View.php';

  View::make('app/errors/500');
}