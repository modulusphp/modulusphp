<?php

namespace App\Core;

use App\Models\User;
use App\Http\Request;
use App\Touch\Compiler;
use JeffOchoa\ValidatorFactory;
use Illuminate\Database\Capsule\Manager as DB;

class Auth
{
  /**
   * isGuest
   * 
   * @return boolean __isGuest()
   */
  public static function isGuest()
  {
    return __isGuest();
  }

  /**
   * User
   * 
   * @return array user
   */
  public static function user()
  {
    if (__isGuest() != true) {
      $user = __user();

      if (filter_var(($user), FILTER_VALIDATE_EMAIL)) {
        return User::where('email', $user)->first();
      }

      return User::where('username', $user)->first();
    }

    return null;
  }

  /**
   * Attempt
   * 
   * @param  string $password
   * @param  string $hashed
   * @return boolean
   */
  private static function attempt($password, $hashed)
  {
    return password_verify($password, $hashed);
  }

  /**
   * Login
   * 
   * @param  array $request
   * @param  array $validator
   * @return array
   */
  public static function login($request, $validator = [])
  {
    $username = $request['username'];

    if (__user() != null) {
      return (object)array(
        'status' => 'failed',
        'reason' => 'user already already logged in'
      );
    }
    
    $valid = Auth::validate($request, $validator) != null ? Auth::validate($request, $validator)->toArray() : null ;

    if (@$request['modulus_referred'] != null || @$request['modulus_referred'] != Compiler::currentUrl()) {
      $_SERVER['HTTP_REFERRE'] = @$request['modulus_referred'];
    }
    
    if (filter_var(($username), FILTER_VALIDATE_EMAIL))
    {
      $email = $username;
      $user = DB::table('users')->where('email', $email)->first();

      if ($user !== null && $request['password'] != null)
      {
        if (self::attempt($request['password'], $user->password) == true) {
          if (__login($email)['status'] == 'success') {
            if (isset($request['modulus_referred'])) {
              if (0 === strpos($request['modulus_referred'], Compiler::host())) {
                return redirect($request['modulus_referred']);
              }
            }
            
            return (object)array(
              'status' => 'success',
              'modulus_referred' => @$request['modulus_referred']
            );
          }
        }

        return (object)array(
          'status' => 'failed',
          'submission' => (object)array(
            'modulus_referred' => @$request['modulus_referred'],
            'error' => 'Incorrect password',
            'data' => $request
          ),
          'validator' => $valid
        );
      }

      return (object)array(
        'status' => 'failed',
        'submission' => (object)array(
          'modulus_referred' => @$request['modulus_referred'],
          'error' => $email != '' && $request['password'] != null ? 'A user with the email "'.$email.'" does not exist' : '',
          'data' => $request
        ),
        'validator' => $valid
      );
    }
    
    // username
    $user = DB::table('users')->where('username', $username)->first();
    if ($user !== null && $request['password'] != null)
    {
      if (self::attempt($request['password'], $user->password) == true) {
        if (__login($username)['status'] == 'success') {
          if (isset($request['modulus_referred'])) {
            if (0 === strpos($request['modulus_referred'], Compiler::host())) {
              return redirect($request['modulus_referred']);
            }
          }

          return (object)array(
            'status' => 'success',
            'modulus_referred' => @$request['modulus_referred']
          );
        }
      }

      return (object)array(
        'status' => 'failed',
        'submission' => (object)array(
          'modulus_referred' => @$request['modulus_referred'],
          'error' => 'Incorrect password',
          'data' => $request
        ),
        'validator' => $valid
      );
    }

    return (object)array(
      'status' => 'failed',
      'submission' => (object)array(
        'modulus_referred' => @$request['modulus_referred'],
        'error' => $username != '' && $request['password'] != null ? 'A user with the username "'.$username.'" does not exist' : '',
        'data' => $request
      ),
      'validator' => $valid
    );

  }

  /**
   * Validate
   * 
   * @param  array $data
   * @param  array $validation
   * @return array
   */
  public static function validate($data = null, $validation = [])
  {
    if ($validation != []) {
      $factory = new ValidatorFactory();

      if ($data !== null && $validation !== []) {
        $response = $factory->make((array)$data, $validation);
        if ($response->fails()) {
          return $response->errors();
        }
      }
      
      return null;
    }
  }

  /**
   * Authorize
   * 
   * @param  string $user
   * @return redirect
   */
  public static function authorize($user)
  {
    if (__login($user->email)['status'] != 'success') {
      redirect('/register');
    }
    
  }

  /**
   * Logout
   * 
   * @return view
   */
  public static function logout()
  {
    if (isset($_SERVER['HTTP_REFERER'])) {
      if (0 === strpos($_SERVER['HTTP_REFERER'], Compiler::host()))
      {
        return __logout();
      }
      else {
        header('HTTP/1.0 400 Bad Request');
        return view('app/errors/400');
      }
    }
    else {
      header('HTTP/1.0 400 Bad Request');
      return view('app/errors/400');
    }
  }
}