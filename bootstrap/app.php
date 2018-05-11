<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once __DIR__ . '/../vendor/autoload.php';

try {
  require_once __DIR__ . '/../app/Secure/auth.php';
  require_once __DIR__ . '/../app/Config/environment.php';
  require_once __DIR__ . '/../app/Config/database.php';
  require_once __DIR__ . '/../app/Core/App.php';
  return true;
}
catch (Exception $e) {
  \App\Core\Log::debug($e);
  \App\Touch\View::error(500);
  return false;
}