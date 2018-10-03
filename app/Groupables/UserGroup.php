<?php

namespace App\Groupables;

use App\User;
use Modulus\Utility\Groupable;

class UserGroup extends Groupable
{
  /**
   * $model
   *
   * @var Model
   */
  protected $model = User::class;
}