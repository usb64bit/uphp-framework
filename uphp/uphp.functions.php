<?php
defined("ROOT") or die('Error id#11444.4111711017');
function uphp_load_class($str)
{
    if(is_file(ROOT . DS . 'application' . DS . 'classes' . DS . $str . '.php'))
        require_once(ROOT . DS . 'application' . DS . 'classes' . DS . $str . '.php');
    else 
        die('class not found');
}

function uphp_load_plugins($str)
{
    if(is_file(ROOT . DS . 'application' . DS . 'plugins' . DS . $str . '.php'))
        require_once(ROOT . DS . 'application' . DS . 'plugins' . DS . $str . '.php');
    else 
        die('plugin not found');
}

function uphp_load_model($str)
{
    if(is_file(ROOT . DS . 'application' . DS . 'models' . DS . $str . '.php'))
        require_once(ROOT . DS . 'application' . DS . 'models' . DS . $str . '.php');
    else 
        die('model not found');
}

//for non important tokens
function uphp_make_token()
{
    $token = md5(uniqid(rand(), TRUE));
    setcookie('uphpToken', $token, time()+1000);
    return $token;
}

function uphp_check_token($token)
{
    if(!empty($_COOKIE['uphpToken']) && $_COOKIE['uphpToken'] == $token)
        return true;
    else
        return false;
}

//from danjr33 AT [google]mail.com 25-May-2010 11:04 @ php.net
function uphp_cookie($name, $value='', $expire=0, $path='', $domain='', $secure=false, $httponly=false) {
    //set a cookie as usual, but ALSO add it to $_COOKIE so the current page load has access
    $_COOKIE[$name] = $value;
    return setcookie($name,$value,$expire,$path,$domain,$secure,$httponly);
}