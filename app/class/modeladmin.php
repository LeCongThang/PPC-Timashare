<?php
class modeladmin{

public $db;

public function __construct(){

	$this->db= new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);	
	$this->db->set_charset("utf8");

} //construct

public function closeDatabase(){
    if($this->db){
        mysqli_close($this->db);
    }
}

public function getdatabase(){
    $sql = "SELECT * FROM gioithieu";
    $kq = $this->db->query($sql);
    $row = $kq->fetch_assoc();
    return $row;
}


public function xulydangnhap($sql){
    if(!$kq = $this->db->query($sql))
        die($this->db->error);

    if($kq->num_rows==0)
        return false;
    $row = $kq->fetch_assoc();
    $_SESSTION['tendangnhap'] = $row['tendangnhap'];
    
    return true;
}// xulydangnhap
}//class
