<?php

use ModulusPHP\Http\Router\Route as BaseRouter;

class Route extends BaseRouter
{
  /**
   * grouped routes
   */
  public static function group(Array $group, closure $callback) {
    call_user_func($callback);
  }
}