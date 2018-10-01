<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Default Database Connection Name
  |--------------------------------------------------------------------------
  |
  | Here you may specify which of the email connections below you wish
  | to use as your default connection. Of course you may use many
  | connections at once using the Mail Component.
  |
  */

  'default' => env('MAIL_CONNECTION', 'default'),

  /*
  |--------------------------------------------------------------------------
  | Email View
  |--------------------------------------------------------------------------
  |
  | You can specify the default email view template.
  |
  |
  */

  'view' => 'app.mail.default',

  /*
  |--------------------------------------------------------------------------
  | Email Connections
  |--------------------------------------------------------------------------
  |
  | Here is a email connections setup for your application.
  |
  |
  */

  'connections' => [
    'default' => [
      /*
      |--------------------------------------------------------------------------
      | SMTP Host Address
      |--------------------------------------------------------------------------
      |
      | Here you may provide the host address of the SMTP server used by your
      | applications. A default option is provided that is compatible with
      | the Mailgun mail service which will provide reliable deliveries.
      |
      */

      'host' => env('MAIL_HOST', 'smtp.example.com'),

      /*
      |--------------------------------------------------------------------------
      | SMTP Host Port
      |--------------------------------------------------------------------------
      |
      | This is the SMTP port used by your application to deliver e-mails to
      | users of the application. Like the host we have set this value to
      | stay compatible with the Mailgun e-mail application by default.
      |
      */

      'port' => env('MAIL_PORT', 587),

      /*
      |--------------------------------------------------------------------------
      | Global "From" Address
      |--------------------------------------------------------------------------
      |
      | You may wish for all e-mails sent by your application to be sent from
      | the same address. Here, you may specify a name and address that is
      | used globally for all e-mails that are sent by your application.
      |
      */

      'from' => [
        'address' => env('MAIL_FROM_ADDRESS', env('MAIL_USERNAME')),
        'name' => env('MAIL_FROM_NAME', env('APP_NAME')),
      ],

      /*
      |--------------------------------------------------------------------------
      | E-Mail Encryption Protocol
      |--------------------------------------------------------------------------
      |
      | Here you may specify the encryption protocol that should be used when
      | the application send e-mail messages. A sensible default using the
      | transport layer security protocol should provide great security.
      |
      */

      'encryption' => env('MAIL_SMTP_SECURE', 'tls'),

      /*
      |--------------------------------------------------------------------------
      | SMTP Server Username
      |--------------------------------------------------------------------------
      |
      | If your SMTP server requires a username for authentication, you should
      | set it here. This will get used to authenticate with your server on
      | connection. You may also set the "password" value below this one.
      |
      */

      'username' => env('MAIL_USERNAME'),
      'password' => env('MAIL_PASSWORD'),
    ],
  ]

];