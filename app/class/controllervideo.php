<?php
class controllervideo {
public $bv;
public $params;
public $current_action;
public $cname="controllergioithieu";
public $lang;
function __construct($action,$params){
	$this->bv = new modelvideo;
	$this->current_action=$action;
	$this->params = $params;
	$this->lang = 'vi';
}//construct

public function video(){
    require_once("view/quanlyvideo.php");
}

public function update(){
	$id = $_POST['id'];
    $link = $_POST['noidung1'];
     $noidung = $_POST['noidung2'];
     $this->bv->update($id,$link,$noidung);
  	require_once("view/quanlyvideo.php");
}


// public function updatevideo(){
// 	if(isset(submit))
// 	{
// 		$id = $_POST['id'];
//     	$tieude = $_POST['noidung1'];
//    		$link = $_POST['noidung2'];
// 	}
// }

}//class