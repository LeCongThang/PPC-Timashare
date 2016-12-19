<?php
class controllernghiduong {
public $bv;
public $params;
public $current_action;
public $cname="controllernghiduong";
public $lang;
function __construct($action,$params){
	$this->bv = new modelnghiduong;
	$this->current_action=$action;
	$this->params = $params;
	$this->lang = 'vi';
}//construct


public function nghiduong(){
    require_once("view/quanlynghiduong.php");
}

public function updatedata(){
	$id = $_POST['id'];
	$diachi = $_POST['noidung1'];
	$noidung = $_POST['noidung2'];
	$sodienthoai = $_POST['noidung3'];
	$hinh = $_POST=['img'];
	$this->bv->update($id,$diachi,$noidung,$sodienthoai,$hinh);
	require_once("view/quanlynghiduong.php");
}



}//class
