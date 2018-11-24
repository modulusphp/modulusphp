<?php

namespace App\Events;

use Modulus\Framework\Events\ClientErrors as Event;

class ClientErrors extends Event
{
  /*
  |-----------------------------------------------------------
  | Client Errors
  |-----------------------------------------------------------
  |
  | This Base event handles some client related errors.
  | You can modify client errors by overriding the default
  | functions.
  |
  | Functions you can override: "renderAccessDenied",
  | "renderNotFound", "renderNotAllowed",
  | "renderTooManyRequests"
  |
  */
}
