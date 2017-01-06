<?php

class controlleradmin
{
    public $bv;
    public $params;
    public $current_action;
    public $cname = "controlleradmin";


    function __construct($action, $params)
    {
        $this->bv = new modeladmin;
        $this->current_action = $action;
        $this->params = $params;

    }//construct

    function index()
    {
        require_once "app/view/dangnhap.php";
    }//index

    function loadingadmin()
    {
        require_once "app/view/admin.php";
    }


    public function dangNhap()
    {
        $tendangnhap = $_POST["username"];
        $matkhau = $_POST["password"];

        $ktTonTai = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' and matkhau='" . md5($matkhau) . "' and id_vaitro = 2";
        // echo $ktTonTai;
        $truyvanktTonTai = $this->bv->xulydangnhap($ktTonTai);
        if ($truyvanktTonTai) {
            $_SESSION["tendangnhap"] = $tendangnhap;
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
            header('location:' . BASE_URL_ADMIN."controlleradmin/index");
        }
    }


}//class
