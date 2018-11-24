<?php

namespace App\Exceptions;

use Exception;
use Modulus\Framework\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
  /**
   * Render errors
   *
   * @param \Modulus\Http\Request
   * @param Exception $exception
   * @return
   */
  public function render($request, Exception $exception)
  {
    return parent::render($request, $exception);
  }
}
