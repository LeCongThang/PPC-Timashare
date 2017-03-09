<?php

class controllerloiich
{
    const UPDATE_DIR = '../../';

    public $controller_loiich;
    public $params;
    public $current_action;
    public $cname = "controllerloiich";
    public $errors = [];

    /**
     * controllerloiich constructor.
     * @param $action
     * @param $params
     */
    function __construct($action, $params)
    {
        $this->controller_loiich = new modelloiich();
        $this->current_action = $action;
        $this->params = $params;
    }//construct


    /**
     * @return string
     */


    /**
     * @deprecated
     */
    public function index()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $gioithieu_en = $this->controller_loiich->laygioithieu("en");
        $gioithieu_vi = $this->controller_loiich->laygioithieu("vi");
        if ($gioithieu_en != null && $gioithieu_vi != null) {
            require_once("view/loiich.php");
        } else {
            //Trang loi
        }
    }

    public function capnhatgioithieu()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        if (count($_POST) > 0) {
            $tieuDe_vi = $_POST['tieude_vi'];
            $noiDung_vi = $_POST['noidung_vi'];
            $tieuDe_en = $_POST['tieude_en'];
            $noiDung_en = $_POST['noidung_en'];
            if ($this->controller_loiich->update($tieuDe_vi, $noiDung_vi, $tieuDe_en, $noiDung_en))
                $this->errors[] = 'Cập nhật thông tin thành công';
            else
                $this->errors[] = 'Lỗi! Cập nhật không thành công';
        }
        $this->index();
    }


}//class
