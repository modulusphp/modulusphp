<?php

class Transcompiler
{
  public function compile($script)
  {
    // func
    $script = preg_replace('/func (.*?)\{/', "function $1 {", $script);

    // echo
    $script = preg_replace('/echo (.*?)\;/', "document.write($1)", $script);
    
    // println
    $script = preg_replace('/println (.*?)\;/', "console.log($1);", $script);

    // error
    $script = preg_replace('/error (.*?)\;/', "console.error($1);", $script);

    // if
    $script = preg_replace('/if (.*?) \{/', "if ($1) {", $script);
    
    // while
    $script = preg_replace('/while (.*?) \{/', "while ($1) {", $script);

    // for
    $script = preg_replace('/for (.*?) \{/', "for ($1) {", $script);

    // catch
    $script = preg_replace('/catch (.*?) \{/', "catch ($1) {", $script);

    /**
     * Variables
     */

    // @string
    $script = preg_replace('/string\b (.*?)\;/', "var $1;", $script);

    // @int
    $script = preg_replace('/int\b (.*?)\;/', "var $1;", $script);

    // @bool
    $script = preg_replace('/bool\b (.*?)\;/', "var $1;", $script);

    return "<script>".$script."</script>";
  }
}