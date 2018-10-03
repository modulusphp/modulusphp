<?php

namespace App\Events;

use Modulus\Utility\Event;
use Modulus\Framework\Mocks\FailedRoute;

class RoutesFailed extends Event
{
  use FailedRoute;
}