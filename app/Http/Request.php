<?php

class Request
{
  /**
   * hasInput
   * 
   * @param  string  $name
   * @return boolean
   */
  public function hasInput($name)
  {
    if (isset($_POST[$name])) {
      return true;
    }
  }

  /**
   * input
   * 
   * @param  string  $name
   * @return
   */
  public function input($name)
  {
    return $_POST[$name];
  }

  /**
   * hasFile
   * 
   * @param  string  $name
   * @return boolean
   */
  public function hasFile($name)
  {
    if (isset($_FILES[$name])) {
      return true;
    }

    return false;
  }

  /**
   * file
   * 
   * @param  string  $name
   * @return file
   */
  public function file($name)
  {
    return $_FILES[$name];
  }

  /**
   * data
   * 
   * @return array
   */
  public function data()
  {
    return isset($_POST) ? $_POST : [];
  }

  /**
   * files
   * 
   * @return array
   */
  public function files()
  {
    return isset($_FILES) ? $_FILES : [];
  }

  /**
   * method
   * 
   * @return string REQUEST_METHOD
   */
  public function method()
  {
    return $_SERVER['REQUEST_METHOD'];
  }
}