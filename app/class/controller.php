<?php
class controller {
public $bv;
public $params;
public $current_action;
public $cname="controller";
public $lang = "vi";
// function __construct($action,$params, $lang){
function __construct($action,$params){
	$this->bv = new model;
	$this->current_action=$action;
	$this->params = $params;
	// $this->lang = $lang;
}//construct

function index(){
	require_once "view/home.php"; //nạp layout
}//index

function detail(){		
	require_once "view/home.php";
}//detail

function chuyentrangdangky(){
    require_once "view/dangky.php";
}

function laydanhsachmail(){
    $id= $this->params[0]; settype($id,"int"); if ($id<=0) return;
    return $this->bv->laymail($id);
    //require_once "view/dangky.php";
}

public function kiemtramail(){

    return $this->bv->dakiemtramail();
}

public function ktidtaikhoan(){
    $tendangnhap = $_POST["tendangnhap"];
    $ktTonTai = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "'";
    $truyvanktTonTai = $this->bv->xulydangnhap($ktTonTai);
    if(truyvanktTonTai){
        echo "<script>alert('Tên đăng nhập này đã được sử dụng!!!')</script>";
        require_once "view/dangKy.php";
    }
    else 
        dangKy();
}

public function dangNhap()
    {
        $tendangnhap = $_POST["username"];
        $matkhau = $_POST["password"];
        $ktTonTai = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' and matkhau='" . md5($matkhau) . "' and id_vaitro = 1";
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

    public function dangKy(){
        $tendangnhap = $_POST["tendangnhap"];
        $matkhau = $_POST["matkhau"];
        $hoten = $_POST["hoten"];
        $diachi = $_POST["diachi"];
        $dienthoai = $_POST["dienthoai"];
        if($this->bv->themTaiKhoan($tendangnhap,$matkhau,$hoten,$diachi,$dienthoai,1))
            echo "<script>alert('Đăng ký thành công')</script>";
        else
            echo "<script>alert('Đăng ký không thành công')</script>";
        require_once "view/home.php";
    }

    public function lienHe(){
        $ten = $_POST["ten"];
        $dienthoai = $_POST["dienthoai"];
        $email = $_POST["email"];
        $loinhan = $_POST["loinhan"];
        if($this->bv->themLienHe($ten,$dienthoai,$email,$loinhan)) {
            echo "<script>alert('Đã gửi thành công')</script>";
        }
        else
            echo "<script>alert('Gửi lỗi, mời bạn gửi lại')</script>";
        require_once "view/home.php";
    }

}//class
