<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 06/01/2017
 * Time: 1:44 CH
 */
class controllerthamgia
{
    const UPDATE_DIR = '../';
    public $controllerthamgia;
    public $params;
    public $current_action;
    public $cname = "controllerthamgia";
    public $hinh = "";

    function __construct($action, $params)
    {
        $this->controllerthamgia = new modelthamgia;
        $this->current_action = $action;
        $this->params = $params;
    }//construct

    public function index()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $du_lieu_vi = $this->controllerthamgia->layDuLieuThamGia("vi");
        $du_lieu_en = $this->controllerthamgia->layDuLieuThamGia("en");
        require_once("app/view/thamgia.php");
    }

    private function uploadHinh()
    {
        if (isset($_FILES['fileup'])) {
            $error = $_FILES['fileup']['error'];
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["fileup"]["tmp_name"];
                $name = "img/" . time() . "_" . basename($_FILES["fileup"]["name"]);
                move_uploaded_file($tmp_name, self::UPDATE_DIR . $name);
                return $name;
            }
        }
        return null;
    }

    public function hienThiDanhSachHinh()
    {
        $this->hinh = $this->uploadHinh();
        $du_lieu_vi = $this->controllerthamgia->layDuLieuThamGia("vi");
        $du_lieu_en = $this->controllerthamgia->layDuLieuThamGia("en");
        if ($this->hinh == null) {
            $this->hinh = $du_lieu_vi['hinh_anh'];
        }
        $imagick = new \Imagick(realpath('C:\xampp\htdocs' . BASE_DIR . $this->hinh));
        $imagick->resizeImage(1070, 868, Imagick::FILTER_LANCZOS, 1);
        $width_khung_1_2 = 267.5;
        $high_khung_1_2 = 217;
        $width_khung_3 = 535;
        $high_khung_3 = 217;
        $width_khung_4 = 535;
        $high_khung_4 = 434;
        $width_khung_5 = 1070;
        $high_khung_5 = 434;
        $array_img = array();
        $img_khung_1 = clone $imagick;
        $img_khung_1->cropImage($width_khung_1_2, $high_khung_1_2, 0, 0);
        array_push($array_img, $img_khung_1);
        $img_khung_2 = clone $imagick;
        $img_khung_2->cropImage($width_khung_1_2, $high_khung_1_2, 267.5, 0);
        array_push($array_img, $img_khung_2);
        $img_khung_3 = clone $imagick;
        $img_khung_3->cropImage($width_khung_3, $high_khung_3, 0, 217);
        array_push($array_img, $img_khung_3);
        $img_khung_4 = clone $imagick;
        $img_khung_4->cropImage($width_khung_4, $high_khung_4, 535, 0);
        array_push($array_img, $img_khung_4);
        $img_khung_5 = clone $imagick;
        $img_khung_5->cropImage($width_khung_5, $high_khung_5, 0, 434);
        array_push($array_img, $img_khung_5);
        $_SESSION['img'] = $this->hinh;
        require_once("app/view/quanlythamgia.php");
    }

    public function capNhatThamGia()
    {
        if (count($_POST) > 0) {
            $duong_dan_1 = $_POST['duong_dan_1'];
            $duong_dan_2 = $_POST['duong_dan_2'];
            $duong_dan_3 = $_POST['duong_dan_3'];
            $duong_dan_4 = $_POST['duong_dan_4'];
            $duong_dan_5 = $_POST['duong_dan_5'];
            $array_duong_dan = array();
            array_push($array_duong_dan,$duong_dan_1);
            array_push($array_duong_dan,$duong_dan_2);
            array_push($array_duong_dan,$duong_dan_3);
            array_push($array_duong_dan,$duong_dan_4);
            array_push($array_duong_dan,$duong_dan_5);
            $tieu_de_vi_1 = $_POST['tieu_de_vi_1'];
            $tieu_de_vi_2 = $_POST['tieu_de_vi_2'];
            $tieu_de_vi_3 = $_POST['tieu_de_vi_3'];
            $tieu_de_vi_4 = $_POST['tieu_de_vi_4'];
            $tieu_de_vi_5 = $_POST['tieu_de_vi_5'];
            $array_tieu_de_vi = array();
            array_push($array_tieu_de_vi,$tieu_de_vi_1);
            array_push($array_tieu_de_vi,$tieu_de_vi_2);
            array_push($array_tieu_de_vi,$tieu_de_vi_3);
            array_push($array_tieu_de_vi,$tieu_de_vi_4);
            array_push($array_tieu_de_vi,$tieu_de_vi_5);
            $tieu_de_en_1 = $_POST['tieu_de_en_1'];
            $tieu_de_en_2 = $_POST['tieu_de_en_2'];
            $tieu_de_en_3 = $_POST['tieu_de_en_3'];
            $tieu_de_en_4 = $_POST['tieu_de_en_4'];
            $tieu_de_en_5 = $_POST['tieu_de_en_5'];
            $array_tieu_de_en = array();
            array_push($array_tieu_de_en,$tieu_de_en_1);
            array_push($array_tieu_de_en,$tieu_de_en_2);
            array_push($array_tieu_de_en,$tieu_de_en_3);
            array_push($array_tieu_de_en,$tieu_de_en_4);
            array_push($array_tieu_de_en,$tieu_de_en_5);
            $this->controllerthamgia->capNhat($_SESSION['img'],$array_duong_dan,$array_tieu_de_vi,$array_tieu_de_en);
            unset($_SESSION['img']);
            $this->index();
        }
    }

}