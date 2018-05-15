<?php

namespace App\Grammer;

use App\Touch\Fluent;
use App\Touch\Grammer;

class Example extends Grammer implements Fluent
{
  public function handle()
  {
    return $this->code;
  }
}