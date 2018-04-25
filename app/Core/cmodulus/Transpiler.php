<?php

class Transpiler
{
  public function compile($script)
  {
    // func
    $script = preg_replace('/\bfunc\b (.*?)\{/', "function $1 {", $script);

    // echo
    $script = preg_replace('/\becho\b (.*?)\;/', "document.write($1)", $script);
    
    // println
    $script = preg_replace('/\bprintln\b (.*?)\;/', "console.log($1);", $script);

    // error
    $script = preg_replace('/\berror\b (.*?)\;/', "console.error($1);", $script);

    // if
    $script = preg_replace('/\bif\b (.*?) \{/', "if ($1) {", $script);
    
    // while
    $script = preg_replace('/\bwhile\b (.*?) \{/', "while ($1) {", $script);

    // for
    $script = preg_replace('/\bfor\b (.*?) \{/', "for ($1) {", $script);

    // catch
    $script = preg_replace('/\bcatch\b (.*?) \{/', "catch ($1) {", $script);

    /**
     * Variables
     */

    // @string
    $script = preg_replace('/\bstring\b (.*?)\;/', "var $1;", $script);

    // @int
    $script = preg_replace('/\bint\b (.*?)\;/', "var $1;", $script);

    // @bool
    $script = preg_replace('/\bbool\b (.*?)\;/', "var $1;", $script);

    return "<script>".$script."</script>";
  }
}