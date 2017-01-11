<?php

class modeltaikhoan
{

    public $db;

    public function __construct()
    {

        $this->db = new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);
        $this->db->set_charset("utf8");

    } //construct

    public function closeDatabase()
    {
        if ($this->db) {
            mysqli_close($this->db);
        }
    }

    public  function laydanhsachtaikhoan(){
        $sql = "SELECT * FROM taikhoan WHERE id_vaitro = 1";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public  function laydanhsachtaikhoandk(){
        $sql = "SELECT * FROM taikhoandangky WHERE trangthai_taikhoandk = 1";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }
    public  function laydanhsachtaikhoandk_daduyet(){
        $sql = "SELECT * FROM taikhoandangky WHERE trangthai_taikhoandk = 0";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function delete($user)
    {
        $sql = "DELETE FROM taikhoan WHERE tendangnhap = '$user' ";
        $kq = $this->db->query($sql);
        return true;
    }

    public function deleteAccount($user)
    {
        $sql = "DELETE FROM taikhoandangky WHERE email_taikhoandk = '$user' ";
        $kq = $this->db->query($sql);
        return true;
    }

    public function update($user, $pass, $hoten, $diachi, $sodienthoai, $vaitro)
    {
        $sql = "UPDATE taikhoan SET tendangnhap='$user',matkhau='$pass',id_vaitro='$vaitro',hoten='$hoten',
diachi='$diachi',dienthoai=$sodienthoai WHERE tendangnhap='$user'";
        $kq = $this->db->query($sql);
        return true;
    }

    public function layThongTinUser($user)
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap='$user' limit 1 ";
        $kq = $this->db->query($sql);
        $row = $kq->fetch_assoc();
        return $row;
    }

    public function themTaiKhoan($tendangnhap, $matkhau, $hoten, $diachi, $dienthoai)
    {
        $sql = "insert into taikhoan(tendangnhap,matkhau,id_vaitro,hoten,diachi,dienthoai) values ('" . $tendangnhap . "','" . md5($matkhau) . "', 1,'" . $hoten . "','" . $diachi . "','" . $dienthoai . "')";
        return mysqli_query($this->db, $sql);
    }

    public function capnhatthongtintk($tendangnhap, $matkhau, $hoten, $diachi, $sodienthoai)
    {
        $sql = "UPDATE taikhoan SET hoten='" . $hoten . "', matkhau ='". md5($matkhau)."', diachi='" . $diachi . "', dienthoai='" . $sodienthoai . "' WHERE tendangnhap = '" . $tendangnhap . "'";
        return mysqli_query($this->db, $sql);
    }

    public function capNhatTaiKhoanDangKy($tendangnhap){
        $sql = "UPDATE taikhoandangky SET trangthai_taikhoandk = 0, nguoiduyet_taikhoandk = '".$_SESSION['tendangnhapadmin']."' WHERE email_taikhoandk ='".$tendangnhap."'";
        return mysqli_query($this->db, $sql);
    }

}//class





