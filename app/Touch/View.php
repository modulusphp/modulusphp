<?php

namespace App\Touch;

use App\Touch\Compiler as Modulus;

class View
{
  /**
   * Make
   * 
   * @param  string  $view
   * @param  array   $data
   * @return void
   */
  public static function make($view, $data = [])
  {
    $resources = str_replace(env('APP_ROOT'), '/resources/views/', getcwd());
    file_exists($resources.$view.'.modulus.php') == true ? $view = $view . '.modulus' : $view = $view;

    if (file_exists($resources.$view.'.php') == true) {
      extract($data);
      
      if (substr($view, -8) == '.modulus') {
        $contents = file_get_contents($resources.$view.'.php');

        if (file_exists('../app/Config/grammer.php')) {
          $grammers = require '../app/Config/grammer.php';

          try {
            foreach ($grammers as $key => $grammer) {
              if ($grammer['enabled']) {
                $contents = (new $grammer['class']($contents))->handle();
              }
            }
          }
          catch (Exception $e) {
            \App\Core\Log::error($e);
          }
        }

        Modulus::render($contents, $data);
      }
      else {
        require_once $resources.$view.'.php';
      }
    }
    else {
      View::error(404);
    }
  }

  public static function error($status = 404)
  {
    $resources = str_replace(env('APP_ROOT'), '/resources/views/', getcwd());

    if ($status == 400) {
      header('HTTP/1.0 400 Bad Request');
      $contents = file_get_contents($resources.'app/errors/400.modulus.php');
      Modulus::render($contents);
    }
    else if ($status == 404) {
      header('HTTP/1.0 404 Not Found');
      $contents = file_get_contents($resources.'app/errors/404.modulus.php');
      Modulus::render($contents);
    }
    else if ($status == 500) {
      header('HTTP/1.0 500 Internal Error');
      $contents = file_get_contents($resources.'app/errors/500.modulus.php');
      Modulus::render($contents);
    }
  }
}