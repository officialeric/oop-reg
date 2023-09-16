<?php

/*
{''''''''''''}
{  Erc Ernst }
{____________}
*/

if (!function_exists('myAutoloader')) {
    function myAutoloader($classname) {
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        if (strpos($url, 'includes')) {
            $path = '../classes/';
        } else if(strpos($url, 'classes')) {
            $path = './';
        }
        else {
            $path = 'classes/';
        }
        $ext = '.classes.php';
        $fullpath = $path . $classname . $ext;

        require_once($fullpath);
    }
    
    spl_autoload_register('myAutoloader');
}
