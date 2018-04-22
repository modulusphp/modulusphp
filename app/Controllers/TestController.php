<?php

class TestController extends Controller
{
  /**
   * This is the default method
   *
  */
  public function index()
  {
    echo 'TestController was successfully created!';
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