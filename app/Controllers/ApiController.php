<?php

class ApiController extends Controller 
{
  /**
   * greet
   * 
   * @return array response
   */
  public function greet(Request $request)
  {
    return $this->response(array('message' => 'Hello '.$request->input('name')));
  }
  /**
   * Api documentation view
   * 
   * @return view
   */
  public function docs()
  {
    return View::make('app/api/docs');
  }
}