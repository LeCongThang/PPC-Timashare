<?php

class modeladmin
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

    public function getdatabase()
    {
        $sql = "SELECT * FROM gioithieu";
        $kq = $this->db->query($sql);
        $row = $kq->fetch_assoc();
        return $row;
    }


    public function xulydangnhap($tendangnhap, $matkhau)
    {

        $sql = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' and id_vaitro = 2";

        if (!$kq = $this->db->query($sql))
            die($this->db->error);


        if ($kq->num_rows == 0)
            return false;
        $row = $kq->fetch_assoc();
        return password_verify($matkhau, $row['password']);

    }// xulydangnhap

    public function layThongTinTaiKhoanAdmin()
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap='" . $_SESSION['tendangnhapadmin'] . "'";
        $kq = $this->db->query($sql);
        $row = $kq->fetch_assoc();
        return $row;
    }

    public function updateAccountAdmin($hinh, $fullName, $address, $phoneNumber, $gender)
    {
        $sql = "UPDATE taikhoan SET hoten='{$fullName}', diachi='{$address}',dienthoai='{$phoneNumber}',sex = {$gender}";
        if ($hinh != null)
            $sql .= ", avatar = '{$hinh}' ";
        $sql .= " WHERE tendangnhap='" . $_SESSION['tendangnhapadmin'] . "'";
        $kq = $this->db->query($sql);
        return $kq;
    }

    public function doimatkhau($tendangnhap, $matkhaucu, $matkhaumoi)
    {
        if ($this->xulydangnhap($tendangnhap, $matkhaucu)) {
            $sql = "UPDATE taikhoan SET password ='" . password_hash($matkhaumoi, PASSWORD_DEFAULT) . "' WHERE tendangnhap = '" . $tendangnhap . "'";
            return mysqli_query($this->db, $sql);
        }
        return false;
    }
}//class
