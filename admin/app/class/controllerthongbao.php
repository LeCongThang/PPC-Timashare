<?php

class controllerthongbao
{
    const UPDATE_DIR = '../../';

    public $controllerthongbao;
    public $params;
    public $current_action;
    public $cname = "controllerthongbao";
    public $errors = [];

    function __construct($action, $params)
    {
        $this->controllerthongbao = new modelthongbao();
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
        $list_deals = $this->controllerthongbao->getAllLimit($offset, $items);
        require_once("view/quanlythongbao.php");
    }

    public function getNumberPage()
    {
        $numberAll = $this->controllerthongbao->getNumber();
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
                $link = $_POST['link'];
                $tieu_de_vi = $_POST['tieude_vi'];
                $noi_dung_vi = $_POST['noidung_vi'];
                $tieu_de_en = $_POST['tieude_en'];
                $noi_dung_en = $_POST['noidung_en'];
                if ($this->controllerthongbao->create($tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh, $link))
                    $this->errors[] = 'Tạo tin tuyển dụng thành công!';
                else
                    $this->errors[] = 'Lỗi! Tạo tin tuyển dụng không thành công!';
                $this->index();
                return true;
            } else {
                $this->errors[] = 'Vui lòng chọn hình ảnh!';
            }
        }
        require_once("view/create-announce_papers.php");
    }

    public function update()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllerthongbao/index');
        }
        $id_deals = $this->params[0];

        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            $link = $_POST['link'];
            $tieu_de_vi = $_POST['tieude_vi'];
            $noi_dung_vi = $_POST['noidung_vi'];
            $tieu_de_en = $_POST['tieude_en'];
            $noi_dung_en = $_POST['noidung_en'];
            if ($this->controllerthongbao->update($id_deals, $tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh, $link))
                $this->errors[] = 'Cập nhật tin tuyển dụng thành công!';
            else
                $this->errors[] = 'Lỗi! Cập nhật tin tuyển dụng không thành công!';
            $this->index();
            return true;
        }
        $data_vi = $this->controllerthongbao->get($id_deals, "vi");
        $data_en = $this->controllerthongbao->get($id_deals, "en");
        require_once("view/create-announce_papers.php");
        return true;
    }

    public function delete()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllerthongbao/index');
        }
        if ($this->controllerthongbao->delete($this->params[0]))
            $this->errors[] = 'Xóa tin tuyển dụng thành công!';
        else
            $this->errors[] = 'Lỗi! Xóa tin tuyển dụng không thành công!';
        $this->index();
        return true;
    }
}//class
