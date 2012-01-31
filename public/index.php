<?php	
/*
 *  Error reporting:    0 for in production
 *                      -1 for development              
 */

error_reporting(-1);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

$request_url = explode(' ',trim(str_replace('/', ' ', $_SERVER['REQUEST_URI'])));
foreach ($request_url as $key => $value)
{
    $request_url[$key] = preg_replace('/[^a-z 0-9~&?%.:_\-]+/i', '', $value);
}  

require_once (ROOT . DS . 'uphp' . DS . 'bootstrap.php');

$application = new core();
$application->runController($request_url);