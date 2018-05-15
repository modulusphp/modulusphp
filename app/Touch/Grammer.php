<?php

namespace App\Touch;

class Grammer
{
  public $code;

  public function __construct($code)
  {
    $this->code = $code;
  }

  public function translate($pattern, $callback)
  {
    $this->code = preg_replace_callback($pattern, $callback, $this->code);
    return $this->code;
  }
}