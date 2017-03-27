<?php

class modelthongtin
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

    public function update( $tieude_vi1, $noidung_vi1, $tieude_vi2, $noidung_vi2, $hinh1, $hinh2, $lang)
    {
        $kq_hinh = 1;
        $sql_gioithieu_vi = "UPDATE about SET "." title_about_1 = '" . $tieude_vi1 . "', content_about_1 = '" . $noidung_vi1 . "', title_about_2 ='".$tieude_vi2."', content_about_2 ='".$noidung_vi2."'";

        if ($hinh1 != null) {
            $imagick1 = new \Imagick(realpath(REAL_PATH . BASE_DIR . $hinh1));
            $imagick1->resizeImage(565, 324, Imagick::FILTER_LANCZOS, 1);
            file_put_contents(REAL_PATH . BASE_DIR . $hinh1, $imagick1);
            $sql_gioithieu_vi .= ",image_1 ='" . $hinh1 . "'";
        }
        if($hinh2 !=null){
            $imagick2 = new \Imagick(realpath(REAL_PATH . BASE_DIR . $hinh2));
            $imagick2->resizeImage(565, 324, Imagick::FILTER_LANCZOS, 1);
            file_put_contents(REAL_PATH . BASE_DIR . $hinh2, $imagick2);
            $sql_gioithieu_vi .= ", image_2= '".$hinh2."'";
        }
        $sql_gioithieu_vi.=" WHERE about_language = '".$lang."'";
        $kq_gt_vi = $this->db->query($sql_gioithieu_vi);
        return $kq_gt_vi;
    }

    public function getInformation($lang)
    {
        $sql = "SELECT *  FROM about WHERE about_language ='".$lang."'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query");
        }
        return mysqli_fetch_assoc($result);
    }
}