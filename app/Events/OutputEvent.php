<?php

namespace App\Events;

use Modulus\Utility\Event;

class OutputEvent extends Event
{
  /**
   * Handle event
   *
   * @param string $env
   * @param string $level
   * @param string $message
   * @param array $array
   * @return void
   */
  protected function handle(string $env, string $level, string $message, array $array)
  {
    // don't send anything back to the logger
  }
}