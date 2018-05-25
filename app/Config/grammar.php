<?php

/*
|--------------------------------------------------------------------------
| Application Grammar
|--------------------------------------------------------------------------
|
| This is where you should add new application grammar.
|
*/

return [

  'modulus' => [
    'enabled' => true,
    'class' => ModulusPHP\Touch\Modulus::class
  ],
  'default' => [
    'enabled' => true,
    'class' => App\Grammar\Grammar::class
  ],
  'don47-blade' => [
    'enabled' => false,
    'class' => Don47\Grammar\Blade::class
  ],

];