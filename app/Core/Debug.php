<?php

namespace App\Core;

use ModulusPHP\Framework\Core\Debugger;

class Debug
{
  /**
   * Info
   *
   * @param  string $text
   * @param  boolean $trace
   * @return output
   */
  public static function info($text = null, $trace = false)
  {
    (new Debugger)->output($text, $trace, '.INFO');
  }

  /**
   * Error
   *
   * @param  string $text
   * @param  boolean $trace
   * @return output
   */
  public static function error($text = null, $trace = false)
  {
    (new Debugger)->output($text, $trace, '.ERROR');
  }

  /**
   * Warning
   *
   * @param  string $text
   * @param  boolean $trace
   * @return output
   */
  public static function warning($text = null, $trace = false)
  {
    (new Debugger)->output($text, $trace, '.WARNING');
  }

  /**
   * Debug
   *
   * @param  string $text
   * @return
   */
  public static function debug($text = null)
  {
    $logfile = 'storage/logs/modulus.log';
    $text = print_r($text, true);
    file_put_contents($logfile, $text.PHP_EOL, FILE_APPEND);
  }
}