<?php

class controllergioithieu
{
    const UPDATE_DIR = '../';

    public $controller_gioithieu;
    public $params;
    public $current_action;
    public $cname = "controllergioithieu";

    function __construct($action, $params)
    {
        $this->controller_gioithieu = new modelgioithieu();
        $this->current_action = $action;
        $this->params = $params;
    }//construct


    /**
     * @return string
     */
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

    public function index(){
        $gioithieu_en = $this->controller_gioithieu->laygioithieu("en");
        $gioithieu_vi = $this->controller_gioithieu->laygioithieu("vi");
        if($gioithieu_en !=null && $gioithieu_vi !=null){
            require_once("app/view/gioithieu.php");
        }
        else{
            //Trang loi
        }
    }

    public function capnhatgioithieu()
    {

        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            $tieuDe_vi = $_POST['tieude_vi'];
            $noiDung_vi = $_POST['noidung_vi'];
            $tieuDe_en = $_POST['tieude_en'];
            $noiDung_en = $_POST['noidung_en'];
            $this->controller_gioithieu->update($tieuDe_vi, $noiDung_vi, $tieuDe_en, $noiDung_en, $hinh);
        }
        $this->index();
    }


}//class
