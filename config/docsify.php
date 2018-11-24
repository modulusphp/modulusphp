<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Documentations config file
  |--------------------------------------------------------------------------
  | See: https://docsify.js.org/#/configuration
  |
  */

  'config' => [
    'name' => 'Modulus',
    'repo' => '',
    'basePath' => '/api-docs',
    'loadSidebar' => true,
    'search' => [
      'noData' => [
        '/' => 'No results!'
      ],
      'paths' => 'auto',
      'placeholder' => [
        '/' => 'Search'
      ]
    ]
  ],

  'scripts' => [
    '//unpkg.com/docsify/lib/docsify.min.js',
    '//unpkg.com/docsify/lib/plugins/search.min.js'
  ],

  'sheets' => [
    '//unpkg.com/docsify/lib/themes/vue.css'
  ]
];
