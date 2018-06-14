<?php

use ModulusPHP\Touch\View;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class App
{
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
        return View::error(404);
      }
    }
  }
}