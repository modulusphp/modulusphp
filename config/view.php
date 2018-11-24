<?php

return [

  /*
  |--------------------------------------------------------------------------
  | View Location
  |--------------------------------------------------------------------------
  |
  | Most templating systems load templates from disk. Here you may specify
  | an array of paths that should be checked for your views. Of course
  | the usual modulusPHP view path has already been registered for you.
  |
  */
  'views' => 'resources' . DS . 'views',

  /*
  |--------------------------------------------------------------------------
  | Compiled View Path
  |--------------------------------------------------------------------------
  |
  | This option determines where all the compiled Medusa templates will be
  | stored for your application. Typically, this is within the storage
  | directory. However, as usual, you are free to change this value.
  |
  */
  'compiled' => 'storage' . DS . 'framework' . DS . 'views',

  /*
  |--------------------------------------------------------------------------
  | Template Extension
  |--------------------------------------------------------------------------
  |
  | AtlantisPHP's Medusa allows you to set the default views extension.
  | You can set it to anything you want.
  |
  */
  'extension' => '.medusa.php',

  /*
  |--------------------------------------------------------------------------
  | Template Engine
  |--------------------------------------------------------------------------
  | Unlike most Templating engines, Medusa allows you to switch Engines.
  | modulusPHP uses Medusa by default, but you can change it.
  | Don't forget to update your views after changing the engine.
  |
  | Available Engines: 'modulus', 'blade'
  |
  */
  'engine' => 'modulus'

];
