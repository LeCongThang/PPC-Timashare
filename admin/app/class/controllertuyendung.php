<?php

class controllertuyendung
{
    const UPDATE_DIR = '../../';

    public $controllertuyendung;
    public $params;
    public $current_action;
    public $cname = "controllertuyendung";
    public $errors = [];

    function __construct($action, $params)
    {
        $this->controllertuyendung = new modeltuyendung();
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
        $items = 5;

        if (isset($this->params[0]))
            if ($this->params[0] <= $numberPage)
                $currentPage = $this->params[0];

        $pageList = intval(($currentPage - 1) / 5) + 1;
        $pageEnd = $pageList * 5;
        $pageListLasted = intval(($numberPage - 1) / 5) + 1;

        $offset = ($currentPage - 1) * $items;

        ($pageListLasted != $pageList) ? $lastPage = $pageEnd : $lastPage = $numberPage;
        $list_deals = $this->controllertuyendung->getAllLimit($offset, $items);
        require_once("view/quanlytuyendung.php");
    }

    public function getNumberPage()
    {
        $numberAll = $this->controllertuyendung->getNumber();
        $pages = $numberAll / 5;
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
                $tieu_de_vi = $_POST['tieude_vi'];
                $noi_dung_vi = $_POST['noidung_vi'];
                $tieu_de_en = $_POST['tieude_en'];
                $noi_dung_en = $_POST['noidung_en'];
                if ($this->controllertuyendung->create($tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh))
                    $this->errors[] = 'Tạo tin tuyển dụng thành công!';
                else
                    $this->errors[] = 'Lỗi! Tạo tin tuyển dụng không thành công!';
                $this->index();
                return true;
            } else {
                $this->errors[] = 'Vui lòng chọn hình ảnh!';
            }
        }
        require_once("view/create-recruitment.php");
    }

    public function update()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllertuyendung/index');
        }
        $id_deals = $this->params[0];

        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            $tieu_de_vi = $_POST['tieude_vi'];
            $noi_dung_vi = $_POST['noidung_vi'];
            $tieu_de_en = $_POST['tieude_en'];
            $noi_dung_en = $_POST['noidung_en'];
            if ($this->controllertuyendung->update($id_deals, $tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh))
                $this->errors[] = 'Cập nhật tin tuyển dụng thành công!';
            else
                $this->errors[] = 'Lỗi! Cập nhật tin tuyển dụng không thành công!';
            $this->index();
            return true;
        }
        $data_vi = $this->controllertuyendung->get($id_deals, "vi");
        $data_en = $this->controllertuyendung->get($id_deals, "en");
        require_once("view/create-recruitment.php");
        return true;
    }

    public function delete()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllertuyendung/index');
        }
        if ($this->controllertuyendung->delete($this->params[0]))
            $this->errors[] = 'Xóa tin tuyển dụng thành công!';
        else
            $this->errors[] = 'Lỗi! Xóa tin tuyển dụng không thành công!';
       $this->index();
        return true;
    }
}//class
