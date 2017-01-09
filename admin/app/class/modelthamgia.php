<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 06/01/2017
 * Time: 1:44 CH
 */
class modelthamgia
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

    public function layDuLieuThamGia($lang)
    {
        $sql = "SELECT thamgia.hinh_anh, thamgia.link_hinh_1, thamgia.link_hinh_2, thamgia.link_hinh_3, thamgia.link_hinh_4, thamgia.link_hinh_5, thamgia_ngonngu.label_hinh_1, thamgia_ngonngu.label_hinh_2, thamgia_ngonngu.label_hinh_3, thamgia_ngonngu.label_hinh_4, thamgia_ngonngu.label_hinh_5 FROM thamgia, thamgia_ngonngu WHERE thamgia.id = thamgia_ngonngu.id_thamgia AND thamgia_ngonngu.ngonngu ='" . $lang . "'";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function capNhat($hinh, $array_duong_dan, $array_tieu_de_vi, $array_tieu_de_en)
    {
        $sql_tham_gia = "UPDATE thamgia SET hinh_anh='".$hinh."', link_hinh_1='".$array_duong_dan[0]."', link_hinh_2='".$array_duong_dan[1]."', link_hinh_3='".$array_duong_dan[2]."', link_hinh_4='".$array_duong_dan[3]."', link_hinh_5='".$array_duong_dan[4]."' WHERE id = 1";
        $sql_ngonngu_vi = "UPDATE thamgia_ngonngu SET label_hinh_1 ='".$array_tieu_de_vi[0]."', label_hinh_2 ='".$array_tieu_de_vi[1]."', label_hinh_3 ='".$array_tieu_de_vi[2]."', label_hinh_4 ='".$array_tieu_de_vi[3]."', label_hinh_5 ='".$array_tieu_de_vi[4]."' WHERE id_thamgia = 1 AND ngonngu = 'vi'";
        $sql_ngonngu_en = "UPDATE thamgia_ngonngu SET label_hinh_1 ='".$array_tieu_de_en[0]."', label_hinh_2 ='".$array_tieu_de_en[1]."', label_hinh_3 ='".$array_tieu_de_en[2]."', label_hinh_4 ='".$array_tieu_de_en[3]."', label_hinh_5 ='".$array_tieu_de_en[4]."' WHERE id_thamgia = 1 AND ngonngu = 'en'";
        $kq_tham_gia = $this->db->query($sql_tham_gia);
        $kq_ngonngu_vi = $this->db->query($sql_ngonngu_vi);
        $kq_ngonngu_en = $this->db->query($sql_ngonngu_en);
        if($kq_tham_gia && $kq_ngonngu_vi && $kq_ngonngu_en)
            return true;
        return false;
    }
}