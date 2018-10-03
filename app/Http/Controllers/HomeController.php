<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
  /**
   * Show home page
   *
   * @return \Modulus\Utility\View
   */
  public function index()
  {
    return view('home');
  }
}
