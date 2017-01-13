<?php

class controllertaikhoan
{
    public $controllertaikhoan;
    public $params;
    public $current_action;
    public $cname = "controllertaikhoan";
    public $lang;
    public $errors = [];

    function __construct($action, $params)
    {
        $this->controllertaikhoan = new modeltaikhoan;
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
    }//construct


    public function taikhoan()
    {
        require_once("app/view/quanlytaikhoan.php");
    }

    public function layThongTinUser()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllertaikhoan/index');
        }
        $id = $this->params[0];

        if (count($_POST) > 0) {
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['mat_khau'];
            $ho_ten = $_POST['ho_ten'];
            $dia_chi = $_POST['dia_chi'];
            $dien_thoai = $_POST['dien_thoai'];
            if ($this->controllertaikhoan->capnhatthongtintk($ten_dang_nhap, $mat_khau, $ho_ten, $dia_chi, $dien_thoai))
                //redirect(BASE_URL . $_SESSION['lang'] . '/controllerslider/index');
                $this->errors[] = 'Tạo tài khoản thành công';
            else
                $this->errors[] = 'Lỗi xin mời bạn thử lại';
            redirect(BASE_URL_ADMIN . 'controllertaikhoan/index');
        }
        $data = $this->controllertaikhoan->layThongTinUser($id);
        require_once("app/view/create-account.php");
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
        $ds_tai_khoan_dk = $this->controllertaikhoan->laydanhsachtaikhoandk();
        $ds_tai_khoan_dk_da_duyet = $this->controllertaikhoan->laydanhsachtaikhoandk_daduyet();
        require_once("app/view/quanlytaikhoan.php");
    }

    public function create()
    {
        if (isset($this->params[0])) {
            $email = $this->params[0];
            $sdt = $this->params[1];
            require_once("app/view/create-account-2.php");
        }
        if (count($_POST) > 0) {
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['mat_khau'];
            $ho_ten = $_POST['ho_ten'];
            $dia_chi = $_POST['dia_chi'];
            $dien_thoai = $_POST['dien_thoai'];
            if ($this->controllertaikhoan->themTaiKhoan($ten_dang_nhap, $mat_khau, $ho_ten, $dia_chi, $dien_thoai)) {
                $this->errors[] = 'Tạo tài khoản thành công';
                $this->controllertaikhoan->capNhatTaiKhoanDangKy($ten_dang_nhap);
                $this->index();
            } else
                $this->errors[] = 'Lỗi xin mời bạn thử lại';
        }
        require_once("app/view/create-account.php");

    }

    public function update()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllertaikhoan/index');
        }
        $id = $this->params[0];

        if (count($_POST) > 0) {
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['mat_khau'];
            $ho_ten = $_POST['ho_ten'];
            $dia_chi = $_POST['dia_chi'];
            $dien_thoai = $_POST['dien_thoai'];
            if ($this->controllertaikhoan->capnhatthongtintk($ten_dang_nhap, $mat_khau, $ho_ten, $dia_chi, $dien_thoai))
                //redirect(BASE_URL . $_SESSION['lang'] . '/controllerslider/index');
                $this->errors[] = 'Cập nhật tài khoản thành công';
            else
                $this->errors[] = 'Lỗi xin mời bạn thử lại';
            //redirect(BASE_URL_ADMIN. 'controllertaikhoan/index');
        }
        $data = $this->controllertaikhoan->layThongTinUser($id);
        require_once("app/view/create-account.php");
    }



}//class
