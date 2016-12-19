<?php

class controllergioithieu
{
    const UPDATE_DIR = '../';

    public $bv;
    public $params;
    public $current_action;
    public $cname = "controllergioithieu";
    public $lang;

    function __construct($action, $params)
    {
        $this->bv = new modelgioithieu();
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
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

    public function gioithieu()
    {
        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            $tieuDe = $_POST['tieude'];
            $noiDung = $_POST['noidung'];
            $this->bv->update($tieuDe, $noiDung, $hinh);
        }
        require_once("view/gioithieu.php");
    }


}//class
