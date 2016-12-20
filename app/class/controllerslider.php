<?php

class controllerslider
{
    const UPDATE_DIR = '../';

    public $bv;
    public $params;
    public $current_action;
    public $cname = "controllerslider";
    public $lang;
    public $errors=[];

    function __construct($action, $params)
    {
        $this->bv = new modelslider();
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

    public function index()
    {
        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            $tieuDe = $_POST['tieude'];
            $noiDung = $_POST['noidung'];
            $this->bv->update($tieuDe, $noiDung, $hinh);
        }
        $sliders = $this->bv->getAll();
        require_once("view/slider.php");
    }


    public function create()
    {
        $data = ['title'=>'', 'content'=>''];
        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            if ($hinh != null) {
                $tieuDe = $_POST['title'];
                $noiDung = $_POST['content'];
                $this->bv->create($tieuDe, $noiDung, $hinh);
                redirect(BASE_URL.'controllerslider/index');
            } else {
                $data['title'] = post('title');
                $data['content'] = post('title');
                $this->errors[] = 'Vui lòng chọn hình ảnh!';
            }
        }
        require_once("view/create-slider.php");
    }

    public function update()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL.'controllerslider/index');
        }
        $id = $this->params[0];

        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            $tieuDe = $_POST['title'];
            $noiDung = $_POST['content'];
            $this->bv->update($id, $tieuDe, $noiDung, $hinh);
            redirect(BASE_URL.'controllerslider/index');
        }
        $data = $this->bv->get($id);
        require_once("view/create-slider.php");
    }

    public function delete()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL.'controllerslider/index');
        }
        $this->bv->delete($this->params[0]);
        redirect(BASE_URL.'controllerslider/index');
    }
}//class
