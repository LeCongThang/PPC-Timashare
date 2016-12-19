
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

public function delete($user){
    $sql = "DELETE FROM taikhoan WHERE tendangnhap = '$user' ";
    $kq = $this->db->query($sql);
    return true;
}

public  function update($user,$pass,$hoten,$diachi,$sodienthoai,$vaitro){
    $sql = "UPDATE taikhoan SET tendangnhap='$user',matkhau='$pass',id_vaitro='$vaitro',hoten='$hoten',
diachi='$diachi',dienthoai=$sodienthoai WHERE tendangnhap='$user'";
    $kq = $this->db->query($sql);
    return true;
}

    public function load($user){
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap='$user' limit 1 ";
        $kq = $this->db->query($sql);
        $row= $kq->fetch_assoc();
        return $row;
    }

}//class





