<?php

class HomeController extends Controller
{
  /**
   * This is the home page
   * 
   * @param  string  $view
   * @return view
   */
  public function index()
  {
    return $this->view('welcome');
  }
}