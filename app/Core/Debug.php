<?php

class Debug
{
  /**
   * Info
   * 
   * @param  string $text
   * @param  boolean $trace
   * @return output
   */ 
  public function info($text = null, $trace = false)
  {
    Debug::output($text, $trace, '.INFO');
  }

  /**
   * Error
   * 
   * @param  string $text
   * @param  boolean $trace
   * @return output
   */
  public function error($text = null, $trace = false)
  {
    Debug::output($text, $trace, '.ERROR');
  }

  /**
   * Warning
   * 
   * @param  string $text
   * @param  boolean $trace
   * @return output
   */
  public function warning($text = null, $trace = false)
  {
    Debug::output($text, $trace, '.WARNING');
  }

  /**
   * Debug
   * 
   * @param  string $text
   * @return
   */
  public function debug($text = null)
  {
    $logfile = 'storage/logs/modulus.log';
    file_put_contents($logfile, $text.PHP_EOL, FILE_APPEND);
  }

  /**
   * Output
   * 
   * @param  string $text
   * @param  boolean $trace
   * @param  string $type
   * @return
   */
  private function output($text = null, $trace = false, $type = '.INFO:')
  {
    /**
     * ['file']
     * ['line']
     * ['function']
     * ['args']
     */
    $logfile = 'storage/logs/modulus.log';

    $currentdate = date("Y-m-d").' '.date("G:i:s");

    $key = array_search(__FUNCTION__, array_column(debug_backtrace(), 'function'));
    $file_trace = debug_backtrace()[$key]['file'];
    $line_trace = debug_backtrace()[$key]['line'];

    ($trace == true) ? $track_back = '['.$file_trace.'][line: '.$line_trace.']' : $track_back = '';

    file_put_contents($logfile, $track_back.'['.$currentdate.'] '.getenv('APP_ENV').$type.' '.$text.PHP_EOL, FILE_APPEND);
  }
}