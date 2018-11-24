<?php

/**
 * Modulus - A cool API Framework for PHP
 *
 * @package  modulusphp
 * @author   Donald Pakkies <donaldpakkies@gmail.com>
 */

define('MODULUS_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

use Modulus\Framework\{Blulight, Upstart};

require __DIR__. '/../vendor/autoload.php';

/*
|-------------------------------------------------------------------------
| Application requirements
|-------------------------------------------------------------------------
|
| Set Global variables
|
*/

define('APP_ROOT', __DIR__ . DS . '..' . DS);

/*
|--------------------------------------------------------------------------
| Start The Application
|--------------------------------------------------------------------------
|
| Blulight is responsible for starting the session and loading and storing
| previous session variables into a class called Variables.
|
| Upstart is responsible for booting the Modulus, starting the router,
| loading the application request, starting the middleware, booting the
| database, loading the environment variables, the view component,
| basically booting the applicaion as a whole.
|
*/

Blulight::start();

(new Upstart)->boot();
