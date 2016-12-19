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

    public function update($tieude, $noidung, $hinh)
    {
        $sql = "UPDATE gioithieu SET tieu_de='" . $tieude . "', noidung_gioithieu='" . $noidung . "'";
        if ($hinh != null) {
            $sql .= ",img_tieude='" . $hinh . "'";
        }
        $kq = $this->db->query($sql);
        return $kq;
    }
}