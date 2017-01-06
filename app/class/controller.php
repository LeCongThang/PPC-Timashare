<?php

class controller
{
    public $control;
    public $params;
    public $current_action;
    public $cname = "controller";
    public $lang = 'vi';

    function __construct($action, $params, $lang)
    {
        //function __construct($action, $params)
        //{
        $this->control = new model;
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = $lang;
        $_SESSION['lang'] = $lang;
    }//construct

    function index()
    {
        $dssbanner = $this->control->laydanhsach("banner");
        $ds_video = $this->control->laydanhsach("video");
        $dssliderw = $this->control->laydanhsachslider();
        $gioithieu = $this->control->laygioithieu();
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }
        //echo count($dsKhuNghiDuongSlier);
        require_once "view/home.php"; //nạp layout
    }//index

    function detail()
    {
        require_once "view/home.php";
    }//detail

    function laydanhsachmail()
    {
        $id = $this->params[0];
        settype($id, "int");
        if ($id <= 0) return;
        return $this->control->laymail($id);
        //require_once "view/dangky.php";
    }

    public function kiemtramail()
    {

        return $this->control->dakiemtramail();
    }


    public function doimatkhau()
    {
        $tendangnhap = $_SESSION['tendangnhap'];
        $matkhaucu = $_POST["matkhaucu"];
        $matkhaumoi = $_POST["matkhaumoi"];
        if ($this->control->doimatkhau($tendangnhap, $matkhaucu, $matkhaumoi)) {
            header('location:' . BASE_URL . $this->lang . "/controller/index");
            echo "<script>alert('Đổi thành công')</script>";
        } else {
            echo "<script>alert('Đổi mật khẩu thất bại kiểm tra lại mật khẩu cũ')</script>";
        }
    }


    public function dangNhap()
    {
        $tendangnhap = $_POST["username"];
        $matkhau = $_POST["password"];
        $remember = $_POST["rememberme"];
        $truyvanktTonTai = $this->control->xulydangnhap($tendangnhap, $matkhau);
        if ($truyvanktTonTai) {
            $_SESSION["tendangnhap"] = $tendangnhap;
            $row = $this->control->xemthongtincanhan($tendangnhap);
            if ($row > 0) {
                $_SESSION['tentaikhoan'] = $row['hoten'];
                $_SESSION['diachitaikhoan'] = $row['diachi'];
                $_SESSION['sodienthoaitaikhoan'] = $row['dienthoai'];
            }
            if (isset($_POST["rememberme"])) {

                setcookie("tendangnhap", $tendangnhap, time() + 2592000);
                setcookie("matkhau", $matkhau, time() + 2592000);
                setcookie("rememberme", $remember, time() + 2592000);
            } else {
                setcookie("tendangnhap", $tendangnhap, time());
                setcookie("matkhau", $matkhau, time());
                setcookie("rememberme", $remember, time());
            }
            header('location:' . BASE_URL . $this->lang . "/controller/index");
            echo "<script>alert('Đăng nhập thành công')</script>";
        } else {
            session_unset();
            session_destroy();
            if (isset($_COOKIE["tendangnhap"])) {
                setcookie("tendangnhap", $_COOKIE["tendangnhap"], time());
                setcookie("matkhau", $_COOKIE["matkhau"], time());
                setcookie("rememberme", $_COOKIE["rememberme"], time());
            }
            header('location:' . BASE_URL . $this->lang . "/controller/index");
        }
    }

    public function dangKy()
    {
        $diaChiEmail = $_POST["diaChiEmail"];
        $dienthoai = $_POST["dienthoai"];
        if ($this->control->themTaiKhoanDangKy($diaChiEmail, $dienthoai)) {
            header('location:' . BASE_URL . $this->lang . "/controller/index");
        }
    }

    public function quenmatkhau()
    {
        $tendangnhapll = $_POST["tendangnhapll"];
        $sodienthoaitaikhoanll = $_POST["sodienthoaitaikhoanll"];
        $carrier = "";
        if ($this->control->ktIdVaSoDienThoai($tendangnhapll, $sodienthoaitaikhoanll)) {
            $message = "Mật khẩu của bạn là PPCTIMESHARE123";
            $to = $sodienthoaitaikhoanll . '@' . $carrier;
            $result = @mail($to, '', $message);
            $this->control->doiquenmatkhau($tendangnhapll, "PPCTIMESHARE123");
        } else {

        }
        header('location:' . BASE_URL . $this->lang . "/controller/index");
    }

    public function lienHe()
    {
        $ten = $_POST["ten"];
        $dienthoai = $_POST["dienthoaicongty"];
        $email = $_POST["email"];
        $loinhan = $_POST["loinhan"];
        if ($this->control->themLienHe($ten, $dienthoai, $email, $loinhan)) {
            echo "<script>alert('Đã gửi thành công')</script>";
        } else
            echo "<script>alert('Gửi lỗi, mời bạn gửi lại')</script>";
        header('location:' . BASE_URL . $this->lang . "/controller/index");

    }


    public function readmore()
    {
        $idsp = $this->params[0];
        settype($idsp, "int");
        if ($this->control->readmore($idsp))
            echo "<script>alert('Thông tin khu nghĩ dưỡng')</script>";
    }

    public function xemthongtincanhan()
    {
        $tendangnhap = $_SESSION['tendangnhap'];
        $row = $this->control->xemthongtincanhan($tendangnhap);
        if ($row > 0) {
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
        if ($this->control->capnhatthongtintk($tendangnhap, $hoten, $diachi, $dienthoai)) {
            $_SESSION['tentaikhoan'] = $hoten;
            $_SESSION['diachitaikhoan'] = $diachi;
            $_SESSION['sodienthoaitaikhoan'] = $dienthoai;
        }

        header('location:' . BASE_URL . $this->lang . "/controller/index");
    }

    public function dangxuat()
    {
        session_unset();
        session_destroy();
        header('location:' . BASE_URL . $this->lang . "/controller/index");
    }

    public function bookKhuNghiDuong()
    {

        if (!isset($_SESSION['tendangnhap'])) {
            echo "<script>alert('Bạn cần đăng nhập để có thể book chỗ')</script>";
        } else {
            //echo "<script>alert('Bạn cần đăng nhập để có thể ')</script>";
            $thoigian = $_POST["thoigian"];
            $ghichu = $_POST["comment"];
            $tendangnhap = $_SESSION['tendangnhap'];
            $idsp = 1;
            settype($idsp, "int");
            if ($this->control->booknow($tendangnhap, $idsp, $thoigian, $ghichu))
                echo "<script>alert('Bạn đã book thành công')</script>";
        }
    }

    public function xemChiTietKhuNghiDuong()
    {
        $dssbanner = $this->control->laydanhsach("banner");
        $dssliderw = $this->control->laydanhsachslider();
        $gioithieu = $this->control->laydulieu("gioithieu_" . $_SESSION['lang']);
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }
        $idknd = $this->params[0];
        //echo $idknd;
        $knd = $this->control->layThongTinChiTietKhuNghiDuong($idknd);
        require_once "view/xemChiTietKhuNghiDuong.php";
    }

    public function layDanhSachLoaiDichVu()
    {
        $dsdv = $this->control->laydanhsach("loaidichvu");
        $_SESSION['dsdv'] = $dsdv;
        return true;
    }


}//class
