<?php

class modelnghiduong
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

    public function update($id, $diachi, $noidung, $sodienthoai, $hinh)
    {
        $sql = "UPDATE khunghiduong SET diachi='" . $diachi . "',thongtin='" . $noidung . "' ,sdt='" . $sodienthoai."'";
        if ($hinh != null) {
            $sql .=  " ,img_khu='$hinh'";
        }
        $sql .= "  WHERE id_khunghi='{$id}'";
        $kq = $this->db->query($sql);
        return $kq;
    }

}//class





