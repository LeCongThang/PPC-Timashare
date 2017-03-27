<?php

class controlleruudai
{
    const UPDATE_DIR = '../../';
    public $controlleruudai;
    public $params;
    public $current_action;
    public $cname = "controlleruudai";
    public $errors = [];

    function __construct($action, $params)
    {
        $this->controlleruudai = new modeluudai();
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
        $list_deals = $this->controlleruudai->getAllLimit($offset, $items);

        require_once("view/quanlyuudai.php");
    }

    public function getNumberPage()
    {
        $numberAll = $this->controlleruudai->getNumber();
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
                $list_resort_choose = $_POST['list_resort'];
                $date_start = $_POST['date_start'];
                $date_end = $_POST['date_end'];
                if ($this->controlleruudai->create($tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh, $list_resort_choose, $date_start, $date_end)) {
                    $this->errors[] = 'Tạo ưu đãi thành công!';
                } else
                    $this->errors[] = 'Lỗi! Tạo ưu đãi không thành công!';
                $this->index();
            } else {
                $this->errors[] = 'Vui lòng chọn hình ảnh!';
            }
        } else {
            $list_resort = $this->controlleruudai->getListResort();
            require_once("view/create-deals.php");
        }
    }

    public function update()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controlleruudai/index');
        }
        $id_deals = $this->params[0];

        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            $tieu_de_vi = $_POST['tieude_vi'];
            $noi_dung_vi = $_POST['noidung_vi'];
            $tieu_de_en = $_POST['tieude_en'];
            $noi_dung_en = $_POST['noidung_en'];
            if (isset($_POST['list_resort']))
                $list_resort_choose = $_POST['list_resort'];
            else
                $list_resort_choose = "";
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];
            $this->controlleruudai->updateDetails($id_deals, $list_resort_choose, $date_start, $date_end);
            if ($this->controlleruudai->update($id_deals, $tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh))
                $this->errors[] = 'Cập nhật ưu đãi thành công!';
            else
                $this->errors[] = 'Lỗi! Cập nhật ưu đãi không thành công!';
            $this->index();
        } else {
            $data_vi = $this->controlleruudai->get($id_deals, "vi");
            $data_en = $this->controlleruudai->get($id_deals, "en");
            $data_detail = $this->controlleruudai->getDetailsDealsResort($id_deals);
            $list_resort = $this->controlleruudai->getListResort();
            require_once("view/create-deals.php");
        }
    }

    public function delete()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controlleruudai/index');
        }
        if ($this->controlleruudai->delete($this->params[0]))
            $this->errors[] = 'Xóa ưu đãi thành công!';
        else
            $this->errors[] = 'Lỗi! Xóa ưu đãi không thành công!';
        $this->index();
    }
}//class

?>