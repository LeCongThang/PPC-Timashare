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

    /**
     * controllercauhoi constructor.
     * @param $action
     * @param $params
     */
    function __construct($action, $params)
    {
        $this->controller_cauhoi = new modelcauhoi();
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
        $currentPage = 1;
        $numberPage = $this->getNumberPage();
        $items = 5;

        if (isset($this->params[0]))
            if ($this->params[0] <= $numberPage)
                $currentPage = $this->params[0];

        $pageList = intval(($currentPage - 1) / 5) + 1;
        $pageEnd = $pageList * 5;
        $pageListLasted = intval(($numberPage - 1) / 5) + 1;

        $offset = ($currentPage - 1) * $items;

        ($pageListLasted != $pageList) ? $lastPage = $pageEnd : $lastPage = $numberPage;
        $ds_cau_hoi_vi = $this->controller_cauhoi->layDanhSachCauHoiLimit("vi",$offset,$items);
        require_once("view/quanlycauhoi.php");
    }

    public function getNumberPage()
    {
        $numberAll = $this->controller_cauhoi->getNumber();
        $pages = $numberAll / 5;
        $tmp = explode(".", $pages);
        if (count($tmp) > 1) {
            $pages = $tmp[0] + 1;
        } else {
            $pages = $tmp[0];
        }
        return $pages;
    }

    /**
     * controllercauhoi index
     * input: null
     * content: load data list question
     * output: quanlycauhoi screen
     */
    public function create()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        if (count($_POST) > 0) {
            $cau_hoi_vi = $_POST['cau_hoi_vi'];
            $cau_hoi_en = $_POST['cau_hoi_en'];
            $cau_tra_loi_vi = $_POST['cau_tra_loi_vi'];
            $cau_tra_loi_en = $_POST['cau_tra_loi_en'];
            $this->controller_cauhoi->themMoiCauHoi($cau_hoi_vi, $cau_hoi_en, $cau_tra_loi_vi, $cau_tra_loi_en);
            redirect(BASE_URL_ADMIN . 'controllercauhoi/index');
        }
        require_once("view/create-question.php");
    }

    /**
     * controllercauhoi update
     * input: id
     * content: update
     * output: quanlycauhoi screen
     */
    public function update()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
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
        require_once("view/create-question.php");
    }

    /**
     * controllercauhoi delete
     * input: id
     * content: delete
     * output: quanlycauhoi screen
     */
    public function delete()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllercauhoi/index');
        }
        $this->controller_cauhoi->xoaCauHoi($this->params[0]);
        $this->index();
    }


}