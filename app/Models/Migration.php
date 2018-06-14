<?php

namespace App\Models;

use ModulusPHP\Framework\Model;

class Migration extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title',
  ];
}