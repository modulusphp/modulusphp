<?php

class ApiController extends Controller 
{
  /**
   * The api controller index method uses "POST" method by default. 
   * If this method is called from a get, it will return a 400 status code
   * 
   * @param  array $request
   * @return response
   */
  public function index($request = null) 
  {
    return $this->response($response);
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