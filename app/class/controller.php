<?php

class controller
{
    public $bv;
    public $params;
    public $current_action;
    public $cname = "controller";
    public $lang = "vi";

// function __construct($action,$params, $lang){
    function __construct($action, $params)
    {
        $this->bv = new model;
        $this->current_action = $action;
        $this->params = $params;
        // $this->lang = $lang;
    }//construct

    function index()
    {
        $dsslider = $this->bv->laydanhsach("slider");
        $dsKhuNghiDuongSlier = array();
        foreach ($dsslider as $slider)
        {
            $khuNghiDuong = $this->bv->layThongTinChiTietKhuNghiDuong($slider['idkhunghiduong']);
            $dsKhuNghiDuongSlier[] = $khuNghiDuong;
        }
        //echo count($dsKhuNghiDuongSlier);
        require_once "view/home.php"; //nạp layout
    }//index

    function detail()
    {
        require_once "view/home.php";
    }//detail

    function chuyentrangdangky()
    {
        require_once "view/dangky.php";
    }

    function laydanhsachmail()
    {
        $id = $this->params[0];
        settype($id, "int");
        if ($id <= 0) return;
        return $this->bv->laymail($id);
        //require_once "view/dangky.php";
    }

    public function kiemtramail()
    {

        return $this->bv->dakiemtramail();
    }

    public function ktidtaikhoan()
    {
        $tendangnhap = $_POST["tendangnhap"];
        $ktTonTai = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "'";
        $truyvanktTonTai = $this->bv->xulydangnhap($ktTonTai);
        if (truyvanktTonTai) {
            echo "<script>alert('Tên đăng nhập này đã được sử dụng!!!')</script>";
            require_once "view/dangKy.php";
        } else
            dangKy();
    }

    public function chuyentrangdoimatkhau()
    {
        require_once "view/doimatkhau.php";
    }

    public function doimatkhau()
    {
        $tendangnhap = $_SESSION['tendangnhap'];
        $matkhaucu = $_POST["matkhaucu"];
        $matkhaumoi = $_POST["matkhaumoi"];
        if ($this->bv->doimatkhau($tendangnhap, $matkhaucu, $matkhaumoi)) {
            header('location:' . BASE_URL . "controller/index");
            echo "<script>alert('Đổi thành công')</script>";
        } else {
            header('location:' . BASE_URL . "controller/chuyentrangdoimatkhau");
            echo "<script>alert('Đổi mật khẩu thất bại kiểm tra lại mật khẩu cũ')</script>";
        }
    }


    public function dangNhap()
    {
        $tendangnhap = $_POST["username"];
        $matkhau = $_POST["password"];
        $remember = $_POST["rememberme"];
        $truyvanktTonTai = $this->bv->xulydangnhap($tendangnhap, $matkhau);
        if ($truyvanktTonTai) {

            $_SESSION["tendangnhap"] = $tendangnhap;

            if (isset($_POST["rememberme"])) {

                setcookie("tendangnhap", $tendangnhap, time() + 2592000);
                setcookie("matkhau", $matkhau, time() + 2592000);
                setcookie("rememberme", $remember, time() + 2592000);
            } else {
                setcookie("tendangnhap", $tendangnhap, time());
                setcookie("matkhau", $matkhau, time());
                setcookie("rememberme", $remember, time());
            }
            header('location:' . BASE_URL . "controller/index");
            echo "<script>alert('Đăng nhập thành công')</script>";
        } else {
            echo "<script>alert('Tài khoản hoặc mật khẩu không đúng')</script>";
            header('location:' . BASE_URL . "controller/index");
        }
    }

    public function dangKy()
    {
        $tendangnhap = $_POST["tendangnhap"];
        $matkhau = $_POST["matkhau"];
        $hoten = $_POST["hoten"];
        $diachi = $_POST["diachi"];
        $dienthoai = $_POST["dienthoai"];
        if ($this->bv->themTaiKhoan($tendangnhap, $matkhau, $hoten, $diachi, $dienthoai, 1))
            echo "<script>alert('Đăng ký thành công')</script>";
        else
            echo "<script>alert('Đăng ký không thành công')</script>";
        header('location:' . BASE_URL . "controller/index");
    }

    public function quenmatkhau()
    {
        require_once "view/forgetpass.php";
    }

    public function lienHe()
    {
        $ten = $_POST["ten"];
        $dienthoai = $_POST["dienthoai"];
        $email = $_POST["email"];
        $loinhan = $_POST["loinhan"];
        if ($this->bv->themLienHe($ten, $dienthoai, $email, $loinhan)) {
            echo "<script>alert('Đã gửi thành công')</script>";
        } else
            echo "<script>alert('Gửi lỗi, mời bạn gửi lại')</script>";
        header('location:' . BASE_URL . "controller/index");
    }

    public function booknow()
    {
        if (!isset($_SESSION['tendangnhap'])) {
            echo "<script>alert('Bạn cần đăng nhập để có thể book chỗ')</script>";
        } else {
            //echo "<script>alert('Bạn cần đăng nhập để có thể ')</script>";
            $tendangnhap = $_SESSION['tendangnhap'];
            $idsp = $this->params[0];
            settype($idsp, "int");
            if ($this->bv->booknow($tendangnhap, $idsp))
                echo "<script>alert('Bạn đã book thành công')</script>";
        }
    }

    public function readmore()
    {
        $idsp = $this->params[0];
        settype($idsp, "int");
        if ($this->bv->readmore($idsp))
            echo "<script>alert('Thông tin khu nghĩ dưỡng')</script>";
    }

    public function xemthongtincanhan()
    {
        $tendangnhap = $_SESSION['tendangnhap'];
        $row = $this->bv->xemthongtincanhan($tendangnhap);
        if($row >0){
            $_SESSION['tentaikhoan'] = $row['hoten'];
            $_SESSION['diachitaikhoan'] = $row['diachi'];
            $_SESSION['sodienthoaitaikhoan'] = $row['dienthoai'];
            return true;
        }
        return false;
    }

    public function luuthongtintaikhoan()
    {
        $tendangnhap = $_SESSION['tendangnhap'];
        $hoten = $_POST["tentaikhoan"];
        $diachi = $_POST["diachitaikhoan"];
        $dienthoai = $_POST["sodienthoaitaikhoan"];
        if($this->bv->capnhatthongtintk($tendangnhap, $hoten, $diachi, $dienthoai))
        {
            $_SESSION['tentaikhoan'] = $hoten;
            $_SESSION['diachitaikhoan'] = $diachi;
            $_SESSION['sodienthoaitaikhoan'] = $dienthoai;
        }

        header('location:' . BASE_URL . "controller/index");
    }

    public function dangxuat()
    {
        session_unset();
        session_destroy();
        header('location:' . BASE_URL . "controller/index");
    }


}//class
