<?php

return [
  /*
  |
  |--------------------------------------------------------------------------
  | Hibernate Cache Settings
  |--------------------------------------------------------------------------
  |
  | Here you can configure the local storage cache, feel free to change
  | the expiry date.
  |
  | Changing the storage, is not recommended  but if you want to change
  | it, you can.
  |
  */
  'cache' => [
    'storage' => 'storage' . DS . 'framework' . DS . 'data',
  ],
];
