<?php

namespace App\Core\Filesystem;

class File
{
  private $extendedPath = '';

  public function __construct($folderName)
  {
    $this->location($folderName);
  }
  /**
   * Set location
   * 
   * @param  string $folderName
   * @return
   */
  public function location($folderName)
  {
    $this->extendedPath = $folderName;
    if (is_dir('../storage/uploads/'.$folderName) === false) {
      mkdir('../storage/uploads/'.$folderName, 0777, true);
    }
    if (is_dir('uploads/'.$folderName) === false) {
      mkdir('uploads/'.$folderName, 0777, true);
    }
  }

  /**
   * Upload file
   * 
   * @param  string $file
   * @param  boolean $private
   * @param  string $name
   * @param  boolean $extensionOn
   * @return array
   */
  public function upload($file, $private = true, $name = null, $extensionOn = true)
  {
    $private == true ? $path = '../storage/uploads/' : $path = '..'.$this->root().'/uploads/';

    $ext = '';
    $extensionOn == true ? $ext = '.'.pathinfo($file['name'], PATHINFO_EXTENSION) : $ext = '' ;

    if ($name != null) {
      $targetFile = $path.$this->extendedPath.$name.$ext;
    }
    else {
      $targetFile = $path.$this->extendedPath.basename($file['name']);
    }

    if (file_exists($targetFile)) {
      return array('status' => 'failed', 'reason' => 'file already exists');
    }

    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
      return array('status' => 'success', 'path' => $targetFile);
    }
    else {
      return array('status' => 'failed', 'reason' => 'something went wrong');
    }
  }

  private function root() {
    $service = require '../app/Config/app.php';
    $appRoot = $service['app']['root'];

    $appRoot = $appRoot != null ? $appRoot : '/public' ;

    if ($appRoot[0] != "/") {
      $appRoot = '/'.$appRoot;
    }
    return $appRoot;
  }
}