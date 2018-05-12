<?php

namespace App\Touch;

interface Transpiler
{
  public function compile($raw);
}