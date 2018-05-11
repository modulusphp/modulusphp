<?php

namespace App\Http\Requests;

class Request
{
  /**
   * Request::GET
   */
  const GET = 'GET';
  
  /**
   * Request::POST
   */
  const POST = 'POST';

  /**
   * Request::PUT
   */
  const PUT = 'PUT';

  /**
   * Request::PATCH
   */
  const PATCH = 'PATCH';

  /**
   * Request::DELETE
   */
  const DELETE = 'DELETE';

  /**
   * Request::COPY
   */
  const COPY = 'COPY';

  /**
   * Request::HEAD
   */
  const HEAD = 'HEAD';

  /**
   * Request::OPTIONS
   */
  const OPTIONS = 'OPTIONS';

  /**
   * Request::LINK
   */
  const LINK = 'LINK';

  /**
   * Request::UNLINK
   */
  const UNLINK = 'UNLINK';

  /**
   * Request::PURGE
   */
  const PURGE = 'PURGE';

  /**
   * Request::LOCK
   */
  const LOCK = 'LOCK';

  /**
   * Request::UNLOCK
   */
  const UNLOCK = 'UNLOCK';

  /**
   * Request::PROPFIND
   */
  const PROPFIND = 'PROPFIND';

  /**
   * Request::VIEW
   */
  const VIEW = 'VIEW';

  public $__ajax = false;
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

  /**
   * isAjax
   * 
   * @return boolean
   */
  public function isAjax()
  {
    return $this->__ajax;
  }
}