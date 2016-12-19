<?php
class model{

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

public function laydanhsach($bang){
    $sql = "SELECT * FROM ".$bang;
    if(!$kq = $this->db->query($sql))
        die($this->db->error);
    foreach ($kq as $row) {
        $data = $row;
    }
    return $data; 
}

public function laymail(){
    $sql = "SELECT * FROM lienhe WHERE trangthai = 0";
    if(!$kq = $this->db->query($sql))
        die($this->db->error);
    foreach ($kq as $row) {
        $data = $row;
    }
    return $data; 
}

public function dakiemtramail($id){
    $sql = "UPDATE 'lienhe' SET 'trangthai' = '1' WHERE 'id' = ".$id;
    if(!$kq = $this->db->query($sql))
        die($this->db->error);
    return true; 
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

public function themTaiKhoan($tendangnhap,$matkhau,$hoten,$diachi,$dienthoai,$loaithaikhoan)
    {
        $sql = "insert into taikhoan values ('".$tendangnhap."','".md5($matkhau)."',".$loaithaikhoan.",'".$hoten."','".$diachi."','".$dienthoai."')";
        return mysqli_query($this->db, $sql);
    }

public function themLienHe($ten,$dienthoai,$email,$tinnhan)
    {
        $sql = "insert into lienhe(ten_lienhe,sdt_lienhe,email_lienhe,conten_lienhe,trangthai) values ('".$ten."','".$dienthoai."','".$email."','".$tinnhan."',0)";
        return mysqli_query($this->db, $sql);
    }

}//class
