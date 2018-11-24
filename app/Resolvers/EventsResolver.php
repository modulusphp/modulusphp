<?php

namespace App\Resolvers;

use Modulus\Framework\Upstart\Service;

class EventsResolver extends Service
{
  /**
   * The event listener mappings for the application.
   *
   * @var array
   */
  protected $listen = [
    'client.error' => \App\Events\ClientErrors::class,
    'server.error' => \App\Events\ServerErrors::class,
  ];

  /**
   * Register application services
   *
   * @return void
   */
  protected function boot($app) : void
  {
    $app->events->register = $this->listen;
  }
}
