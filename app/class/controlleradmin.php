<?php
class controlleradmin {
public $bv;
public $params;
public $current_action;
public $cname="controlleradmin";
public $lang;
function __construct($action,$params){
	$this->bv = new modeladmin;
	$this->current_action=$action;
	$this->params = $params;
	$this->lang = 'vi';
}//construct

function index(){
	require_once "view/dangnhapadmin.php"; //nạp layout
}//index

public function dangNhap()
    {
        $tendangnhap = $_POST["username"];
        $matkhau = $_POST["password"];

        $ktTonTai = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' and matkhau='" . md5($matkhau) . "' and id_vaitro = 2";
        $truyvanktTonTai = $this->bv->xulydangnhap($ktTonTai);
        if ($truyvanktTonTai){
            echo "<script>alert('Đăng nhập thành công')</script>";
            $_SESSION["tendangnhap"] = $tendangnhap;

            if(isset($_POST["rememberme"])){
                $remember = $_POST["rememberme"];
                setcookie("tendangnhap",$tendangnhap,time()+2592000);
                setcookie("matkhau",$matkhau,time()+2592000);
                setcookie("rememberme",$remember,time()+2592000);
            }else{
                setcookie("tendangnhap",$tendangnhap,time());
                setcookie("matkhau",$matkhau,time());
            }
            require_once "view/home.php";
        }
        else{
            echo "<script>alert('Tài khoản hoặc mật khẩu không đúng')</script>";
            require_once "view/home.php";
        }
    }


}//class
