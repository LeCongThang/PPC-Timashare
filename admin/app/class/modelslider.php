<?php

class modelslider
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
    public function create($tieu_de_vi, $noi_dung_vi, $mo_ta_vi, $tieu_de_en, $noi_dung_en, $mo_ta_en, $duong_dan, $hinh)
    {
        $sql_slider = "INSERT INTO slider(image_slider, duongdan_slider) VALUES('$hinh', '$duong_dan')";
        $kq_slider = $this->db->query($sql_slider);
        if($kq_slider){
            $last_id = mysqli_insert_id($this->db);
            $sql_slider_vi = "INSERT INTO slider_ngonngu(id_slider,noidung_slider,tieude_slider,mota_slider,ngon_ngu) VALUES ('$last_id', '$noi_dung_vi', '$tieu_de_vi','$mo_ta_vi','vi')";
            $sql_slider_en = "INSERT INTO slider_ngonngu(id_slider,noidung_slider,tieude_slider,mota_slider,ngon_ngu) VALUES ('$last_id', '$noi_dung_en', '$tieu_de_en','$mo_ta_en','en')";
            $kq_slider_vi = $this->db->query($sql_slider_vi);
            $kq_slider_en = $this->db->query($sql_slider_en);
        }
        if($kq_slider && $kq_slider_vi && $kq_slider_en)
            return true;
        return false;
    }

    public function update($id, $tieu_de_vi, $noi_dung_vi, $mo_ta_vi, $tieu_de_en, $noi_dung_en, $mo_ta_en, $duong_dan, $hinh)
    {
        $sql_hinh = "UPDATE slider SET duongdan_slider ='".$duong_dan."'";
        if ($hinh != null) {
            $sql_hinh .= ",image_slider='" . $hinh . "'";
        }
        $sql_hinh .= " where id_slider = {$id}";
        $sql_slider_vi = "UPDATE slider_ngonngu SET noidung_slider ='".$noi_dung_vi."', tieude_slider ='".$tieu_de_vi."', mota_slider ='".$mo_ta_vi."' WHERE id_slider =".$id." AND ngon_ngu = 'vi'";
        $sql_slider_en = "UPDATE slider_ngonngu SET noidung_slider ='".$noi_dung_en."', tieude_slider ='".$tieu_de_en."', mota_slider ='".$mo_ta_en."' WHERE id_slider =".$id." AND ngon_ngu = 'en'";
        $kq_hinh = $this->db->query($sql_hinh);
        $kq_slider_vi = $this->db->query($sql_slider_vi);
        $kq_slider_en = $this->db->query($sql_slider_en);
        if($kq_hinh && $kq_slider_vi && $kq_slider_en)
            return true;
        return false;
    }

    public function getAll($customWhere = "")
    {
        $sql = "select * from slider ".$customWhere;

        return  $this->db->query($sql);
    }

    public function get($id,$lang)
    {
        $sql = "SELECT slider.image_slider, slider.duongdan_slider, slider_ngonngu.noidung_slider, slider_ngonngu.tieude_slider, slider_ngonngu.mota_slider FROM slider,slider_ngonngu WHERE slider.id_slider = slider_ngonngu.id_slider AND slider_ngonngu.ngon_ngu = '".$lang."' AND slider.id_slider =".$id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }



    public function delete($id)
    {
        $sql = "DELETE FROM slider where id_slider = {$id}";
        $sql_ngonngu = "DELETE FROM slider_ngonngu WHERE id_slider = {$id}";
        $kq_slider = $this->db->query($sql);
        $kq_slider_ngonngu = $this->db->query($sql_ngonngu);
        if($kq_slider && $kq_slider_ngonngu)
            return true;
        return false;
    }
}