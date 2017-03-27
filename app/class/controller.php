<?php

class controller
{
    public $control;
    public $params;
    public $current_action;
    public $cname = "controller";
    public $lang = 'en';

    const UPDATE_DIR = '../';

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
        try {
            $dssbanner = $this->control->laydanhsach("banner");
            $ds_video = $this->control->laydanhsach("video");
            $dssliderw = $this->control->laydanhsachslider();
            $gioithieu = $this->control->laygioithieu();
            $du_lieu_tham_gia = $this->control->layDuLieuThamGia();

            $cau_hoi_thuong_gap = $this->control->layDanhSachCauHoiThuongGap();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            //echo count($dsKhuNghiDuongSlier);
            $imagick = new \Imagick(realpath(REAL_PATH . BASE_DIR . $du_lieu_tham_gia['hinh_anh']));
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

            $imagick_t = new \Imagick(realpath(REAL_PATH . BASE_DIR . "img/wallpaper_nature.jpg"));
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
            $about = $this->control->loadAbout($_SESSION['lang']);
            require_once "view/home.php"; //nạp layout
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }

    }//index

    public function loadingErrorPage()
    {
        require_once("view/ErrorPage.php");
    }


    private function uploadHinh()
    {
        if (isset($_FILES['imgInp'])) {
            $error = $_FILES['imgInp']['error'];
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["imgInp"]["tmp_name"];
                $name = "img/" . time() . "_" . basename($_FILES["imgInp"]["name"]);
                move_uploaded_file($tmp_name, self::UPDATE_DIR . $name);
                return $name;
            }
        }
        return null;
    }

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

    function detail()
    {
        require_once "view/home.php";
    }//detail


    public function doimatkhau()
    {
        $tendangnhap = $_SESSION['tendangnhap'];
        $matkhaucu = $_POST["matkhaucu"];
        $matkhaumoi = $_POST["matkhaumoi"];
        if ($this->control->doimatkhau($tendangnhap, $matkhaucu, $matkhaumoi))
            echo "true";
        else
            echo "false";
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
                $_SESSION['is_login'] = "true";
                $_SESSION["id"] = $row['id'];
                $_SESSION['tentaikhoan'] = $row['hoten'];
                $_SESSION['diachitaikhoan'] = $row['diachi'];
                $_SESSION['sodienthoaitaikhoan'] = $row['dienthoai'];
            }
            if ($remember == "true") {
                setcookie("tendangnhap", $tendangnhap, time() + 2592000);
                setcookie("matkhau", $matkhau, time() + 2592000);
                setcookie("rememberme", $remember, time() + 2592000);
            } else {
                setcookie("tendangnhap", $tendangnhap, time());
                setcookie("matkhau", $matkhau, time());
                setcookie("rememberme", $remember, time());
            }
            echo "true";
        } else {
            $_SESSION['is_login'] = "false";
            session_unset();
            session_destroy();
            if (isset($_COOKIE["tendangnhap"])) {
                setcookie("tendangnhap", $_COOKIE["tendangnhap"], time());
                setcookie("matkhau", $_COOKIE["matkhau"], time());
                setcookie("rememberme", $_COOKIE["rememberme"], time());
            }
            echo "false";
        }

    }

    /**
     * resgiter
     * @return 0 same email
     * @return 1 same number phone
     * @return 2 sucessfull
     * @return 3 fail
     */
    public function dangKy()
    {
        $imageResgiter = $this->uploadHinh();
        if ($imageResgiter == null)
            $imageResgiter = "NULL";
        $emailResgiter = $_POST["emailResgiter"];
        $passwordResgiter = $_POST["passwordResgiter"];
        $nameResgiter = $_POST["nameResgiter"];
        $addressResgiter = $_POST["addressResgiter"];
        $numberPhoneResgiter = $_POST["numberPhoneResgiter"];
        $sexResgiter = $_POST["sexResgiter"];

        if ($this->control->isHasEmail($emailResgiter) != "")
            echo 0;
        else if ($this->control->isHasNumberPhone($numberPhoneResgiter) != "")
            echo 1;
        else if ($this->control->insertAccountUser($imageResgiter, $emailResgiter, $passwordResgiter, $nameResgiter, $addressResgiter, $numberPhoneResgiter, $sexResgiter)) {
            echo 2;
        } else
            echo 3;
    }

    public function capNhatThongTin()
    {
        $imageUpdate = $this->uploadHinhUpdate();
        if ($imageUpdate == null)
            $imageUpdate = "NULL";
        $nameUpdate = $_POST["nameUpdate"];
        $addressUpdate = $_POST["addressUpdate"];
        $numberPhoneUpdate = $_POST["numberPhoneUpdate"];
        $sexUpdate = $_POST["sexUpdate"];
        if ($this->control->UpdateAccountUser($imageUpdate, $nameUpdate, $addressUpdate, $numberPhoneUpdate, $sexUpdate)) {
            $_SESSION['tentaikhoan'] = $nameUpdate;
            echo 2;
        } else
            echo 3;
    }

    public function quenmatkhau()
    {
        // input tendangnhap($email khach hang)
        $email = $_POST["tendangnhapll"];
        // lay id cua khach hang
        $user = $this->control->getUserByEmail($email);
        $id_account = $user['id'];
        if ($id_account != "") {
            $date_now = date("Y-m-dh:i:sa");

            $password_key = md5($date_now . $id_account . $email);

            $this->control->updatePasswordKey($password_key, $id_account);

            require 'PHPMailerAutoload.php';

            $mail = new PHPMailer();
            //Khai báo gửi mail bằng SMTP
            $mail->IsSMTP();
            //Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
            // 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
            // 1 = Thông báo lỗi ở client
            // 2 = Thông báo lỗi cả client và lỗi ở server
            $mail->SMTPDebug = 2;

            $mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
            $mail->Host = "smtp.gmail.com"; //host smtp để gửi mail
            $mail->Port = 587; // cổng để gửi mail
            $mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
            $mail->SMTPAuth = true; //Xác thực SMTP
            $mail->Username = USER_NAME_MAIL; // Tên đăng nhập tài khoản Gmail
            $mail->Password = PASSWORD_EMAIL; //Mật khẩu của gmail
            $mail->SetFrom(USER_NAME_MAIL, "Change password PPC-TimeShare account"); // Thông tin người gửi
            $mail->AddReplyTo("mailer.proimage@gmail.com", USER_NAME_EMAIL_REPLY);// Ấn định email sẽ nhận khi người dùng reply lại.
            $mail->AddAddress($email, $user['hoten']);//Email của người nhận
            $mail->Subject = "Change password PPC-TimeShare account"; //Tiêu đề của thư
            ob_start();
            $user_name = $user['hoten'];
            $password_key = BASE_URL . $_SESSION['lang'] . "/controller/changePassword/" . $password_key;
            require "forget-pass.blade.php";

            $mail->Body = ob_get_contents();
            //$mail->MsgHTML("lorem"); //Nội dung của bức thư.
            // $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
            // Gửi thư với tập tin html
            $mail->AltBody = "This is mail to change password PPC-TimeShare account";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
            //$mail->AddAttachment("images/attact-tui.gif");//Tập tin cần attach

            //Tiến hành gửi email và kiểm tra lỗi
            if (!$mail->Send()) {
                echo "false";
            } else {
                echo "true";
            }
        } else
            echo "false";
    }

    public function lienHe()
    {
        try {
            $ten = $_POST["tencongty"];
            $dienthoai = $_POST["dienthoaicongty"];
            $email = $_POST["emailcongty"];
            $loinhan = $_POST["loinhan"];
            if ($this->control->themLienHe($ten, $dienthoai, $email, $loinhan))
                echo "true";
            else
                echo "false";
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
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
        $_SESSION['is_login'] = "false";
        session_unset();
        session_destroy();
        header('location:' . BASE_URL . $this->lang . "/controller/index");
    }

    public function bookKhuNghiDuong()
    {

        if (!isset($_SESSION['tendangnhap'])) {
            //Ban Can Dang nhap De Boook
        } else {
            $id_user = $_SESSION["id"];
            $id_resort = $_POST["resort_id"];
            $start_date = $_POST["date_start"];
            $end_date = $_POST["date_end"];
            $room = $_POST["room"];
            $adults = $_POST["adults"];
            $childs = $_POST["childs"];
            $note = $_POST["note"];
            $id_voucher = $_POST["voucher"];
            if ($this->control->bookNow($id_user, $id_resort, $start_date, $end_date, $room, $adults, $childs, $note, $id_voucher)) {
                if ($id_voucher != 0)
                    $this->control->decreaseNumberVoucher($id_voucher);
                echo "true";
            } else echo "false";
        }
    }

    public function xemChiTietKhuNghiDuong()
    {
        try {
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $gioithieu = $this->control->laydulieu("gioithieu_" . $_SESSION['lang']);
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            $idknd = $this->params[0];
            //echo $idknd;
            $knd = $this->control->getDetailsResortWithOneImage($idknd);
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function chuyenTrangKhuNghiDuongGiaCa()
    {
        try {
            $id = 0;
            $resort_type = 0;
            $sort_by = 0;
            $listContinents = "";
            if (isset($_POST["resort_type"]))
                $resort_type = $_POST["resort_type"];
            if (isset($_POST["sort_by"]))
                $sort_by = $_POST["sort_by"];

            $dssbanner = $this->control->laydanhsach("banner");
            $ds_video = $this->control->laydanhsach("video");
            $dssliderw = $this->control->laydanhsachslider();
            $gioithieu = $this->control->laygioithieu();
            $du_lieu_tham_gia = $this->control->layDuLieuThamGia();

            $cau_hoi_thuong_gap = $this->control->layDanhSachCauHoiThuongGap();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }

            if ($resort_type == 0) {
                if ($sort_by == 0) {
                    $resort_type_clause = "";
                    $sort_by_clause = "";
                } else if ($sort_by == 1) {
                    $date = new DateTime('now');
                    date_sub($date, date_interval_create_from_date_string('7 days'));
                    $resort_type_clause = "";
                    $sort_by_clause = " AND resort.created_date > '" . $date->format('Y-m-d') . "' ";
                } else if ($sort_by == 2) {
                    $resort_type_clause = "";
                    $date = new DateTime('now');
                    $sort_by_clause = " AND resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
                }
            } else if ($resort_type == 1) {
                if ($sort_by == 0) {
                    $resort_type_clause = " AND resort.id_resort_type = 1 ";
                    $sort_by_clause = "";
                } else if ($sort_by == 1) {
                    $date = new DateTime('now');
                    date_sub($date, date_interval_create_from_date_string('7 days'));
                    $resort_type_clause = " AND resort.id_resort_type = 1 ";
                    $sort_by_clause = " AND resort.created_date > '" . $date->format('Y-m-d') . "' ";
                } else if ($sort_by == 2) {
                    $resort_type_clause = " AND resort.id_resort_type = 1 ";
                    $date = new DateTime('now');
                    $sort_by_clause = " AND resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
                }
            } else if ($resort_type == 2) {
                if ($sort_by == 0) {
                    $resort_type_clause = " AND resort.id_resort_type = 2 ";
                    $sort_by_clause = "";
                } else if ($sort_by == 1) {
                    $date = new DateTime('now');
                    date_sub($date, date_interval_create_from_date_string('7 days'));
                    $resort_type_clause = " AND resort.id_resort_type = 2 ";
                    $sort_by_clause = " AND resort.created_date > '" . $date->format('Y-m-d') . "' ";
                } else if ($sort_by == 2) {
                    $resort_type_clause = " AND resort.id_resort_type = 2 ";
                    $date = new DateTime('now');
                    $sort_by_clause = " AND resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
                }
            }

            if (!isset($this->params[0])) {
                $regions = array(array());
                $listContinents = $this->control->getListContinents();
                $listCoutinentsNumber = array();
                $listRegionNumber = array(array());
                foreach ($listContinents as $key => $continent) {
                    $regions[$key] = $this->control->getListRegions($continent['id']);
                    $listCoutinentsNumber[$key] = $this->control->getNumberResortByCountinent($continent['id'], $resort_type_clause, $sort_by_clause);
                    foreach ($regions[$continent['id'] - 1] as $key2 => $region) {
                        $listRegionNumber[$key][$key2] = $this->control->getNumberResortById($region['id'], $resort_type_clause, $sort_by_clause);
                    }
                }
                $listResort = $this->control->getAllResort($resort_type_clause, $sort_by_clause);
            } else {
                $id = $this->params[0];
                if (!is_numeric($id)) {
                    header('location:' . BASE_URL . $this->lang . "/controller/loadingErrorPage");
                }
                if (!isset($this->params[1])) {
                    $country_name = $this->control->getLongNameCountry($id);
                    $listCity = $this->control->getListCityByIdCountry($id);
                    $address = $country_name;
                    $countryNumber = $this->control->getNumberResortById($id, $resort_type_clause, $sort_by_clause);
                    $listCityNumber = array();
                    foreach ($listCity as $key => $city) {
                        $listCityNumber[$key] = $this->control->getNumberResortByIdCity($city['id'], $resort_type_clause, $sort_by_clause);
                    }
                    $listResort = $this->control->getResortByCountryName($id, $resort_type_clause, $sort_by_clause);
                } else {
                    $id_city = $this->params[1];
                    if (!is_numeric($id_city)) {
                        header('location:' . BASE_URL . $this->lang . "/controller/loadingErrorPage");
                    }
                    $city = $this->control->getCityById($id_city);
                    $name_city = $city['name'];
                    $cityNumber = $this->control->getNumberResortByIdCity($id_city, $resort_type_clause, $sort_by_clause);
                    $listResort = $this->control->getAllResortByIdCity($id_city, $resort_type_clause, $sort_by_clause);
                    $address = $name_city;
                }
                $url = 'http://maps.google.com/maps/api/geocode/json?address=' . urlencode($address);
                $output = $this->control->httpGet($url);
                $data = json_decode($output, true);
                $geometry = $data['results'][0]['geometry']['location'];
                $lat = $geometry['lat'];
                $lng = $geometry['lng'];
            }
            require_once("view/ResortDirectory.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function directResortDriectoryView()
    {
        $id = 0;
        $resort_type = 0;
        $sort_by = 0;
        $listContinents = "";

        if (isset($_POST["resort_type"]))
            $resort_type = $_POST["resort_type"];
        if (isset($_POST["sort_by"]))
            $sort_by = $_POST["sort_by"];

        if ($resort_type == 0) {
            if ($sort_by == 0) {
                $resort_type_clause = "";
                $sort_by_clause = "";
            } else if ($sort_by == 1) {
                $date = new DateTime('now');
                date_sub($date, date_interval_create_from_date_string('7 days'));
                $resort_type_clause = "";
                $sort_by_clause = " AND resort.created_date > '" . $date->format('Y-m-d') . "' ";
            } else if ($sort_by == 2) {
                $resort_type_clause = "";
                $date = new DateTime('now');
                $sort_by_clause = " AND resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
            }
        } else if ($resort_type == 1) {
            if ($sort_by == 0) {
                $resort_type_clause = " AND resort.id_resort_type = 1 ";
                $sort_by_clause = "";
            } else if ($sort_by == 1) {
                $date = new DateTime('now');
                date_sub($date, date_interval_create_from_date_string('7 days'));
                $resort_type_clause = " AND resort.id_resort_type = 1 ";
                $sort_by_clause = " AND resort.created_date > '" . $date->format('Y-m-d') . "' ";
            } else if ($sort_by == 2) {
                $resort_type_clause = " AND resort.id_resort_type = 1 ";
                $date = new DateTime('now');
                $sort_by_clause = " AND resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
            }
        } else if ($resort_type == 2) {
            if ($sort_by == 0) {
                $resort_type_clause = " AND resort.id_resort_type = 2 ";
                $sort_by_clause = "";
            } else if ($sort_by == 1) {
                $date = new DateTime('now');
                date_sub($date, date_interval_create_from_date_string('7 days'));
                $resort_type_clause = " AND resort.id_resort_type = 2 ";
                $sort_by_clause = " AND resort.created_date > '" . $date->format('Y-m-d') . "' ";
            } else if ($sort_by == 2) {
                $resort_type_clause = " AND resort.id_resort_type = 2 ";
                $date = new DateTime('now');
                $sort_by_clause = " AND resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
            }
        }

        if (!isset($this->params[0])) {
            $regions = array(array());
            $listContinents = $this->control->getListContinents();
            $listCoutinentsNumber = array();
            $listRegionNumber = array(array());
            foreach ($listContinents as $key => $continent) {
                $regions[$key] = $this->control->getListRegions($continent['id']);
                $listCoutinentsNumber[$key] = $this->control->getNumberResortByCountinent($continent['id'], $resort_type_clause, $sort_by_clause);
                foreach ($regions[$continent['id'] - 1] as $key2 => $region) {
                    $listRegionNumber[$key][$key2] = $this->control->getNumberResortById($region['id'], $resort_type_clause, $sort_by_clause);
                }
            }
            $listResort = $this->control->getAllResort($resort_type_clause, $sort_by_clause);
        } else {
            $id = $this->params[0];
            if (!isset($this->params[1])) {
                $country_name = $this->control->getLongNameCountry($id);
                $listCity = $this->control->getListCityByIdCountry($id);
                $address = $country_name;
                $countryNumber = $this->control->getNumberResortById($id, $resort_type_clause, $sort_by_clause);
                $listCityNumber = array();
                foreach ($listCity as $key => $city) {
                    $listCityNumber[$key] = $this->control->getNumberResortByIdCity($city['id'], $resort_type_clause, $sort_by_clause);
                }
                $listResort = $this->control->getResortByCountryName($id, $resort_type_clause, $sort_by_clause);
            } else {
                $id_city = $this->params[1];
                $city = $this->control->getCityById($id_city);
                $name_city = $city['name'];
                $cityNumber = $this->control->getNumberResortByIdCity($id_city, $resort_type_clause, $sort_by_clause);
                $listResort = $this->control->getAllResortByIdCity($id_city, $resort_type_clause, $sort_by_clause);
                $address = $name_city;
            }
            $url = 'http://maps.google.com/maps/api/geocode/json?address=' . urlencode($address);
            $output = $this->control->httpGet($url);
            $data = json_decode($output, true);
            $geometry = $data['results'][0]['geometry']['location'];
            $lat = $geometry['lat'];
            $lng = $geometry['lng'];
        }
        require_once("view/ResortDirectoryView.php");

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
        try {
            $list_deals = $this->control->getListDeals();
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            require_once("view/UuDaiDacBiet.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
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
        try {
            $id_deals = $this->params[0];
            if (!is_numeric($id_deals)) {
                header('location:' . BASE_URL . $this->lang . "/controller/loadingErrorPage");
            }
            settype($id_deals, "int");
            $deals = $this->control->getDetailDeals($id_deals);
            $list_deals = $this->control->getListDeals();
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            require_once("view/DetailDeals.php");
        } catch (Exception $ex) {
            require_once("view/ErrorPage.php");
        }
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
        try {
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            require_once("view/KetNoiPPC.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function getDetailConnect()
    {
        try {
            $id_deals = $this->params[0];
            if (!is_numeric($id_deals)) {
                header('location:' . BASE_URL . $this->lang . "/controller/loadingErrorPage");
            }
            settype($id_deals, "int");
            $deals = $this->control->getDetailConnect($id_deals);
            $list_deals = $this->control->getListDeals();
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            require_once("view/DetailConnect.php");
        } catch (Exception $ex) {
            require_once("view/ErrorPage.php");
        }
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
        try {
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            require_once("view/ThongBaoBaoChi.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }


    public function loadingDetailsResort()
    {
        try {
            $id = $this->params[0];
            if (!is_numeric($id)) {
                header('location:' . BASE_URL . $this->lang . "/controller/loadingErrorPage");
            }
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            $exchange_rates = $this->control->getExchangeRates()['value'];
            $resort = $this->control->getDetailsResort($id);
            if($resort == null)
                header('location:' . BASE_URL . $this->lang . "/controller/loadingErrorPage");
            $listImageResort = $this->control->getListImageResort($id);
            $lat = $resort['lat'];
            $lng = $resort['lng'];

            require_once("view/DetailsResort.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function loadingOwingATimeShare()
    {
        try {
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            $data = $this->control->getOwingATimeShare();
            require_once("view/KhachChuaSoHuu.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function loadingBenefitTimeShare()
    {
        try {
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            $data = $this->control->getBenefitTimeShare();
            require_once("view/LoiIchTimeShare.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function updateContinent()
    {
        $listCountry = $this->control->laydanhsach("country");
        foreach ($listCountry as $country) {
            $name = $this->control->countrytocontinent($country['sort_name']);
            $id = $this->control->getIdContinents($name);
            $idCountry = $country['id'];
            $this->control->setIdContinents($idCountry, $id);
        }

    }

    public function getNumberResort()
    {
        $isWorld = isset($this->params[0]);
        if (isset($_POST["resort_type"]))
            $resort_type = $_POST["resort_type"];
        if (isset($_POST["sort_by"]))
            $sort_by = $_POST["sort_by"];
        if ($resort_type == 0) {
            if ($sort_by == 0) {
                $resort_type_clause = "";
                $sort_by_clause = "";
            } else if ($sort_by == 1) {
                $date = new DateTime('now');
                date_sub($date, date_interval_create_from_date_string('7 days'));
                $resort_type_clause = "";
                if (!$isWorld)
                    $sort_by_clause = " resort.created_date >= '" . $date->format('Y-m-d') . "' ";
                else
                    $sort_by_clause = " AND resort.created_date >= '" . $date->format('Y-m-d') . "' ";
            } else if ($sort_by == 2) {
                $resort_type_clause = "";
                $date = new DateTime('now');
                $sort_by_clause = " resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
            }
        } else if ($resort_type == 1) {
            if ($sort_by == 0) {
                if (!$isWorld)
                    $resort_type_clause = " resort.id_resort_type = 1 ";
                else
                    $resort_type_clause = " AND resort.id_resort_type = 1 ";
                $sort_by_clause = "";
            } else if ($sort_by == 1) {
                $date = new DateTime('now');
                date_sub($date, date_interval_create_from_date_string('7 days'));
                if (!$isWorld)
                    $resort_type_clause = " resort.id_resort_type = 1 ";
                else
                    $resort_type_clause = " AND resort.id_resort_type = 1 ";
                $sort_by_clause = " AND resort.created_date > '" . $date->format('Y-m-d') . "' ";
            } else if ($sort_by == 2) {
                if (!$isWorld)
                    $resort_type_clause = " resort.id_resort_type = 1 ";
                else
                    $resort_type_clause = " AND resort.id_resort_type = 1 ";
                $date = new DateTime('now');
                $sort_by_clause = " AND resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
            }
        } else if ($resort_type == 2) {
            if ($sort_by == 0) {
                if (!$isWorld)
                    $resort_type_clause = " resort.id_resort_type = 2 ";
                else
                    $resort_type_clause = " AND resort.id_resort_type = 2 ";
                $sort_by_clause = "";
            } else if ($sort_by == 1) {
                $date = new DateTime('now');
                date_sub($date, date_interval_create_from_date_string('7 days'));
                if (!$isWorld)
                    $resort_type_clause = " resort.id_resort_type = 2";
                else
                    $resort_type_clause = " AND resort.id_resort_type = 2 ";
                $sort_by_clause = " AND resort.created_date > '" . $date->format('Y-m-d') . "' ";
            } else if ($sort_by == 2) {
                if (!$isWorld)
                    $resort_type_clause = " resort.id_resort_type = 2 ";
                else
                    $resort_type_clause = " AND resort.id_resort_type = 2 ";
                $date = new DateTime('now');
                $sort_by_clause = " AND resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
            }
        }
        if (!$isWorld) {
            $total = array("total" => 0);
            $pages = $this->control->getNumberResort($resort_type_clause, $sort_by_clause) / 4;
            $total = array("total" => 0);
            $tmp = explode(".", $pages);
            if (count($tmp) > 1) {
                $pages = $tmp[0] + 1;
            } else {
                $pages = $tmp[0];
            }
            $total["total"] = $pages;
            echo json_encode($total);
        } else {
            $id = $this->params[0];
            $total = array("total" => 0);
            if (!isset($this->params[1]))
                $pages = $this->control->getNumberResortById($id, $resort_type_clause, $sort_by_clause) / 4;
            else {
                $id = $this->params[1];
                $pages = $this->control->getNumberResortByIdCity($id, $resort_type_clause, $sort_by_clause) / 4;
            }
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
    }


    public function getAllResort()
    {
        $resort_type = 0;
        $sort_by = 0;
        $listContinents = "";
        if (isset($_POST["resort_type"]))
            $resort_type = $_POST["resort_type"];
        if (isset($_POST["sort_by"]))
            $sort_by = $_POST["sort_by"];
        if ($resort_type == 0) {
            if ($sort_by == 0) {
                $resort_type_clause = "";
                $sort_by_clause = "";
            } else if ($sort_by == 1) {
                $date = new DateTime('now');
                date_sub($date, date_interval_create_from_date_string('7 days'));
                $resort_type_clause = "";
                $sort_by_clause = " AND resort.created_date > '" . $date->format('Y-m-d') . "' ";
            } else if ($sort_by == 2) {
                $resort_type_clause = "";
                $date = new DateTime('now');
                $sort_by_clause = " AND resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
            }
        } else if ($resort_type == 1) {
            if ($sort_by == 0) {
                $resort_type_clause = " AND resort.id_resort_type = 1 ";
                $sort_by_clause = "";
            } else if ($sort_by == 1) {
                $date = new DateTime('now');
                date_sub($date, date_interval_create_from_date_string('7 days'));
                $resort_type_clause = " AND resort.id_resort_type = 1 ";
                $sort_by_clause = " AND resort.created_date > '" . $date->format('Y-m-d') . "' ";
            } else if ($sort_by == 2) {
                $resort_type_clause = " AND resort.id_resort_type = 1 ";
                $date = new DateTime('now');
                $sort_by_clause = " AND resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
            }
        } else if ($resort_type == 2) {
            if ($sort_by == 0) {
                $resort_type_clause = " AND resort.id_resort_type = 2 ";
                $sort_by_clause = "";
            } else if ($sort_by == 1) {
                $date = new DateTime('now');
                date_sub($date, date_interval_create_from_date_string('7 days'));
                $resort_type_clause = " AND resort.id_resort_type = 2 ";
                $sort_by_clause = " AND resort.created_date > '" . $date->format('Y-m-d') . "' ";
            } else if ($sort_by == 2) {
                $resort_type_clause = " AND resort.id_resort_type = 2 ";
                $date = new DateTime('now');
                $sort_by_clause = " AND resort.id IN (SELECT details_deal_resort.id_resort FROM `details_deal_resort` WHERE start_date <= '" . $date->format('Y-m-d') . "' AND end_date >= '" . $date->format('Y-m-d') . "')";
            }
        }
        $isWorld = isset($this->params[0]);
        if (!$isWorld) {
            $items = 4;
            $currentPage = (int)$_POST["currentPage"];
            $offset = ($currentPage - 1) * $items;
            $danh_sach_resort = $this->control->getAllResortPage($offset, $items, $resort_type_clause, $sort_by_clause);
            echo json_encode($danh_sach_resort);
        } else {
            $id = $this->params[0];
            $items = 4;
            $currentPage = (int)$_POST["currentPage"];
            $offset = ($currentPage - 1) * $items;
            if (!isset($this->params[1]))
                $danh_sach_resort = $this->control->getAllResortPageById($id, $offset, $items, $resort_type_clause, $sort_by_clause);
            else {
                $id = $this->params[1];
                $danh_sach_resort = $this->control->getAllResortPageByIdCity($id, $offset, $items, $resort_type_clause, $sort_by_clause);
            }
            echo json_encode($danh_sach_resort);
        }
    }

    public function getNumberResortSortByPriority()
    {
        $resort_type = 0;
        $sort_by = 0;
        $listContinents = "";

        $total = array("total" => 0);
        $pages = $this->control->getNumberResort("", "") / 9;
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

    public function getNumberResortSortByHint()
    {
        $lat = $this->params[0];
        $lng = $this->params[1];
        $resort_type = 0;
        $sort_by = 0;
        $listContinents = "";

        $total = array("total" => 0);
        $pages = $this->control->getNumberHint($lat, $lng, 1000) / 9;
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

    public function getAllResortSortByPriority()
    {
        $items = 9;
        $currentPage = (int)$_POST["currentPage"];
        $offset = ($currentPage - 1) * $items;
        $danh_sach_resort = $this->control->getAllResortPageSortByPriority($offset, $items);
        echo json_encode($danh_sach_resort);
    }

    public function loadingDiscoverPage()
    {
        try {
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            require_once("view/KhamPha.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function loadingResortNewPage()
    {
        try {
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            require_once("view/CoGiMoiPPC.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function loadingResortHintPage()
    {
        try {
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            require_once("view/GoiYKyNghi.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }


    public function getAllResortSortByDate()
    {
        $items = 9;
        $currentPage = (int)$_POST["currentPage"];
        $offset = ($currentPage - 1) * $items;
        $danh_sach_resort = $this->control->getAllResortPageSortByDate($offset, $items);
        echo json_encode($danh_sach_resort);
    }

    public function getAllResortSortByHint()
    {
        $lat = $this->params[0];
        $lng = $this->params[1];
        $items = 9;
        $currentPage = (int)$_POST["currentPage"];
        $offset = ($currentPage - 1) * $items;
        $danh_sach_resort = $this->control->getAllResortSortByHint($offset, $items, $lat, $lng, 1000);
        echo json_encode($danh_sach_resort);
    }

    public function changePassword()
    {
        try {
            if (isset($this->params[0])) {
                $password_key = $this->params[0];
                if ($password_key != "") {
                    $user = $this->control->checkPasswordKey($password_key);
                    if ($user != "") {
                        $id_user = $user['id'];
                        $dssbanner = $this->control->laydanhsach("banner");
                        $dssliderw = $this->control->laydanhsachslider();
                        $dsKhuNghiDuongBanner = array();
                        foreach ($dssbanner as $banner) {
                            $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                            $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
                        }
                        require_once("view/ChangeNewPassword.php");
                    } else
                        header('location:' . BASE_URL . $this->lang . "/controller/index");
                } else
                    header('location:' . BASE_URL . $this->lang . "/controller/index");
            }
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function updatePassword()
    {
        try {
            if (isset($this->params[0])) {
                $id_user = $this->params[0];
                $password = $_POST['new_password'];
                if ($this->control->updatePassword($id_user, $password)) {
                    $this->control->updatePasswordKey("", $id_user);
                    header('location:' . BASE_URL . $this->lang . "/controller/index");
                }
            }
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function getListDiscount()
    {
        $id_user = $_POST['id'];
        $list_discount = $this->control->getListDiscount($id_user);
        echo json_encode($list_discount);
    }

    public function getTransactionHistory()
    {
        try {
            $listTransactionHistory = $this->control->getTransactionHistory($_SESSION['id']);
            $dssbanner = $this->control->laydanhsach("banner");
            $dssliderw = $this->control->laydanhsachslider();
            $dsKhuNghiDuongBanner = array();
            foreach ($dssbanner as $banner) {
                $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
            }
            require_once("view/TransactionHistory.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function detailTransaction()
    {
        try {
            if (isset($this->params[0])) {
                $id_book = $this->params[0];
                $dssbanner = $this->control->laydanhsach("banner");
                $dssliderw = $this->control->laydanhsachslider();
                $dsKhuNghiDuongBanner = array();
                foreach ($dssbanner as $banner) {
                    $khuNghiDuongBanner = $this->control->getDetailsResortWithOneImage($banner['idkhunghiduong']);
                    $dsKhuNghiDuongBanner[] = $khuNghiDuongBanner;
                }
                $is_voucher = false;
                $id_voucher = $this->control->getDetailTransaction($id_book)['voucher_id'];
                if ($id_voucher != NULL)
                    $is_voucher = true;
                $transaction = $this->control->getDetailTransactionByIdBook($id_book, $is_voucher);
                require_once("view/TransactionDetail.php");
            } else
                $this->getTransactionHistory();
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

    public function getProFile()
    {
        try {
            $id_account = $_POST['id'];
            if (!is_numeric($id_account)) {
                header('location:' . BASE_URL . $this->lang . "/controller/loadingErrorPage");
            }
            $my_profile = $this->control->getProFileByIdAccount($id_account);
            $list_discount = $this->control->getListDiscount($id_account);
            $exchange_rate = $this->control->getExchangeRates()['value'];
            require_once("view/modalxemthongtincanhanview.php");
        } catch (Exception $ex) {
            require_once "view/ErrorPage.php";
        }
    }

}//class
