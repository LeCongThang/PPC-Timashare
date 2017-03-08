<?php

class controllertimeshare
{
    const UPDATE_DIR = '../../';

    public $controller_timeshare;
    public $params;
    public $current_action;
    public $cname = "controllertimeshare";
    public $errors = [];

    /**
     * controllergioithieu constructor.
     * @param $action
     * @param $params
     */
    function __construct($action, $params)
    {
        $this->controller_timeshare = new modeltimeshare();
        $this->current_action = $action;
        $this->params = $params;
    }//construct


    /**
     * @return string

    /**
     * @deprecated
     */
    public function index()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $gioithieu_en = $this->controller_timeshare->laygioithieu("en");
        $gioithieu_vi = $this->controller_timeshare->laygioithieu("vi");
        if ($gioithieu_en != null && $gioithieu_vi != null) {
            require_once("view/timeshare.php");
        } else {
            //Trang loi
        }
    }

    public function capnhatgioithieu()
    {
        if (count($_POST) > 0) {
            $tieuDe_vi = $_POST['tieude_vi'];
            $noiDung_vi = $_POST['noidung_vi'];
            $tieuDe_en = $_POST['tieude_en'];
            $noiDung_en = $_POST['noidung_en'];
            if($this->controller_timeshare->update($tieuDe_vi, $noiDung_vi, $tieuDe_en, $noiDung_en))
                $this->errors[] = 'Cập nhật thông tin thành công';
            else
                $this->errors[] = 'Lỗi! Cập nhật không thành công';
        }
        $this->index();
    }


}//class
