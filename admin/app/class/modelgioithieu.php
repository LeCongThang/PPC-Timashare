<?php

class modelgioithieu
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

    public function update($tieude_vi, $noidung_vi, $tieude_en, $noidung_en, $hinh)
    {
        $sql_hinh = "UPDATE gioithieu SET ";
        if ($hinh != null) {
            $sql_hinh .= "img_tieude ='" . $hinh . "'";
        }

        $sql_gioithieu_vi = "UPDATE gioithieu_ngonngu SET tieu_de = '" . $tieude_vi . "', noidung_gioithieu = '" . $noidung_vi . "' WHERE ngonngu = 'vi'";
        $sql_gioithieu_en = "UPDATE gioithieu_ngonngu SET tieu_de = '" . $tieude_en . "', noidung_gioithieu = '" . $noidung_en . "' WHERE ngonngu = 'en'";

        $kq_hinh = $this->db->query($sql_hinh);
        $kq_gt_vi = $this->db->query($sql_gioithieu_vi);
        $kq_gt_en = $this->db->query($sql_gioithieu_en);
        if ($kq_hinh && $kq_gt_vi && $kq_gt_en)
            return true;
        return false;
    }

    public function laygioithieu($lang)
    {
        $sql = "SELECT gioithieu.id, gioithieu.img_tieude, gioithieu_ngonngu.tieu_de, gioithieu_ngonngu.noidung_gioithieu  FROM gioithieu,gioithieu_ngonngu WHERE gioithieu.id = gioithieu_ngonngu.id_gioithieu AND gioithieu_ngonngu.ngonngu = '" . $lang . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query");
        }
        return mysqli_fetch_assoc($result);
    }
}