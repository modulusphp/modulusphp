<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
  /**
   * Show welcome page
   *
   * @return void
   */
  public function welcome() : void
  {
    view('welcome');
  }

  /**
   * Show home page
   *
   * @return void
   */
  public function home() : void
  {
    view('home');
  }
}
