<?php
error_reporting(E_ALL);
session_start();
//phpinfo();
ini_set('display_errors', 1);
require_once "config.php";
require_once "helper.php";
$url = $_SERVER['REQUEST_URI'];

$kq = tach_url($url, $cname, $action, $params);


if (class_exists($cname, true)==true)
    $c = new $cname($action, $params);
else
    die('Khong co controller ' . $cname);

if (method_exists($c, $action))
    $c->$action();
else
    die('Khong co action' . $action);



function __autoload($class_name)
{
    $filename = "class/" . $class_name . ".php";
    if (file_exists($filename))
        require_once($filename);
}// autoload

function tach_url($url, &$cname, &$action, &$params){
    $arr = explode("/", $url);
    if (count($arr) <= 3)
        return FALSE;

    $cname = $arr[3];
    if ($cname == "") {
        $cname = DEFAULT_CONTROLLER;
        $action = DEFAULT_ACTION;
        $params = NULL;
        return TRUE;
    }

    $action = $arr[4];
    if ($action == "") {
        $action = DEFAULT_ACTION;
        $params = NULL;
        return TRUE;
    }

    array_shift($arr);
    array_shift($arr);
    array_shift($arr);
    array_shift($arr);
    array_shift($arr);
    $params = $arr;
    return TRUE;

}// tach_url