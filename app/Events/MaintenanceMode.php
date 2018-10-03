<?php

namespace App\Events;

use Modulus\Utility\Event;
use Modulus\Framework\Mocks\UnderMaintenance;

class MaintenanceMode extends Event
{
  use UnderMaintenance;
}