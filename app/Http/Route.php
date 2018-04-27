<?php

class Route
{
  static public $status = 404;
  static public $execute = false;

  public static function get($pattern, $callback, $ajax = false)
  {
    if (self::search(['GET'], $pattern, $callback, $ajax) == true) {
      static::$execute = true;
    }
  }

  public static function post($pattern, $callback, $ajax = false)
  {
    if (self::search(['POST'], $pattern, $callback, $ajax) == true) {
      static::$execute = true;
    }
  }

  public static function delete($pattern, $callback, $ajax = false)
  {
    if (self::search(['DELETE'], $pattern, $callback, $ajax)  == true) {
      static::$execute = true;
    }
  }

  public static function patch($pattern, $callback, $ajax = false)
  {
    if (self::search(['PATCH'], $pattern, $callback, $ajax) == true) {
      static::$execute = true;
    }
  }

  private function search($methods, $pattern, $callback, $ajax)
  {
    if (!in_array(strtoupper($_SERVER['REQUEST_METHOD']), $methods)) {
      return false;
    }

    if ($ajax && strtoupper($_SERVER['HTTP_X_REQUESTED_BY']) != 'XMLHTTPREQUEST') {
      return false;
    }

    $len = strlen($_SERVER['REQUEST_URI']);
    $uri = substr($_SERVER['REQUEST_URI'], -1) == '/' ? substr($_SERVER['REQUEST_URI'], 0, $len - 1) : $_SERVER['REQUEST_URI'] ;
    $pattern = substr($pattern, -1) == '/' ? substr($pattern, 0, strlen($pattern) - 1) : $pattern ;

    $pattern_regex = preg_replace("/\{(.*?)\}/", "(?P<$1>[\w-]+)", $pattern);
    $pattern_regex = "#^" . trim($pattern_regex, "/") . "$#";

    preg_match($pattern_regex, trim($uri, "/"), $matches);

    if ($matches && static::$status == 404 || $uri == $pattern && static::$status == 404) {
      static::$status = 200;
    }

    $controller;
    $authController;

    if ($matches && is_callable($callback) == false) {
      $controller = explode('@', $callback)[0];
      $action = isset(explode('@', $callback)[1]) ? explode('@', $callback)[1] : 'index';
      
      $authController = '';

      if (file_exists('../app/Controllers/Auth/'.$controller.'.php')) {
        $authController = 'Auth/';
      }

      if (!file_exists('../app/Controllers/'.$authController.$controller.'.php')) {
        Log::error($controller.' doesn\'t exist');
        return;
      }
      
      require_once '../app/Controllers/'.$authController.$controller . '.php';

      $controller = new $controller;
    }

    if ($pattern != "/") {
      foreach($matches as $key => $value) {
        if (is_numeric($key)) {
          unset($matches[$key]);
        }
      }
    }

    if (static::$execute == false) {
      $modifiedPattern = explode('/', filter_var(rtrim(substr($pattern, 1),'/'), FILTER_SANITIZE_URL));
      $modifiedUrl = self::parseUrl();

      $count = 0;
      foreach ($modifiedPattern as $key => $value) {
        if (isset($value[0])) {
          if ($value[0] == '{') {
            if (isset($modifiedUrl[$count])) {
              unset($modifiedPattern[$key]);
              unset($modifiedUrl[$count]);
            }
          }
          $count++;
        }
      }

      if ($matches && is_callable($callback) && $modifiedPattern == $modifiedUrl) {
        call_user_func($callback, $matches);
        return true;
      }
      else if ($uri == $pattern && $modifiedPattern == $modifiedUrl) {
        if (method_exists($controller, $action)) {
          if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $req = new Request;
            call_user_func_array([$controller, $action], [$req]);
            return true;
          }
          call_user_func_array([$controller, $action], $matches);
          return true;
        }
      }
      else if ($matches && is_string($callback) && $modifiedPattern == $modifiedUrl) {
        if (method_exists($controller, $action)) {
          if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $req = new Request;
            call_user_func_array([$controller, $action], [$req]);
            return true;
          }
          call_user_func_array([$controller, $action], $matches);
          return true;
        }
      }
    }
  }

  /**
   * parseUrl
   * 
   * @return string  $url
   */
  private function parseUrl()
  {
    return $url =  explode('/', filter_var(rtrim(substr($_SERVER['REQUEST_URI'], 1),'/'), FILTER_SANITIZE_URL));
  }
}