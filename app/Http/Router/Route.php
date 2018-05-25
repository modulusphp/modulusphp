<?php

use ModulusPHP\Http\Router\Route as BaseRouter;

class Route extends BaseRouter
{
  /*
  | grouped routes
  */
  public static function group(Array $group, Closure $callback) {
    call_user_func($callback);
  }
}