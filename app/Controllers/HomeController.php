<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class HomeController extends Controller
{
  /**
   * This method is used as the default routing system (Not recommended)
   * 
   * @param  string $view
   * @return view
   */
  public function index($view = null)
  {
    $view == null || $view == 'index' ? $view = 'welcome' : $view = $view ;
    return $this->view($view);
  }
}