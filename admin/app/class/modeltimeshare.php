<?php

class modeltimeshare
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

    public function update($tieude_vi, $noidung_vi, $tieude_en, $noidung_en)
    {

        $sql_gioithieu_vi = "UPDATE owning_a_timeshare SET title = '" . $tieude_vi . "', content = '" . $noidung_vi . "' WHERE language = 'vi'";
        $sql_gioithieu_en = "UPDATE owning_a_timeshare SET title = '" . $tieude_en . "', content = '" . $noidung_en . "' WHERE language = 'en'";
        $kq_gt_vi = $this->db->query($sql_gioithieu_vi);
        $kq_gt_en = $this->db->query($sql_gioithieu_en);
        if ($kq_gt_vi && $kq_gt_en)
            return true;
        return false;
    }

    public function laygioithieu($lang)
    {
        $sql = "SELECT *  FROM owning_a_timeshare WHERE language = '" . $lang . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query");
        }
        return mysqli_fetch_assoc($result);
    }
}