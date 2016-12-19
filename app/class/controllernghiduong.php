<?php

class controllernghiduong
{
    public $bv;
    public $params;
    public $current_action;
    public $cname = "controllernghiduong";
    public $lang;

    function __construct($action, $params)
    {
        $this->bv = new modelnghiduong;
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
    }//construct


    public function nghiduong()
    {
        require_once("view/quanlynghiduong.php");
    }

    public function updatedata()
    {
        $id = $_POST['id'];
        $diachi = $_POST['noidung1'];
        $noidung = trim($_POST['noidung2']);
        $sodienthoai = $_POST['noidung3'];

        $hinh = $this->uploadHinh();
        $this->bv->update($id, $diachi, $noidung, $sodienthoai, $hinh);
        redirect(BASE_URL.'controllernghiduong/nghiduong');
    }

    private function uploadHinh()
    {
        if (isset($_FILES['file'])) {
            $error = $_FILES['file']['error'];
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["file"]["tmp_name"];
                $name = "img/banner/" . time() . "_" . basename($_FILES["file"]["name"]);
                move_uploaded_file($tmp_name, "../$name");
                return $name;
            }
        }
        return null;
    }


}//class
