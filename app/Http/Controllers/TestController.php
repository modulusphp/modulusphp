<?php

namespace App\Http\Controllers;

use ModulusPHP\File\File;
use ModulusPHP\Mail\Mail;
use App\Http\Controllers\Controller;
use ModulusPHP\Http\Requests\Request;

class TestController extends Controller
{
  /**
   * This is the default method
   *
  */
  public function index($name, $age)
  {
    echo 'Hello '.ucfirst($name).', you are '.$age.' years old!';
  }

  /**
   * C Modulus test
   */
  public function cmodulus($name = "Donald") {
    view('test/cmodulus/c', compact('name'));
  }

  /**
   * For test
   */
  public function for()
  {
    return view('test/control-structure/for');
  }

  /**
   * Foreach test
   */
  public function foreach()
  {
    $data = array(
      'name' => 'Donald',
      'age' => 20,
      'city' => 'East Rand'
    );

    return view('test/control-structure/foreach', compact('data'));
  }

  /**
   * If test
   */
  public function if($name = "Donald")
  {
    return view('test/control-structure/if', compact('name'));
  }

  /**
   * Foreach test
   */
  public function while()
  {
    return view('test/control-structure/while');
  }

  /**
   * upload image from a post request
   */
  public function storeProfilePic(Request $request)
  {
    if ($request->hasFile('profile_pic')) {
      $file = new File('images/');
      $response = $file->upload($request->file('profile_pic'), true, uniqid('picture_'));
      response($response);
    }
  }

  /**
   * send email
   */
  public function send(Request $request)
  {
    $email = new Mail;
  
    $email->subject = "Test Email!";

    /**
     * you can comment this line out if you are
     * using the .env file
     */
    $email->from('your email address', 'your name');
    /*--------------------------------------------*/

    if ($request->hasFile('profile_pic')) {
      $file = $request->file('profile_pic');
      $email->attachment($file['tmp_name'], $file['name']);
    }
    
    $email->to($request->input('email'));
    $email->view('app/email/test');

    $res = $email->send();

    if ($res['status'] == "success") {
      echo "Success!";
    }
    else {
      echo $res['reason'];
    }
  }
}