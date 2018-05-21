<?php

namespace App\Grammar;

use ModulusPHP\Touch\Fluent;
use ModulusPHP\Touch\Grammar as Touch;

class Grammar extends Touch implements Fluent
{
  /**
   * This is where you can extend the modulus templating language
   */
  public function handle()
  {
    /**
     * Example
     * 
     * |------------------------------------------------------------------|
     * 
     *  $code = $this->translate('/\@\bdate\b\((.*)\)/', function($match) {
     *     return "<?php echo date($match[1]); ?>";
     *  });
     * 
     *  return $code;
     * 
     * |------------------------------------------------------------------|
     * 
     * usage: @date('D M Y')
     */

    return $this->code;
  }
}