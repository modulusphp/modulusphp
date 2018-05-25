<?php

namespace App\Models;

use App\Core\Session;
use ModulusPHP\Mail\Mail;
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

  /**
   * Encrypt the password using BCrypt
   */
  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = password_hash($value, PASSWORD_BCRYPT);
  }

  /**
   * Check if user exists
   *
   * @param  string $username
   * @param  string $email
   * @return response
   */
  public static function check($username)
  {
    $response = array();
    $usernameError = array('username' => 'A user with the username "'.$username.'" doesn\'t exist.');
    $emailError = array('email' => 'A user with the email "'.$username.'" doesn\'t exist.');

    if (filter_var(($username), FILTER_VALIDATE_EMAIL)) {
      $checkEmail = User::where('email', $username)->first();

      if ($checkEmail == null) {
        $response = array_merge($response, $emailError);
      }
    }
    else {
      $checkUsername = User::where('username', $username)->first();

      if ($checkUsername == null) {
        $response = array_merge($response, $usernameError);
      }
    }

    return $response;
  }

  /**
   * Look for a user by username or email address
   */
  public static function search($username = null)
  {
    if (filter_var(($username), FILTER_VALIDATE_EMAIL)) {
      $checkEmail = User::where('email', $username)->first();
      return $checkEmail;
    }
    else {
      $checkUsername = User::where('username', $username)->first();
      return $checkUsername;
    }
  }

  /**
   * Generate a token and send it to the user.
   */
  public function notify()
  {
    if ($this == null) {
      return array(
        'status' => 'failed',
        'reason' => 'User doesn\'t exist'
      );
    }

    $token = Password::token(30);
    $username = $this->username;
    $email = new Mail;

    $email->to($this->email);
    $email->view('app.email.reset', compact('username', 'token'));

    $res = $email->send('click on the button below to reset your password', 'Forgot password?');

    if ($res['status'] == 'success') {
      Password::create([
        'email' => $this->email,
        'token' => $token
      ]);

      Session::key('token', $token);
    }
    
    return $res;
  }
}