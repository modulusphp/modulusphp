<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class App
{
  protected $controller = 'HomeController';
  protected $method = 'index';
  protected $params = [];
  protected $requestType = 'get';

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
    require_once '../app/Http/Requests/Request.php';
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
        return App\Touch\View::error(404);
      }
    }
  }

  /**
   * controllerAction
   * 
   * @return void
   */
  private function controllerAction()
  {
    $service = require '../app/Config/app.php';
    $appRoot = $service['root'];

    $appRoot = $appRoot != null ? $appRoot : '/public_html' ;

    if ($appRoot[0] != "/") {
      $appRoot = '/'.$appRoot;
    }

    $url = $this->parseUrl();

    // is this a auth controller?
    $authController = strtolower($url[0]);
    $authControllers = $service['auth']['controllers'];

    if (in_array(ucfirst($authController), $authControllers)) {
        $authController = 'Auth/';
    }
    else {
        $authController = '';
    }
    
    /**
     * Check if controller exists
     */
    if (file_exists(str_replace($appRoot, '/app/Controllers/'.$authController, getcwd()).ucfirst($url[0]).'Controller.php')) {
      $this->controller = ucfirst($url[0]).'Controller';
      unset($url[0]);
    }

    /**
     * Do some crazy weird sh*t if the requested controller
     * is the API controller...
     */
    if ($this->controller == 'ApiController') {
      require_once '../app/Controllers/'.$this->controller . '.php';

      $this->controller = new $this->controller;

      if (isset($url[1])) {
        if (method_exists($this->controller, $url[1])) {
          $this->method = $url[1];
          unset($url[1]);
        }
      }

      if ($this->method == 'index') {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
          header('HTTP/1.0 400 Bad Request');
          $response = Array(
              'status' => 'failed',
              'reason' => 'bad request'
          );

          return View::make('app/errors/400');
        }
      }

      /**
       * Merge _POST and _FILES, this is probably a bad idea...
       * F* it, lets do it anyway
       */
      $_FILES != null ? $post_meth = array_merge($_POST, $_FILES) : $post_meth = $_POST;

      call_user_func_array([$this->controller, $this->method], ['request' => $post_meth]);
    }
    else {
      require_once '../app/Controllers/'.$authController.$this->controller . '.php';

      $this->controller = new $this->controller;

      if (isset($url[1])) {
        if (method_exists($this->controller, $url[1])) {
          $this->method = $url[1];
          unset($url[1]);
        }
      }
      
      $this->params = $url ? array_values($url) : [];
      
      /**
       * Let's check the request...
       * If its a Post, we gonna do something stupid...
       */
      $_SERVER['REQUEST_METHOD'] == 'POST' ? $this->requestType = 'post' : $this->requestType = 'get';
      
      if ($this->requestType == 'post') {
        $_FILES != null ? $post_meth = array_merge($_POST, $_FILES) : $post_meth = $_POST;
        call_user_func([$this->controller, $this->method], $post_meth);
      }
      else {
        call_user_func_array([$this->controller, $this->method], $this->params);
      }
    }
  }
  
  /**
   * parseUrl
   * 
   * @return string  $url
   */
  public static function parseUrl()
  {
    return $url =  explode('/', filter_var(rtrim(substr($_SERVER['REQUEST_URI'], 1),'/'), FILTER_SANITIZE_URL));
  }
}