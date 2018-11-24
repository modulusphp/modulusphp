<?php

namespace App\Resolvers;

use Modulus\Framework\Upstart\Service;

class RouterResolver extends Service
{
  /**
   * Register application routes
   *
   * @param object $app
   * @return void
   */
  protected function boot($app) : void
  {
    $this->apiRoutes($app);
    $this->webRoutes($app);
  }

  /**
   * Load webRoutes
   *
   * @param object $app
   * @return void
   */
  protected function webRoutes($app) : void
  {
    $app->route->make(base_path('routes/web.php'))
        ->middleware('web')
        ->register();
  }

  /**
   * Load apiRoutes
   *
   * @param object $app
   * @return void
   */
  protected function apiRoutes($app) : void
  {
    $app->route->make(base_path('routes/api.php'))
        ->middleware('api')
        ->prefix('api')
        ->register();
  }
}
