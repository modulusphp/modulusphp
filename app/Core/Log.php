<?php

namespace App\Core;

use Dotenv;

class Log
{
  /**
   * Info
   * 
   * @param  string  $text
   * @param  boolean $trace
   * @return output
   */
  public static function info($text = null, $trace = false)
  {
    Log::output($text, $trace, '.INFO');
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
    Log::output($text, $trace, '.ERROR');
  }

  /**
   * Warning
   * 
   * @param  string  $text
   * @param  boolean $trace
   * @return output
   */
  public static function warning($text = null, $trace = false)
  {
    Log::output($text, $trace, '.WARNING');
  }

  /**
   * Debug
   * 
   * @param  string  $text
   * @return
   */
  public static function debug($text = null)
  {
    $logfile = '../storage/logs/modulus.log';
    $text = print_r($text, true);
    file_put_contents($logfile, $text.PHP_EOL, FILE_APPEND);
  }

  /**
   * Output
   * 
   * @param  string  $text
   * @param  boolean $trace
   * @param  string  $type
   * @return
   */
  private static function output($text = null, $trace = false, $type = '.INFO:')
  {
    /**
     * ['file']
     * ['line']
     * ['function']
     * ['args']
     */
    $logfile = '../storage/logs/modulus.log';

    $dotenv = new Dotenv\Dotenv(__DIR__.'/../../');
    $dotenv->load();

    $currentdate = date("Y-m-d").' '.date("G:i:s");

    $key = array_search(__FUNCTION__, array_column(debug_backtrace(), 'function'));
    $file_trace = debug_backtrace()[$key]['file'];
    $line_trace = debug_backtrace()[$key]['line'];

    ($trace == true) ? $track_back = '['.$file_trace.'][line: '.$line_trace.']' : $track_back = '';

    $text = print_r($text, true);

    file_put_contents($logfile, $track_back.'['.$currentdate.'] '.getenv('APP_ENV').$type.' '.$text.PHP_EOL, FILE_APPEND);
  }
}