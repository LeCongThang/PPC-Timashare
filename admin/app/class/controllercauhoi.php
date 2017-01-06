<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 04/01/2017
 * Time: 2:02 CH
 */
class controllercauhoi
{
    public $controller_cauhoi;
    public $params;
    public $current_action;
    public $cname = "controllercauhoi";

    function __construct($action, $params)
    {
        $this->controller_cauhoi = new modelcauhoi();
        $this->current_action = $action;
        $this->params = $params;
    }//construct

    public function index()
    {
        $ds_cau_hoi = $this->controller_cauhoi->layDanhSachCauHoi("vi");
        require_once("app/view/quanlycauhoi.php");
    }

    public function create()
    {
        if(count($_POST)>0)
        {
            $cau_hoi_vi = $_POST['cau_hoi_vi'];
            $cau_hoi_en = $_POST['cau_hoi_en'];
            $cau_tra_loi_vi = $_POST['cau_tra_loi_vi'];
            $cau_tra_loi_en = $_POST['cau_tra_loi_en'];
            $this->controller_cauhoi->themMoiCauHoi($cau_hoi_vi,$cau_hoi_en,$cau_tra_loi_vi,$cau_tra_loi_en);
            redirect(BASE_URL_ADMIN. 'controllercauhoi/index');
        }
        require_once("app/view/create-question.php");
    }

    public function update()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN .'controllercauhoi/index');
        }
        $id = $this->params[0];

        if (count($_POST) > 0) {
            $cau_hoi_vi = $_POST['cau_hoi_vi'];
            $cau_hoi_en = $_POST['cau_hoi_en'];
            $cau_tra_loi_vi = $_POST['cau_tra_loi_vi'];
            $cau_tra_loi_en = $_POST['cau_tra_loi_en'];
            $this->controller_cauhoi->suaThongTinCauHoi($id,$cau_hoi_vi,$cau_hoi_en,$cau_tra_loi_vi,$cau_tra_loi_en);
            redirect(BASE_URL_ADMIN. 'controllercauhoi/index');
        }
        $data_vi = $this->controller_cauhoi->xemChiTietCauHoi($id,"vi");
        $data_en = $this->controller_cauhoi->xemChiTietCauHoi($id,"en");
        require_once("app/view/create-question.php");
    }

    public function delete()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN. 'controllercauhoi/index');
        }
        $this->controller_cauhoi->xoaCauHoi($this->params[0]);
        $this->index();
    }


}