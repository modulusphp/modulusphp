<?php

class TestController extends Controller
{
  public function __construct()
  {
    $this->allowed('local');
  }

  /**
   * This is the default method
   *
  */
  public function index($name, $age)
  {
    echo 'Hello '.ucfirst($name).', you are '.$age.' years old!';
  }

  public function user($name)
  {
    $this->response(User::where('username', $name)->first());
  }
  
  /**
   * C Modulus test
   */
  public function cmodulus($name = "Donald") {
    $this->view('test/cmodulus/c', compact('name'));
  }

  /**
   * For test
   */
  public function for()
  {
    return $this->view('test/control-structure/for');
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

    return $this->view('test/control-structure/foreach', compact('data'));
  }

  /**
   * If test
   */
  public function if($name = "Donald")
  {
    return $this->view('test/control-structure/if', compact('name'));
  }

  /**
   * Foreach test
   */
  public function while()
  {
    return $this->view('test/control-structure/while');
  }
}