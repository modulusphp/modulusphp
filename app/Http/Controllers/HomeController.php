<?php

namespace App\Http\Controllers;

use App\Core\Auth;
use App\Http\Controllers\Controller;

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
    view('welcome');
  }
}