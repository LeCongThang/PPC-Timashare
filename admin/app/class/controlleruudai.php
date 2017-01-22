<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 04/01/2017
 * Time: 2:02 CH
 */
class controlleruudai
{
    public $controller_uudai;
    public $params;
    public $current_action;
    public $cname = "controlleruudai";

    /**
     * controlleruudai constructor.
     * @param $action
     * @param $params
     */
    function __construct($action, $params)
    {
        $this->controller_uudai = new modeluudai();
        $this->current_action = $action;
        $this->params = $params;
    }//construct

    /**
     * controllercauhoi index
     * input: null
     * content: load data list question
     * output: quanlycauhoi screen
     */
    public function index()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $ds_cau_hoi_vi = $this->controller_uudai->getListDeals("vi");
        $ds_cau_hoi_en = $this->controller_uudai->getListDeals("en");
        require_once("app/view/quanlyuudai.php");
    }

    /**
     * controllercauhoi index
     * input: null
     * content: load data list question
     * output: quanlycauhoi screen
     */
    public function create()
    {
        if (count($_POST) > 0) {
            $cau_hoi_vi = $_POST['cau_hoi_vi'];
            $cau_hoi_en = $_POST['cau_hoi_en'];
            $cau_tra_loi_vi = $_POST['cau_tra_loi_vi'];
            $cau_tra_loi_en = $_POST['cau_tra_loi_en'];
            $this->controller_cauhoi->themMoiCauHoi($cau_hoi_vi, $cau_hoi_en, $cau_tra_loi_vi, $cau_tra_loi_en);
            redirect(BASE_URL_ADMIN . 'controllercauhoi/index');
        }
        require_once("app/view/create-question.php");
    }

    /**
     * controllercauhoi update
     * input: id
     * content: update
     * output: quanlycauhoi screen
     */
    public function update()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllercauhoi/index');
        }
        $id = $this->params[0];

        if (count($_POST) > 0) {
            $cau_hoi_vi = $_POST['cau_hoi_vi'];
            $cau_hoi_en = $_POST['cau_hoi_en'];
            $cau_tra_loi_vi = $_POST['cau_tra_loi_vi'];
            $cau_tra_loi_en = $_POST['cau_tra_loi_en'];
            $this->controller_cauhoi->suaThongTinCauHoi($id, $cau_hoi_vi, $cau_hoi_en, $cau_tra_loi_vi, $cau_tra_loi_en);
            redirect(BASE_URL_ADMIN . 'controllercauhoi/index');
        }
        $data_vi = $this->controller_cauhoi->xemChiTietCauHoi($id, "vi");
        $data_en = $this->controller_cauhoi->xemChiTietCauHoi($id, "en");
        require_once("app/view/create-question.php");
    }

    /**
     * controllercauhoi delete
     * input: id
     * content: delete
     * output: quanlycauhoi screen
     */
    public function delete()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllercauhoi/index');
        }
        $this->controller_cauhoi->xoaCauHoi($this->params[0]);
        $this->index();
    }


}