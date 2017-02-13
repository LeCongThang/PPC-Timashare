<?php

class controllernghiduong
{
    const UPDATE_DIR = '../';
    public $control;
    public $params;
    public $current_action;
    public $cname = "controllernghiduong";
    public $lang;
    public $errors = [];

    function __construct($action, $params)
    {
        $this->control = new modelnghiduong;
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
    }//construct

    function index()
    {
        $listResortVi = $this->control->getListResort('vi');
        $listResortEn = $this->control->getListResort('en');
        $listHomeVi = $this->control->getListHome('vi');
        $listHomeEn = $this->control->getListHome('en');
        require_once("app/view/quanlykhunghiduong.php");
    }

    private function uploadHinh()
    {
        if (isset($_FILES['fileup'])) {
            $listImg = array();
            foreach ($_FILES['fileup']['name'] as $key => $filename) {
                $error = $_FILES['fileup']['error'][$key];
                if ($error == UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES["fileup"]["tmp_name"][$key];
                    $name = "img/" . time() . "_" . basename($_FILES["fileup"]["name"][$key]);
                    move_uploaded_file($tmp_name, self::UPDATE_DIR . $name);
                    $listImg[$key] = $name;
                    $name = '';
                    $tmp_name = '';
                }
            }
            return $listImg;

        }
        return null;
    }

    public function create()
    {
        $data = ['title' => '', 'content' => ''];
        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            if ($hinh != null) {
                $resort_name = $_POST['resort_name'];
                $resort_introduce = $_POST['resort_introduce'];
                $resort_location = $_POST['resort_location'];
                $resort_service = $_POST['resort_service'];
                $resort_equipment = $_POST['resort_equipment'];
                $resort_status = $_POST['resort_status'];
                $resort_type = $_POST['resort_type'];
                $resort_priority = $_POST['resort_priority'];
                $resort_price = $_POST['resort_price'];
                $resort_address = $_POST['resort_address'];
                $resort_lat = $_POST['resort_lat'];
                $resort_lon = $_POST['resort_lon'];
                $resort_country = $_POST['resort_country'];
                if ($this->control->createResort($hinh, $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_status, $resort_type, $resort_priority, $resort_price, $resort_address, $resort_lat, $resort_lon, $resort_country))
                    $this->errors[] = 'Tạo khu nghỉ dưỡng thành công!';
                else
                    $this->errors[] = 'Lỗi! Tạo khu nghỉ dưỡng không thành công!';
                $listResortVi = $this->control->getListResort('vi');
                $listResortEn = $this->control->getListResort('en');
                $listHomeVi = $this->control->getListHome('vi');
                $listHomeEn = $this->control->getListHome('en');
                require_once("app/view/quanlykhunghiduong.php");
                return true;
            } else {
                $this->errors[] = 'Vui lòng chọn hình ảnh!';
            }
        }
        require_once("app/view/create-resort.php");
    }


}//class
