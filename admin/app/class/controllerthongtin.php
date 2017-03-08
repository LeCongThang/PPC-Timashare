<?php

class controllerthongtin
{
    const UPDATE_DIR = '../';

    public $controller_thongtin;
    public $params;
    public $current_action;
    public $cname = "controllerthongtin";
    public $errors = [];

    /**
     * controllerthongtin constructor.
     * @param $action
     * @param $params
     */
    function __construct($action, $params)
    {
        $this->controller_thongtin = new modelthongtin();
        $this->current_action = $action;
        $this->params = $params;
    }//construct


    /**
     * @return string
     */
    private function uploadHinh1()
    {
        if (isset($_FILES['fileup1'])) {
            $error = $_FILES['fileup1']['error'];
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["fileup1"]["tmp_name"];
                $name = "img/" . time() . "_" . basename($_FILES["fileup1"]["name"]);
                move_uploaded_file($tmp_name, self::UPDATE_DIR . $name);
                return $name;
            }
        }
    }

    private function uploadHinh2()
    {
        if (isset($_FILES['fileup2'])) {
            $error = $_FILES['fileup2']['error'];
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["fileup2"]["tmp_name"];
                $name = "img/" . time() . "_" . basename($_FILES["fileup2"]["name"]);
                move_uploaded_file($tmp_name, self::UPDATE_DIR . $name);
                return $name;
            }
        }
        return null;
    }



    /**
     * @deprecated
     */
    public function index()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $gioithieu_en = $this->controller_thongtin->getInformation("en");
        $gioithieu_vi = $this->controller_thongtin->getInformation("vi");
        if ($gioithieu_en != null && $gioithieu_vi != null) {
            require_once("view/capnhatthongtin.php");
        } else {
            //Trang loi
        }
    }

    public function update()
    {
        if (count($_POST) > 0) {
            $hinh1 = $this->uploadHinh1();
            $hinh2 = $this->uploadHinh2();
            $tieuDe_vi1 = $_POST['tieude_vi1'];
            $noiDung_vi1 = $_POST['noidung_vi1'];
            $tieuDe_en1 = $_POST['tieude_en1'];
            $noiDung_en1 = $_POST['noidung_en1'];
            $tieuDe_vi2 = $_POST['tieude_vi2'];
            $noiDung_vi2 = $_POST['noidung_vi2'];
            $tieuDe_en2 = $_POST['tieude_en2'];
            $noiDung_en2 = $_POST['noidung_en2'];
            if ($this->controller_thongtin->update( $tieuDe_vi1, $noiDung_vi1, $tieuDe_vi2, $noiDung_vi2, $hinh1, $hinh2, "vi")&&$this->controller_thongtin->update($tieuDe_en1, $noiDung_en1, $tieuDe_en2, $noiDung_en2, $hinh1, $hinh2, "en"))
                $this->errors[] = 'Cập nhật thông tin thành công';
            else
                $this->errors[] = 'Lỗi! Cập nhật không thành công';
        }
        $this->index();
    }


}//class
