<?php

class controllernghiduong
{
    const UPDATE_DIR = '../../';
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
        require_once("view/quanlykhunghiduong.php");
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
                $resort_name_en = $_POST['resort_name_en'];
                $resort_introduce_en = $_POST['resort_introduce_en'];
                $resort_location_en = $_POST['resort_location_en'];
                $resort_service_en = $_POST['resort_service_en'];
                $resort_equipment_en = $_POST['resort_equipment_en'];
                $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $resort_lat . ',' . $resort_lon . '&language=usa';

                $output = $this->control->httpGet($url);
                //var_dump($output);
                $data = json_decode($output, true);
                $resort_address_en = $data['results'][0]['formatted_address'];
                $address_components = $data['results'][0]['address_components'];
                $city = "";
                $id_country = $this->control->getIdCountry($resort_country);
                foreach ($address_components as $key => $component) {
                    if ($component['types'][0] == "administrative_area_level_1")
                        $city = $component['long_name'];
                }
                if ($this->control->createResort($resort_name_en, $resort_introduce_en, $resort_location_en, $resort_service_en, $resort_equipment_en, $resort_address_en, $hinh, $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_status, $resort_type, $resort_priority, $resort_price, $resort_address, $resort_lat, $resort_lon, $resort_country, $city))
                    $this->errors[] = 'Tạo khu nghỉ dưỡng thành công!';
                else
                    $this->errors[] = 'Lỗi! Tạo khu nghỉ dưỡng không thành công!';
                $listResortVi = $this->control->getListResort('vi');
                $listResortEn = $this->control->getListResort('en');
                $listHomeVi = $this->control->getListHome('vi');
                $listHomeEn = $this->control->getListHome('en');
                require_once("view/quanlykhunghiduong.php");
                return true;
            } else {
                $this->errors[] = 'Vui lòng chọn hình ảnh!';
            }
        }
        require_once("view/create-resort.php");
    }

    public function update()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllerslider/index');
        }
        $id_resort = $this->params[0];

        if (isset($this->params[1])) {
            $id_image_remove = $this->params[1];
            $this->control->deleteImage($id_image_remove);
        }

        if (count($_POST) > 0) {
            $hinh = $this->uploadHinh();
            $resort_image = $this->control->getListImage($id_resort);
            if ($hinh != null || (count($resort_image) > 0)) {
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

                $resort_name_en = $_POST['resort_name_en'];
                $resort_introduce_en = $_POST['resort_introduce_en'];
                $resort_location_en = $_POST['resort_location_en'];
                $resort_service_en = $_POST['resort_service_en'];
                $resort_equipment_en = $_POST['resort_equipment_en'];
                $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $resort_lat . ',' . $resort_lon . '&language=usa';

                $output = $this->control->httpGet($url);
                //var_dump($output);
                $data = json_decode($output, true);
                $resort_address_en = $data['results'][0]['formatted_address'];
                $address_components = $data['results'][0]['address_components'];
                $city = "";
                $id_country = $this->control->getIdCountry($resort_country);
                foreach ($address_components as $key => $component) {
                    if ($component['types'][0] == "administrative_area_level_1")
                        $city = $component['long_name'];
                }

                if ($this->control->update($id_resort, $resort_name_en, $resort_introduce_en, $resort_location_en, $resort_service_en, $resort_equipment_en, $resort_address_en, $hinh, $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_status, $resort_type, $resort_priority, $resort_price, $resort_address, $resort_lat, $resort_lon, $resort_country, $city))
                    $this->errors[] = 'Cập nhật khu nghỉ dưỡng thành công!';
                else
                    $this->errors[] = 'Lỗi! Cập nhật khu nghỉ dưỡng không thành công!';
                $listResortVi = $this->control->getListResort('vi');
                $listResortEn = $this->control->getListResort('en');
                $listHomeVi = $this->control->getListHome('vi');
                $listHomeEn = $this->control->getListHome('en');
                require_once("view/quanlykhunghiduong.php");
                return true;
            } else {
                $this->errors[] = 'Vui lòng chọn hình ảnh!';
            }
        }
        $resort_vi = $this->control->getDetailsResort($id_resort, 'vi');
        $resort_en = $this->control->getDetailsResort($id_resort, 'en');
        $resort_image = $this->control->getListImage($id_resort);
        require_once("view/create-resort.php");
        return true;
    }

    public function delete()
    {
        $id = $this->params[0];
        $isSuccess = $this->control->delete($id);
        if ($isSuccess)
            $this->errors[] = 'Xóa khu nghỉ dưỡng thành công!';
        else
            $this->errors[] = 'Xóa khu nghỉ dưỡng thất bại!';
        $listResortVi = $this->control->getListResort('vi');
        $listResortEn = $this->control->getListResort('en');
        $listHomeVi = $this->control->getListHome('vi');
        $listHomeEn = $this->control->getListHome('en');
        require_once("view/quanlykhunghiduong.php");
    }


}//class
