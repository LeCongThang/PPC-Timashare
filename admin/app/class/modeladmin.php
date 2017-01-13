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


    public function xulydangnhap($sql)
    {
        if (!$kq = $this->db->query($sql))
            die($this->db->error);

        if ($kq->num_rows == 0)
            return false;
        $row = $kq->fetch_assoc();
        $_SESSION["tentaikhoan"] = $row['hoten'];
        return true;
    }// xulydangnhap
    public function layThongTinTaiKhoanAdmin()
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap='" . $_SESSION['tendangnhapadmin'] . "'";
        $kq = $this->db->query($sql);
        $row = $kq->fetch_assoc();
        return $row;
    }

    public function updateAccountAdmin($hoten, $diachi, $sodienthoai)
    {
        $sql = "UPDATE taikhoan SET hoten='$hoten', diachi='$diachi',dienthoai='$sodienthoai' WHERE tendangnhap='" . $_SESSION['tendangnhapadmin'] . "'";
        $kq = $this->db->query($sql);
        return $kq;
    }

    public function kiemtrataikhoan($tendangnhap, $matkhau)
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' and matkhau='" . md5($matkhau) . "' and id_vaitro = 2";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);

        if ($kq->num_rows == 0)
            return false;
        return true;
    }// xulydangnhap

    public function doimatkhau($tendangnhap, $matkhaucu, $matkhaumoi)
    {
        if ($this->kiemtrataikhoan($tendangnhap, $matkhaucu)) {
            $sql = "UPDATE taikhoan SET matkhau='" . md5($matkhaumoi) . "' WHERE tendangnhap = '" . $tendangnhap . "'";
            return mysqli_query($this->db, $sql);
        }
        return false;
    }
}//class
