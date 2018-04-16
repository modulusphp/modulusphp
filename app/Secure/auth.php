<?php

use Birke\Rememberme\Authenticator;
use Birke\Rememberme\Storage\FileStorage;

/**
 * Need to rewrite this crap...
 */

function __isGuest()
{
  // Initialize RememberMe Library with file storage
  $storagePath = '../storage/tokens';
  if (!is_writable($storagePath) || !is_dir($storagePath)) {
      die(
          "'$storagePath' does not exist or is not writable by the web server.\n".
          "To run the example, please create the directory and give it the correct permissions."
      );
  }
  $storage = new FileStorage($storagePath);
  $rememberMe = new Authenticator($storage);

  $loginResult = $rememberMe->login();

  // if user is not set then return true
  if (isset($_SESSION['user'])) {
    if ($_SESSION['user'] == null)
    {
      return true;
    }
    else {
      return false;
    }
  }
  
  return true;
}

function __beforeLogin()
{
  // Initialize RememberMe Library with file storage
  $storagePath = '../storage/tokens';
  if (!is_writable($storagePath) || !is_dir($storagePath)) {
      die(
          "'$storagePath' does not exist or is not writable by the web server.\n".
          "To run the example, please create the directory and give it the correct permissions."
      );
  }
  $storage = new FileStorage($storagePath);
  $rememberMe = new Authenticator($storage);

  $loginResult = $rememberMe->login();

  if ($loginResult->isSuccess()) {
    $_SESSION['user'] = $loginResult->getCredential();
    // There is a chance that an attacker has stolen the login token, so we store
    // the fact that the user was logged in via RememberMe (instead of login form)
    $_SESSION['remembered_by_cookie'] = true;

    return;
  }

  if ($loginResult->hasPossibleManipulation()) {
    exit();
  }

  // Log out when tokens have expired and user is still logged in with remember me
  // This state can happen in two cases:
  // a) The triples were cleared after an attack or a "global logout"
  // b) The triples have expired
  if ($loginResult->isExpired() && !empty($_SESSION['user']) && !empty($_SESSION['remembered_by_cookie'])) {
    $rememberMe->clearCookie();
    unset($_SESSION['username']);
    unset($_SESSION['remembered_by_cookie']);
    // render_template('login', 'You were logged out because the "Remember Me" cookie was no longer valid.');
    exit();
  }

  if ($loginResult->isExpired() && !empty($_SESSION['user'])) {
    // Do rate limiting here. Lots of requests for non-existing triplets can be an indicator of a brute force attack
    sleep(5);
  }
}

function __user()
{
  __beforeLogin();
  if (isset($_SESSION['user'])) {
    return $_SESSION['user'];
  }
}

function __login($user)
{
  // Initialize RememberMe Library with file storage
  $storagePath = '../storage/tokens';
  if (!is_writable($storagePath) || !is_dir($storagePath)) {
      die(
          "'$storagePath' does not exist or is not writable by the web server.\n".
          "To run the example, please create the directory and give it the correct permissions."
      );
  }
  $storage = new FileStorage($storagePath);
  $rememberMe = new Authenticator($storage);

  $_SESSION['user'] = $user;
  $rememberMe->createCookie($user);

  return array(
    'status' => 'success'
  );
}

function __logout()
{
    // Initialize RememberMe Library with file storage
    $storagePath = '../storage/tokens';
    if (!is_writable($storagePath) || !is_dir($storagePath)) {
        die(
            "'$storagePath' does not exist or is not writable by the web server.\n".
            "To run the example, please create the directory and give it the correct permissions."
        );
    }
    $storage = new FileStorage($storagePath);
    $rememberMe = new Authenticator($storage);

    $storage->cleanAllTriplets($_SESSION['user']);
    $_SESSION = [];
    session_regenerate_id();
    $rememberMe->clearCookie();

    return array(
        'status' => 'success'
    );
}