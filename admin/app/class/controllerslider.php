<?php

class controllerslider
{
    const UPDATE_DIR = '../../';

    public $controllerslider;
    public $params;
    public $current_action;
    public $cname = "controllerslider";
    public $errors = [];

    function __construct($action, $params)
    {
        $this->controllerslider = new modelslider();
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

    public function index()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $currentPage = 1;
        $numberPage = $this->getNumberPage();
        $items = 2;

        if (isset($this->params[0]))
            if ($this->params[0] <= $numberPage)
                $currentPage = $this->params[0];

        $pageList = intval(($currentPage - 1) / 5) + 1;
        $pageEnd = $pageList * 5;
        $pageListLasted = intval(($numberPage - 1) / 5) + 1;

        $offset = ($currentPage - 1) * $items;

        ($pageListLasted != $pageList) ? $lastPage = $pageEnd : $lastPage = $numberPage;
        $sliders = $this->controllerslider->getAllLimit($offset, $items);
        require_once("view/slider.php");
    }

    public function getNumberPage()
    {
        $numberAll = $this->controllerslider->getNumber();
        $pages = $numberAll / 2;
        $tmp = explode(".", $pages);
        if (count($tmp) > 1) {
            $pages = $tmp[0] + 1;
        } else {
            $pages = $tmp[0];
        }
        return $pages;
    }

    public function create()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $data = ['title' => '', 'content' => ''];
        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            if ($hinh != null) {
                $duong_dan = $_POST['duongdan'];
                $tieu_de_vi = $_POST['tieude_vi'];
                $noi_dung_vi = $_POST['noidung_vi'];
                $mo_ta_vi = $_POST['mota_vi'];
                $tieu_de_en = $_POST['tieude_en'];
                $noi_dung_en = $_POST['noidung_en'];
                $mo_ta_en = $_POST['mota_en'];
                if ($this->controllerslider->create($tieu_de_vi, $noi_dung_vi, $mo_ta_vi, $tieu_de_en, $noi_dung_en, $mo_ta_en, $duong_dan, $hinh))
                    $this->errors[] = 'Tạo slider thành công!';
                else
                    $this->errors[] = 'Lỗi! Tạo slider không thành công!';
                $this->index();
                return true;
            } else {
                $this->errors[] = 'Vui lòng chọn hình ảnh!';
            }
        }
        require_once("view/create-slider.php");
    }

    public function update()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllerslider/index');
        }
        $id = $this->params[0];

        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            $duong_dan = $_POST['duongdan'];
            $tieu_de_vi = $_POST['tieude_vi'];
            $noi_dung_vi = $_POST['noidung_vi'];
            $mo_ta_vi = $_POST['mota_vi'];
            $tieu_de_en = $_POST['tieude_en'];
            $noi_dung_en = $_POST['noidung_en'];
            $mo_ta_en = $_POST['mota_en'];
            if ($this->controllerslider->update($id, $tieu_de_vi, $noi_dung_vi, $mo_ta_vi, $tieu_de_en, $noi_dung_en, $mo_ta_en, $duong_dan, $hinh))
                $this->errors[] = 'Cập nhật slider thành công!';
            else
                $this->errors[] = 'Lỗi! Cập nhật slider không thành công!';
            $this->index();
            return true;
        }
        $data_vi = $this->controllerslider->get($id, "vi");
        $data_en = $this->controllerslider->get($id, "en");
        require_once("view/create-slider.php");
        return true;
    }

    public function delete()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllerslider/index');
        }
        if ($this->controllerslider->delete($this->params[0]))
            $this->errors[] = 'Xóa slider thành công!';
        else
            $this->errors[] = 'Lỗi! Xóa slider không thành công!';
        $this->index();
        return true;
    }
}//class
