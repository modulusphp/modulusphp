<?php

namespace App\Console;

use GO\Scheduler as Schedule;
use Modulus\Console\ModulusCLI;
use AtlantisPHP\Console\Application;
use Modulus\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
  /**
   * Start scheduler
   *
   * @param Schedule $scheduler
   * @return void
   */
  protected function schedule(Schedule $scheduler)
  {
    //
  }

  /**
   * Boot the Modulus Developer Environment CLI
   *
   * @return \AtlantisPHP\Console\Application $modulus
   */
  public static function console() : Application
  {
    return ModulusCLI::boot()->load(__DIR__ . DS . 'Commands');
  }
}