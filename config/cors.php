<?php

return [
  'supportsCredentials' => false,
  'allowedOrigins' => ['*'],
  'allowedHeaders' => ['Content-Type', 'X-Requested-With'],
  'allowedMethods' => ['*'], // ex: ['GET', 'POST', 'PUT',  'DELETE']
  'exposedHeaders' => [],
  'maxAge' => 0,
];
