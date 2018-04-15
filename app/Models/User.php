<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'username', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = password_hash($value, PASSWORD_BCRYPT);
  }
}