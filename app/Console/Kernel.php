<?php

namespace App\Console;

use Modulus\Console\ModulusCLI;
use AtlantisPHP\Console\Application;

class Kernel
{
  /**
   * Boot the ModulusPHP Developer Environment CLI
   *
   * @return \AtlantisPHP\Console\Application $modulus
   */
  public static function console() : Application
  {
    ModulusCLI::$appdir = config('app.dir');
    ModulusCLI::$approot = config('app.root');

    $modulus = ModulusCLI::boot();
    $modulus->load(ModulusCLI::config());
    $modulus->load(__DIR__ . DS . 'Commands');

    return $modulus;
  }
}