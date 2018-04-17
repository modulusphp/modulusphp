<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Migration extends Eloquent
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