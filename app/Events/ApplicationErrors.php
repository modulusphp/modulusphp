<?php

namespace App\Events;

use Modulus\Utility\Event;
use Modulus\Framework\Mocks\InternalError;

class ApplicationErrors extends Event
{
  use InternalError;
}