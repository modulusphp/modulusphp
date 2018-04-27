<?php

class View
{
  /**
   * Make
   * 
   * @param  string  $view
   * @param  array   $data
   * @return void
   */
  public function make($view, $data = [])
  {
    file_exists('../resources/views/' . $view . '.modulus.php') == true ? $view = $view . '.modulus' : $view = $view;

    if (file_exists('../resources/views/' . $view . '.php') == true) {
      extract($data);
      
      if (substr($view, -8) == '.modulus') {
        $contents = file_get_contents('../resources/views/'. $view . '.php');
        Modulus::render($contents, $data);
      }
      else {
        require_once '../resources/views/' . $view . '.php';
      }
    }
    else {
      header('HTTP/1.0 404 Not Found');
      $contents = file_get_contents('../resources/views/app/errors/404.modulus.php');
      Modulus::render($contents, ['pageURL' => $_SERVER['REQUEST_URI']]);
    }
  }
}