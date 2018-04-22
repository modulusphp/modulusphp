<?php

use Illuminate\Database\Capsule\Manager as DB;

class Controller
{
  /**
   * Model
   * 
   * @param  string $model
   * @return model $model
   */
  public function model($model) 
  {
    require_once '../app/Models/' .$model . '.php';
    return new $model(); 
  }

  /**
   * View
   * 
   * @param  string $view
   * @param  array $data
   * @return view
   */
  public function view($view, $data = []) 
  {
    return View::make($view, $data);
  }

  /**
   * Response
   * 
   * @param  array $response
   * @return json $response
   */
  public function response($response)
  {
    header('content-type: application/json');
    echo json_encode($response);
  }

  /**
   * Upload file
   * 
   * @param  string $file
   * @param  boolean $private
   * @param  string $name
   * @param  boolean $extensionOn
   * @return array
   */
  public function upload($file, $private = true, $name = null, $extensionOn = true)
  {
    return File::upload($file, $private, $name, $extensionOn);
  }

  /**
   * Back
   * 
   * @param  string $fallback
   * @return string
   */
  public function back($fallback = '/')
  {
    if (isset($_SERVER['HTTP_REFERER'])) {
        return header('Location: '.$_SERVER['HTTP_REFERER']);
    }

    echo '<script>window.location = "'.$fallback.'";</script>';
  }

  /**
   * Redirect
   * 
   * @param  string $location
   * @return header
   */
  public function redirect($location = '/')
  {
    return header('Location: '.$location);
  }

  /**
   * Authorization
   * 
   * @param  string $level
   * @param  string $redirect
   * @return string $redirect
   */
  public function authorization($level = 'guest', $redirect = '/')
  {
    if ($level == 'guest') {
      if (Auth::isGuest() != true) {
        echo '<script>window.location = "'.$redirect.'";</script>';
      }
    }
    else if ($level == 'user') {
      if (Auth::isGuest() == true) {
        echo '<script>window.location = "'.$redirect.'";</script>';
      }
    }
    else {
      $auth = require '../app/Config/app.php';
      if (isset($auth['auth']['authorization'][$level])) {
        $currentLevel = $auth['auth']['authorization'][$level];
        
        $column = $currentLevel[0];
        $operator = $this->operator($currentLevel[1]);
        $value = $currentLevel[2];

        if ($this->{$operator}($column, $value) == false) {
          if (Auth::isGuest() == false && $redirect == "/login") {
            echo '<script>window.location = "/";</script>';
          }
          else {
            echo '<script>window.location = "'.$redirect.'";</script>';
          }
        }
      }
      else {
        Log::error('Could not find $app->authorization->'.$level.' in config/app.php');
      }
    }
  }

  /**
   * isAuthorized
   * 
   * @return redirect
   */
  public function isAuthorized()
  {
    if (Auth::isGuest() == true) {
      if ($_SERVER['REQUEST_URI'] != '/login') {
        return $this->redirect('/login');
      }
    }
  }

  /**
   * operator
   * 
   * @param  string $operator
   * @return string
   */
  protected function operator($operator)
  {
    if ($operator == '=' || $operator == '==') {
      return '__equals';
    }

    if ($operator == '>') {
      return '__greater_than';
    }

    if ($operator == '<') {
      return '__less_than';
    }

    if ($operator == '>=') {
      return '__greater_than_or_equal_to';
    }

    if ($operator == '<=') {
      return '__less_than_or_equal_to';
    }
  }

  /**
   * __equals
   * 
   * @param  string  $column
   * @param  string  $value
   * @return boolean
   */
  protected function __equals($column, $value)
  {
    if (Auth::user()->{$column} == $value){
      return true;
    }

    return false;
  }

  /**
   * __greater_than
   * 
   * @param  string  $column
   * @param  string  $value
   * @return boolean
   */
  protected function __greater_than($column, $value)
  {
    if (Auth::user()->{$column} > $value){
      return true;
    }

    return false;
  }

  /**
   * __less_than
   * 
   * @param  string  $column
   * @param  string  $value
   * @return boolean
   */
  protected function __less_than($column, $value)
  {
    if (Auth::user()->{$column} < $value){
      return true;
    }

    return false;
  }

  /**
   * __greater_than_or_equal_to
   * 
   * @param  string  $column
   * @param  string  $value
   * @return boolean
   */
  protected function __greater_than_or_equal_to($column, $value)
  {
    if (Auth::user()->{$column} >= $value){
      return true;
    }

    return false;
  }

  /**
   * __less_than_or_equal_to
   * 
   * @param  string  $column
   * @param  string  $value
   * @return boolean
   */
  protected function __less_than_or_equal_to($column, $value)
  {
    if (Auth::user()->{$column} <= $value){
      return true;
    }

    return false;
  }
}