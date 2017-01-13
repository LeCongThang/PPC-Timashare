<?php

//begin class controller admin
class controlleradmin
{
    // begin variable declaration of the class
    public $controlleradmin;
    public $params;
    public $current_action;
    public $cname = "controlleradmin";
    public $errors = [];
    // end variable declaration of the class

    /*
     * Name: constructor for controlleradmin
     * Input: action, params from view
     * Content: construct controlleradmin, action, params
     * Output: null
     * */
    function __construct($action, $params)
    {
        $this->controlleradmin = new modeladmin;
        $this->current_action = $action;
        $this->params = $params;

    }//construct

    /*
    * Name: index
    * Input: null
    * Content: routing to login screen
    * Output: go to login screen
    * */
    function index()
    {
        if (isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/loadingadmin");
        require_once "app/view/dangnhap.php";
    }//index

    /*
    * Name: loadingadmin
    * Input: null
    * Content: routing to main screen for admin
    * Output: go to main screen
    * */
    function loadingadmin()
    {
        require_once "app/view/admin.php";
    }//loadingadmin

    /*
    * Name: dangNhap
    * Input: username and password
    * Content: check username and password pass or wrong
    * Output: if pass go to main screen else go to login screen
    * */
    public function dangNhap()
    {
        $tendangnhap = $_POST["username"];
        $matkhau = $_POST["password"];
        $ktTonTai = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' and matkhau='" . md5($matkhau) . "' and id_vaitro = 2";
        $truyvanktTonTai = $this->controlleradmin->xulydangnhap($ktTonTai);
        if ($truyvanktTonTai) {
            $_SESSION["tendangnhapadmin"] = $tendangnhap;
            if (isset($_POST["rememberme"])) {
                $remember = $_POST["rememberme"];
                setcookie("tendangnhap", $tendangnhap, time() + 2592000);
                setcookie("matkhau", $matkhau, time() + 2592000);
                setcookie("rememberme", $remember, time() + 2592000);
            } else {
                setcookie("tendangnhap", $tendangnhap, time());
                setcookie("matkhau", $matkhau, time());
            }
            $this->loadingadmin();
        } else {
            echo "<script>alert('Tài khoản hoặc mật khẩu không đúng')</script>";
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        }
    }// dangnhap

    /*
    * Name: dangxuat
    * Input: null
    * Content: unset all session
    * Output: go to login screen
    * */
    public function dangxuat()
    {
        session_unset();
        session_destroy();
        header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
    }// dangxuat

    /*
    * Name: layThongTinAdmin
    * Input: null
    * Content: get data personal information for admin
    * Output: go to personal information screen
    * */
    public function layThongTinAdmin()
    {
        $tai_khoan = $this->controlleradmin->layThongTinTaiKhoanAdmin();
        require_once("app/view/thongtincanhan.php");
    }// layThongTinAdmin

    /*
    * Name: thayDoiThongTin
    * Input: ho_ten_admin, dia_chi_admin, dien_thoai_admin
    * Content: update personal information for admin
    * Output: go to personal information screen
    * */
    public function thayDoiThongTin()
    {
        if (count($_POST) > 0) {
            $ho_ten = $_POST['ho_ten_admin'];
            $dia_chi = $_POST['dia_chi_admin'];
            $dien_thoai = $_POST['dien_thoai_admin'];
            if ($this->controlleradmin->updateAccountAdmin($ho_ten, $dia_chi, $dien_thoai)) {
                $this->errors[] = 'Cập nhật thông tin thành công';
                $_SESSION['tentaikhoan'] = $ho_ten;
                $this->layThongTinAdmin();
            } else {
                $this->errors[] = 'Lỗi xin mời bạn thử lại';
                $this->layThongTinAdmin();
            }
        }
    }// thayDoiThongTin

    /*
    * Name: doiMatKhau
    * Input: mat_khau_cu, mat_khau_moi
    * Content: update password for admin
    * Output: go to personal information screen
    * */
    public function doiMatKhau()
    {
        if (count($_POST) > 0) {
            $mat_khau_cu = $_POST['mat_khau_cu'];
            $mat_khau_moi = $_POST['mat_khau_moi'];
            if ($this->controlleradmin->doimatkhau($_SESSION['tendangnhapadmin'], $mat_khau_cu, $mat_khau_moi)) {
                $this->errors[] = 'Cập nhật thông tin thành công';
                $this->layThongTinAdmin();
            } else {
                $this->errors[] = 'Lỗi xin mời bạn thử lại';
                $this->layThongTinAdmin();
            }
        }
    }// doiMatKhau


}//class
