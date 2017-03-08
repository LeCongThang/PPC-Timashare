<?php

class controllertaikhoan
{
    public $controllertaikhoan;
    public $params;
    public $current_action;
    public $cname = "controllertaikhoan";
    public $lang;
    public $errors = [];
    const UPDATE_DIR = '../../';

    function __construct($action, $params)
    {
        $this->controllertaikhoan = new modeltaikhoan;
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
    }//construct

    private function uploadHinhUpdate()
    {
        if (isset($_FILES['imgProFile'])) {
            $error = $_FILES['imgProFile']['error'];
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["imgProFile"]["tmp_name"];
                $name = "img/" . time() . "_" . basename($_FILES["imgProFile"]["name"]);
                move_uploaded_file($tmp_name, self::UPDATE_DIR . $name);
                return $name;
            }
        }
        return null;
    }

    public function taikhoan()
    {
        require_once("view/quanlytaikhoan.php");
    }

    public function layThongTinUser()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllertaikhoan/index');
        }
        $id = $this->params[0];

        if (count($_POST) > 0) {
            $hinh = $this->uploadHinhUpdate();
            $fullName = $_POST['txtFullName'];
            $address = $_POST['txtAddress'];
            $phoneNumber = $_POST['txtPhoneNumber'];
            $gender = $_POST['radGender'];
            $password = $_POST['password'];
            $status = $_POST['status'];
            $role = $_POST['id_vaitro'];
            if ($this->controllertaikhoan->capnhatthongtintk($id, $hinh, $fullName, $address, $phoneNumber, $gender, $password, $status, $role))
                $this->errors[] = 'Tạo tài khoản thành công';
            else
                $this->errors[] = 'Lỗi xin mời bạn thử lại';
            redirect(BASE_URL_ADMIN . 'controllertaikhoan/index');
        }
        $data = $this->controllertaikhoan->layThongTinUser($id);
        require_once("view/create-account.php");
    }


    public function delete()
    {
        $user = $this->params[0];
        $this->controllertaikhoan->delete($user);
        $this->index();
        die();
    }

    public function deleteAccount()
    {
        $user = $this->params[0];
        $this->controllertaikhoan->deleteAccount($user);
        $this->index();
        die();
    }


    public function index()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $ds_tai_khoan = $this->controllertaikhoan->laydanhsachtaikhoan();
        require_once("view/quanlytaikhoan.php");
    }

    public function create()
    {
        if (count($_POST) > 0) {
            $hinh = $this->uploadHinhUpdate();
            $userName = $_POST['userName'];
            $fullName = $_POST['txtFullName'];
            $address = $_POST['txtAddress'];
            $phoneNumber = $_POST['txtPhoneNumber'];
            $gender = $_POST['radGender'];
            $password = $_POST['password'];
            $status = $_POST['status'];
            $role = $_POST['id_vaitro'];
            if ($this->controllertaikhoan->createAccount( $userName, $hinh, $fullName, $address, $phoneNumber, $gender, $password, $status, $role))
            {
                $this->errors[] = 'Tạo tài khoản thành công';

            }
            else
                $this->errors[] = 'Lỗi xin mời bạn thử lại';
            redirect(BASE_URL_ADMIN . 'controllertaikhoan/index');
        } else
            require_once("view/create-account-2.php");
    }

    public function update()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllertaikhoan/index');
        }
        $id = $this->params[0];

        if (count($_POST) > 0) {
            $hinh = $this->uploadHinhUpdate();
            $fullName = $_POST['txtFullName'];
            $address = $_POST['txtAddress'];
            $phoneNumber = $_POST['txtPhoneNumber'];
            $gender = $_POST['radGender'];
            $password = $_POST['password'];
            $status = $_POST['status'];
            $role = $_POST['id_vaitro'];
            if ($this->controllertaikhoan->capnhatthongtintk($id, $hinh, $fullName, $address, $phoneNumber, $gender, $password, $status, $role))
                $this->errors[] = 'Cập nhật tài khoản thành công';
            else
                $this->errors[] = 'Lỗi xin mời bạn thử lại';
            redirect(BASE_URL_ADMIN . 'controllertaikhoan/index');
        }

        $tai_khoan = $this->controllertaikhoan->layThongTinUser($id);
        require_once("view/create-account.php");
    }


}//class
