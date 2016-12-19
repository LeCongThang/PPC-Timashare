
<?php
class modeltaikhoan{

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

public function layuser($user,$pass,$hoten,$diachi,$dienthoai,$id){
    $sql="DELETE taikhoan SET tendangnhap='$user', matkhau='$pass',id_vaitro='$id', hoten='$hoten',diachi = '$diachi',dienthoai = '$dienthoai'   WHERE user='".$user."'";
    $kq = $this->db->query($sql);
    return true;	
}

}//class





