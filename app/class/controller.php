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
        $du_lieu_tham_gia = $this->control->layDuLieuThamGia();

        $cau_hoi_thuong_gap = $this->control->layDanhSachCauHoiThuongGap();
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }
        //echo count($dsKhuNghiDuongSlier);
        $imagick = new \Imagick(realpath('C:\xampp\htdocs' . BASE_DIR . $du_lieu_tham_gia['hinh_anh']));
        $imagick->resizeImage(1070, 868, Imagick::FILTER_LANCZOS, 1);
        $width_khung_1 = 257.5;
        $high_khung_1 = 217;
        $width_khung_2 = 252.5;
        $high_khung_2 = 217;
        $width_khung_3 = 520;
        $high_khung_3 = 217;
        $width_khung_4 = 535;
        $high_khung_4 = 434;
        $width_khung_5 = 1070;
        $high_khung_5 = 434;
        $array_img = array();
        $img_khung_1 = clone $imagick;
        $img_khung_1->cropImage($width_khung_1, $high_khung_1, 0, 0);
        $img_khung_1->resizeImage(266.67, 216.35, Imagick::FILTER_LANCZOS, 1);
        array_push($array_img, $img_khung_1);
        $img_khung_2 = clone $imagick;
        $img_khung_2->cropImage($width_khung_2, $high_khung_2, 277.5, 0);
        $img_khung_2->resizeImage(267.78, 217.26, Imagick::FILTER_LANCZOS, 1);
        array_push($array_img, $img_khung_2);
        $img_khung_3 = clone $imagick;
        $img_khung_3->cropImage($width_khung_3, $high_khung_3, 0, 217);
        $img_khung_3->resizeImage(580.99, 217, Imagick::FILTER_LANCZOS, 1);
        array_push($array_img, $img_khung_3);
        $img_khung_4 = clone $imagick;
        $img_khung_4->cropImage($width_khung_4, $high_khung_4, 550, 0);
        $img_khung_4->resizeImage(568.99, 453.99, Imagick::FILTER_LANCZOS, 1);
        array_push($array_img, $img_khung_4);
        $img_khung_5 = clone $imagick;
        $img_khung_5->cropImage($width_khung_5, $high_khung_5, 0, 434);
        $img_khung_5->resizeImage(1157.99, 350, Imagick::FILTER_LANCZOS, 1);
        array_push($array_img, $img_khung_5);

        $imagick_t = new \Imagick(realpath('C:\xampp\htdocs' . BASE_DIR . "img/wallpaper_nature.jpg"));
        $imagick_t->resizeImage(1140, 560, Imagick::FILTER_LANCZOS, 1);
        $width_khung_1_t = 850;
        $high_khung_1_t = 270;
        $width_khung_2_t = 270;
        $high_khung_2_t = 270;
        $width_khung_3_t = 270;
        $high_khung_3_t = 270;
        $width_khung_4_t = 270;
        $high_khung_4_t = 270;
        $width_khung_5_t = 280;
        $high_khung_5_t = 560;
        $array_img_t = array();
        $img_khung_1_t = clone $imagick_t;
        $img_khung_1_t->cropImage($width_khung_1_t, $high_khung_1_t, 0, 0);
        //$img_khung_1->resizeImage(266.67,216.35, Imagick::FILTER_LANCZOS, 1);
        array_push($array_img_t, $img_khung_1_t);
        $img_khung_2_t = clone $imagick_t;
        $img_khung_2_t->cropImage($width_khung_2_t, $high_khung_2_t, 0, 290);
        //$img_khung_2_t->resizeImage(267.78,217.26, Imagick::FILTER_LANCZOS, 1);
        array_push($array_img_t, $img_khung_2_t);
        $img_khung_3_t = clone $imagick_t;
        $img_khung_3_t->cropImage($width_khung_3_t, $high_khung_3_t, 290, 290);
        //$img_khung_3_t->resizeImage(580.99,217, Imagick::FILTER_LANCZOS, 1);
        array_push($array_img_t, $img_khung_3_t);
        $img_khung_4_t = clone $imagick_t;
        $img_khung_4_t->cropImage($width_khung_4_t, $high_khung_4_t, 580, 290);
        //$img_khung_4_t->resizeImage(568.99,453.99, Imagick::FILTER_LANCZOS, 1);
        array_push($array_img_t, $img_khung_4_t);
        $img_khung_5_t = clone $imagick_t;
        $img_khung_5_t->cropImage($width_khung_5_t, $high_khung_5_t, 860, 0);
        //$img_khung_5_t->resizeImage(1157.99,350, Imagick::FILTER_LANCZOS, 1);
        array_push($array_img_t, $img_khung_5_t);
        require_once "view/home.php"; //nạp layout
    }//index

    function detail()
    {
        require_once "view/home.php";
    }//detail

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
    }

    public function chuyenTrangKhuNghiDuongGiaCa()
    {
        $dssbanner = $this->control->laydanhsach("banner");
        $ds_video = $this->control->laydanhsach("video");
        $dssliderw = $this->control->laydanhsachslider();
        $gioithieu = $this->control->laygioithieu();
        $du_lieu_tham_gia = $this->control->layDuLieuThamGia();

        $cau_hoi_thuong_gap = $this->control->layDanhSachCauHoiThuongGap();
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }

        $regions = array(array());
        $listContinents = $this->control->getListContinents();
        foreach ($listContinents as $key => $continent) {
            $regions[$key] = $this->control->getListRegions($continent['id']);
        }

        $address = "42 Broadwat Suit 12-233 New York, NY 10004";
        $url = 'http://maps.google.com/maps/api/geocode/json?address=' . urlencode($address);
        $output = $this->control->httpGet($url);
        $data = json_decode($output, true);
        $geometry = $data['results'][0]['geometry']['location'];
        $lat = $geometry['lat'];
        $lng = $geometry['lng'];

        require_once("view/ResortDirectory.php");
    }

    public function laySoLuongVideo()
    {
        $total = array("total" => 0);
        $pages = $this->control->laySoLuongVideo() / 5;
        $total = array("total" => 0);
        $tmp = explode(".", $pages);
        if (count($tmp) > 1) {
            $pages = $tmp[0] + 1;
        } else {
            $pages = $tmp[0];
        }
        $total["total"] = $pages;
        echo json_encode($total);
    }

    public function layDanhSachVideo()
    {
        $items = 5;
        $currentPage = (int)$_POST["currentPage"];
        $offset = ($currentPage - 1) * $items;
        $danh_sach_video = $this->control->layDanhSachVideo($offset, $items);
        echo json_encode($danh_sach_video);
    }

    public function loadingDealsPage()
    {
        $list_deals = $this->control->getListDeals();
        $dssbanner = $this->control->laydanhsach("banner");
        $dssliderw = $this->control->laydanhsachslider();
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }
        require_once("view/UuDaiDacBiet.php");
    }

    public function getListDeals()
    {
        $items = 6;
        $currentPage = (int)$_POST["currentPage"];
        $offset = ($currentPage - 1) * $items;
        $list_deals = $this->control->getListDealsPage($offset, $items);
        echo json_encode($list_deals);
    }

    public function getNumberDeals()
    {
        $total = array("total" => 0);
        $pages = $this->control->getNumberDeals() / 6;
        $total = array("total" => 0);
        $tmp = explode(".", $pages);
        if (count($tmp) > 1) {
            $pages = $tmp[0] + 1;
        } else {
            $pages = $tmp[0];
        }
        $total["total"] = $pages;
        echo json_encode($total);
    }

    public function getDetailDeals()
    {
        $id_deals = $this->params[0];
        settype($id_deals, "int");
        $deals = $this->control->getDetailDeals($id_deals);
        $list_deals = $this->control->getListDeals();
        $dssbanner = $this->control->laydanhsach("banner");
        $dssliderw = $this->control->laydanhsachslider();
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }
        require_once("view/DetailDeals.php");
    }

    public function getNumberConnect()
    {
        $total = array("total" => 0);
        $pages = $this->control->getNumberConnect() / 6;
        $total = array("total" => 0);
        $tmp = explode(".", $pages);
        if (count($tmp) > 1) {
            $pages = $tmp[0] + 1;
        } else {
            $pages = $tmp[0];
        }
        $total["total"] = $pages;
        echo json_encode($total);
    }

    public function getListConnect()
    {
        $items = 6;
        $currentPage = (int)$_POST["currentPage"];
        $offset = ($currentPage - 1) * $items;
        $list_connect = $this->control->getListConnect($offset, $items);
        echo json_encode($list_connect);
    }

    public function loadingConnectPage()
    {
        $dssbanner = $this->control->laydanhsach("banner");
        $dssliderw = $this->control->laydanhsachslider();
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }
        require_once("view/KetNoiPPC.php");
    }

    public function getDetailConnect()
    {
        $id_deals = $this->params[0];
        settype($id_deals, "int");
        $deals = $this->control->getDetailConnect($id_deals);
        $list_deals = $this->control->getListDeals();
        $dssbanner = $this->control->laydanhsach("banner");
        $dssliderw = $this->control->laydanhsachslider();
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }
        require_once("view/DetailConnect.php");
    }

    public function getNumberAnncounce()
    {
        $total = array("total" => 0);
        $pages = $this->control->getNumberAnncounce() / 6;
        $total = array("total" => 0);
        $tmp = explode(".", $pages);
        if (count($tmp) > 1) {
            $pages = $tmp[0] + 1;
        } else {
            $pages = $tmp[0];
        }
        $total["total"] = $pages;
        echo json_encode($total);
    }

    public function getListAnnounce()
    {
        $items = 6;
        $currentPage = (int)$_POST["currentPage"];
        $offset = ($currentPage - 1) * $items;
        $list_connect = $this->control->getListAnnounce($offset, $items);
        echo json_encode($list_connect);
    }

    public function loadingAnnouncePage()
    {
        $dssbanner = $this->control->laydanhsach("banner");
        $dssliderw = $this->control->laydanhsachslider();
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }
        require_once("view/ThongBaoBaoChi.php");
    }

    public function getDetailsResort()
    {

    }

    public function loadingDetailsResort()
    {
        $id = $this->params[0];
        $dssbanner = $this->control->laydanhsach("banner");
        $dssliderw = $this->control->laydanhsachslider();
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }
        $resort = $this->control->getDetailsResort($id);
        $listImageResort = $this->control->getListImageResort($id);
        $address = $resort["address"];
        $url = 'http://maps.google.com/maps/api/geocode/json?address=' . urlencode($address);
        $output = $this->control->httpGet($url);
        $data = json_decode($output, true);
        $geometry = $data['results'][0]['geometry']['location'];
        $lat = $geometry['lat'];
        $lng = $geometry['lng'];
        require_once("view/DetailsResort.php");
    }

    public function loadingOwingATimeShare()
    {
        $dssbanner = $this->control->laydanhsach("banner");
        $dssliderw = $this->control->laydanhsachslider();
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }
        $data = $this->control->getOwingATimeShare();
        require_once("view/KhachChuaSoHuu.php");
    }

    public function loadingBenefitTimeShare()
    {
        $dssbanner = $this->control->laydanhsach("banner");
        $dssliderw = $this->control->laydanhsachslider();
        $dsKhuNghiDuongBanner = array();
        foreach ($dssbanner as $banner) {
            $khuNghiDuongBanner = $this->control->layThongTinChiTietKhuNghiDuong($banner['idkhunghiduong']);
            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
        }
        $data = $this->control->getBenefitTimeShare();
        require_once("view/LoiIchTimeShare.php");
    }

    public function updateContinent()
    {
        $listCountry = $this->control->laydanhsach("country");
        foreach ($listCountry as $country) {
            $name = $this->control->countrytocontinent($country['sort_name']);
            $id = $this->control->getIdContinents($name);
            $idCountry = $country['id'];
            $this->control->setIdContinents($idCountry,$id);
        }

    }

}//class
