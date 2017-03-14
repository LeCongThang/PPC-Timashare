<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 04/01/2017
 * Time: 2:03 CH
 */
class modelcauhoi
{
    public $db;

    /**
     * modelcauhoi constructor.
     * @param
     * @return
     */
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

    public function getNumber()
    {
        $sql = "select count(id) as total from cauhoithuonggap";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function layDanhSachCauHoi($lang)
    {
        $sql = "SELECT cauhoithuonggap_ngonngu.cauhoi, cauhoithuonggap_ngonngu.cautraloi, cauhoithuonggap.id FROM cauhoithuonggap, cauhoithuonggap_ngonngu WHERE cauhoithuonggap.id = cauhoithuonggap_ngonngu.id_cauhoithuonggap AND ngonngu ='" . $lang . "'";
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

    public function layDanhSachCauHoiLimit($lang, $offset, $item)
    {
        $sql = "SELECT cauhoithuonggap_ngonngu.cauhoi, cauhoithuonggap_ngonngu.cautraloi, cauhoithuonggap.id FROM cauhoithuonggap, cauhoithuonggap_ngonngu WHERE cauhoithuonggap.id = cauhoithuonggap_ngonngu.id_cauhoithuonggap AND ngonngu ='" . $lang . "' ORDER BY cauhoithuonggap.id ASC LIMIT " . $offset . "," . $item;
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

    public function themMoiCauHoi($cau_hoi_vi, $cau_hoi_en, $cau_tra_loi_vi, $cau_tra_loi_en)
    {
        $sql_cau_hoi = "INSERT INTO cauhoithuonggap (id) VALUES (NULL);";
        $kq_cau_hoi = $this->db->query($sql_cau_hoi);
        if($kq_cau_hoi){
            $last_id = mysqli_insert_id($this->db);
            $sql_cau_hoi_vi ="INSERT INTO cauhoithuonggap_ngonngu(id_cauhoithuonggap, cauhoi, cautraloi, ngonngu) VALUES ('".$last_id."','".$cau_hoi_vi."','".$cau_tra_loi_vi."','vi')";
            $sql_cau_hoi_en ="INSERT INTO cauhoithuonggap_ngonngu(id_cauhoithuonggap, cauhoi, cautraloi, ngonngu) VALUES ('".$last_id."','".$cau_hoi_en."','".$cau_tra_loi_en."','en')";
            $kq_cau_hoi_vi = $this->db->query($sql_cau_hoi_vi);
            $kq_cau_hoi_en = $this->db->query($sql_cau_hoi_en);
        }

        if($kq_cau_hoi&&$kq_cau_hoi_vi&&$kq_cau_hoi_en)
            return true;
        return false;
    }

    public function suaThongTinCauHoi($id, $cau_hoi_vi, $cau_hoi_en, $cau_tra_loi_vi, $cau_tra_loi_en)
    {
        $sql_cau_hoi_vi = "UPDATE cauhoithuonggap_ngonngu SET cauhoi ='".$cau_hoi_vi."', cautraloi ='".$cau_tra_loi_vi."' WHERE ngonngu = 'vi' AND id_cauhoithuonggap =".$id;
        $sql_cau_hoi_en = "UPDATE cauhoithuonggap_ngonngu SET cauhoi ='".$cau_hoi_en."', cautraloi ='".$cau_tra_loi_en."' WHERE ngonngu = 'en' AND id_cauhoithuonggap =".$id;
        $kq_cau_hoi_vi = $this->db->query($sql_cau_hoi_vi);
        $kq_cau_hoi_en = $this->db->query($sql_cau_hoi_en);
        if($kq_cau_hoi_vi&&$kq_cau_hoi_en)
            return true;
        return false;
    }

    public function xoaCauHoi($id)
    {
        $sql = "DELETE FROM cauhoithuonggap where id = {$id}";
        $sql_ngonngu = "DELETE FROM cauhoithuonggap_ngonngu WHERE id_cauhoithuonggap = {$id}";
        $kq_slider = $this->db->query($sql);
        $kq_slider_ngonngu = $this->db->query($sql_ngonngu);
        if($kq_slider && $kq_slider_ngonngu)
            return true;
        return false;
    }

    public function xemChiTietCauHoi($id, $lang)
    {
        $sql = "SELECT cauhoithuonggap.id, cauhoithuonggap_ngonngu.cauhoi, cauhoithuonggap_ngonngu.cautraloi FROM cauhoithuonggap, cauhoithuonggap_ngonngu WHERE cauhoithuonggap.id = cauhoithuonggap_ngonngu.id_cauhoithuonggap AND cauhoithuonggap_ngonngu.ngonngu = '".$lang."' AND cauhoithuonggap.id =".$id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
}