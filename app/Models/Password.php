<?php

namespace App\Models;

use App\Core\Session;
use ModulusPHP\Framework\Model;

class Password extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'email', 'token',
  ];

  protected $table = 'password_resets';

  /**
   * Creating a Secure, Random String
   */
  public static function token($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
  {
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces[] = $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
  }

  /**
   * Check when token was generated
   * 
   * @param  string $token
   * @return boolean
   */
  public static function verify($token)
  {
    $userToken = Password::where('token', $token)->first();

    if ($userToken == null) {
      return false;
    }

    if ($userToken->created_at->diffInMinutes() <= config('app.reset_token.expire')) {
      if (Session::has('token')) {
        if (Session::key('token') == $userToken->token) {
          return true;
        }
        else {
          Session::delete('token');
          return false;
        }
      }
      else {
        return false;
      }
    }

    $userToken->delete();
    return false;
  }
}