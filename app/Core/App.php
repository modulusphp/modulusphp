<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class App
{
  /**
   * check if the migrations table exists
   * If it doesn't exist, create it.
   */
  public function __construct()
  {
    if (Capsule::schema()->hasTable('migrations') == false) {
      if (file_exists('../storage/migrations/migrations.php')) {
        call_user_func(['MigrationsMigration', 'up']);
        Log::info('Successfully created a migrations table');
      }
      else {
        Log::error('The migrations file is missing!');
      }
    }
  }

  /**
   * method
   *
   * @return void
   */
  public function boot()
  {
    $this->route();
  }

  /**
   * route
   *
   * @return  void
   */
  private function route()
  {
    require_once '../app/Http/Router/Route.php';
    require_once '../routes/web.php';
    require_once '../routes/api.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (Route::$status == 404) {
        header('HTTP/1.0 404 Not Found');
        return;
      }
    }
    else {
      if (Route::$status == 404) {
        return ModulusPHP\Touch\View::error(404);
      }
    }
  }
}