<?php 
$lang='vi';
session_start();
require_once "config.php";

$url = $_SERVER['REQUEST_URI'];
//$kq = tach_url($url, $lang, $cname, $action, $params);
$kq = tach_url($url, $cname, $action, $params);

// if (class_exists($cname, true)==true) 
// 	$c = new $cname($action, $params, $lang);
// else 
if (class_exists($cname, true)==true) 
	$c = new $cname($action, $params);
else 
	die('Khong co controller '. $cname);
ob_start();

if (method_exists($c, $action))
	$c ->$action();
else 
	die('Khong co action'. $action);

$str=ob_get_clean();
$str = str_replace("{TrangChu}" , TrangChu , $str);
$str = str_replace("{GioiThieu}" , GioiThieu , $str);
$str = str_replace("{KhuNghiDuong}" , KhuNghiDuong, $str);
$str = str_replace("{ThamGia}" , ThamGia, $str);
$str = str_replace("{TroGiup}" , TroGiup, $str);
$str = str_replace("{LienHe}" , LienHe, $str);
echo $str;


function __autoload($class_name){
	$filename = "class/".$class_name.".php";
	if(file_exists($filename))
		require_once($filename);
}// autoload

//function tach_url($url, &$lang, &$cname, &$action, &$params){
function tach_url($url, &$cname, &$action, &$params){
	$arr = explode("/", $url);
	if (count($arr)<=2)
		return FALSE;
	
	// $lang= $arr[2];
	// if (in_array(  $lang, explode(',',NGONNGU)  )==false) 
	// 	$lang='vi';

	// if(count($arr)==3){
	// 	if($cname==""){
	// 	$cname = DEFAULT_CONTROLLER;
	// 	$action = DEFAULT_ACTION;
	// 	$params = NULL;
	// 	return TRUE;
	// 	}
	// }

	$cname = $arr[2];
	if($cname==""){
		$cname = DEFAULT_CONTROLLER;
		$action = DEFAULT_ACTION;
		$params = NULL;
		return TRUE;
	}

	$action = $arr[3];
	if($action==""){
		$action = DEFAULT_ACTION;
		$params = NULL;
		return TRUE;
	}

	array_shift($arr);
	array_shift($arr);
	array_shift($arr);
	array_shift($arr);
	//array_shift($arr);

	$params = $arr;

	return TRUE;
}// tach_url