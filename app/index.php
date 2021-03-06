<?php
error_reporting(0);
$lang = 'en';
session_start();
require_once "config.php";
$url = $_SERVER['REQUEST_URI'];
$kq = tach_url($url, $lang, $cname, $action, $params);
//$kq = tach_url($url, $cname, $action, $params);

if (class_exists($cname, true) == true)
    $c = new $cname($action, $params, $lang);
else
    require_once("view/ErrorPage.php");
//if (class_exists($cname, true)==true)
//	$c = new $cname($action, $params);
//else
//    die('Khong co controller ' . $cname);

require "lang_$lang.php";
ob_start();

if (method_exists($c, $action))
    $c->$action();
else
    require_once("view/ErrorPage.php");
    //die('Khong co action' . $action);

$str = ob_get_clean();
$str = str_replace("{TrangChu}", TrangChu, $str);
$str = str_replace("{GioiThieu}", GioiThieu, $str);
$str = str_replace("{KhuNghiDuong}", KhuNghiDuong, $str);
$str = str_replace("{KhuNghiDuong2}", KhuNghiDuong2, $str);
$str = str_replace("{ThamGia}", ThamGia, $str);
$str = str_replace("{TroGiup}", TroGiup, $str);
$str = str_replace("{LienHe}", LienHe, $str);
$str = str_replace("{DangNhapDangKy}", DangNhapDangKy, $str);
$str = str_replace("{TimHieuThem}", TimHieuThem, $str);
$str = str_replace("{Ten}", Ten, $str);
$str = str_replace("{DienThoai}", DienThoai, $str);
$str = str_replace("{Email}", Email, $str);
$str = str_replace("{Gui}", Gui, $str);
$str = str_replace("{CauHoiThuongGap}", CauHoiThuongGap, $str);
$str = str_replace("{CachSuDung}", CachSuDung, $str);
$str = str_replace("{WhatIsTimeShare}", WhatIsTimeShare, $str);
$str = str_replace("{TitleWhatIsTimeShare1}", TitleWhatIsTimeShare1, $str);
$str = str_replace("{ContentWhatIsTimeShare1}", ContentWhatIsTimeShare1, $str);
$str = str_replace("{TitleWhatIsTimeShare2}", TitleWhatIsTimeShare2, $str);
$str = str_replace("{ContentWhatIsTimeShare2}", ContentWhatIsTimeShare2, $str);
$str = str_replace("{TitleActivitiesOfTimeShare}", TitleActivitiesOfTimeShare, $str);
$str = str_replace("{ContentActivitiesOfTimeShare}", ContentActivitiesOfTimeShare, $str);
$str = str_replace("{InternationalCorporation}", InternationalCorporation, $str);
$str = str_replace("{InternationalCorporation1}", InternationalCorporation1, $str);
$str = str_replace("{TTInternationalCorporation1}", TTInternationalCorporation1, $str);
$str = str_replace("{CTInternationalCorporation11}", CTInternationalCorporation11, $str);
$str = str_replace("{TTInternationalCorporation12}", TTInternationalCorporation12, $str);
$str = str_replace("{ExchangeEasier}", ExchangeEasier, $str);
$str = str_replace("{TTInternationalCorporation2}", TTInternationalCorporation2, $str);
$str = str_replace("{CTInternationalCorporation2}", CTInternationalCorporation2, $str);
$str = str_replace("{TTInternationalCorporation3}", TTInternationalCorporation3, $str);
$str = str_replace("{CTInternationalCorporation3}", CTInternationalCorporation3, $str);
$str = str_replace("{TTInternationalCorporation4}", TTInternationalCorporation4, $str);
$str = str_replace("{CTInternationalCorporation4}", CTInternationalCorporation4, $str);
$str = str_replace("{InternationalCorporation2}", InternationalCorporation2, $str);
$str = str_replace("{ContentInternationalCorporation2}", ContentInternationalCorporation2, $str);
$str = str_replace("{DangNhap}", DangNhap, $str);
$str = str_replace("{TenDangNhap}", TenDangNhap, $str);
$str = str_replace("{Password}", Password, $str);
$str = str_replace("{RememberPassword}", RememberPassword, $str);
$str = str_replace("{DontHaveAccount}", DontHaveAccount, $str);
$str = str_replace("{ForgotPassword}", ForgotPassword, $str);
$str = str_replace("{ForgotPasswordUpper}", ForgotPasswordUpper, $str);
$str = str_replace("{NutDangNhap}", NutDangNhap, $str);
$str = str_replace("{Thoat}", Thoat, $str);
$str = str_replace("{XinChao}", XinChao, $str);
$str = str_replace("{DoiMatKhau}", DoiMatKhau, $str);
$str = str_replace("{TTDoiMatKhau}", TTDoiMatKhau, $str);
$str = str_replace("{MatKhauCu}", MatKhauCu, $str);
$str = str_replace("{MatKhauMoi}", MatKhauMoi, $str);
$str = str_replace("{NhapLaiMatKhau}", NhapLaiMatKhau, $str);
$str = str_replace("{NutDoiMatKhau}", NutDoiMatKhau, $str);
$str = str_replace("{TTDangKy}", TTDangKy, $str);
$str = str_replace("{DiaChiEmail}", DiaChiEmail, $str);
$str = str_replace("{DienThoaiDK}", DienThoaiDK, $str);
$str = str_replace("{DangKy}", DangKy, $str);
$str = str_replace("{VideoCuaChungToi}", VideoCuaChungToi, $str);
$str = str_replace("{NhapLaiMatKhau}", NhapLaiMatKhau, $str);
$str = str_replace("{KhuNghiDuongGiaCa}", KhuNghiDuongGiaCa, $str);
$str = str_replace("{DanhMucKhuNghiDuong}", DanhMucKhuNghiDuong, $str);
$str = str_replace("{KhamPhaCacDiaDiem}", KhamPhaCacDiaDiem, $str);
$str = str_replace("{CoGiMoiTaiTimeShare}", CoGiMoiTaiTimeShare, $str);
$str = str_replace("{UuDaiDacBiet}", UuDaiDacBiet, $str);
$str = str_replace("{GoiYChoKyNghi}", GoiYChoKyNghi, $str);
$str = str_replace("{KetNoiVoi}", KetNoiVoi, $str);
$str = str_replace("{ThongCaoBaoChi}", ThongCaoBaoChi, $str);
$str = str_replace("{Vitri}", ViTri, $str);
$str = str_replace("{DichVuLuuTru}", DichVuLuuTru, $str);
$str = str_replace("{ThietBiVaDichVuLuuTru}", ThietBiVaDichVuLuuTru, $str);
$str = str_replace("{DatCho}", DatCho, $str);
$str = str_replace("{NoiDung}", NoiDung, $str);
$str = str_replace("{KhuVuc}", KhuVuc, $str);
$str = str_replace("{KhuNghiDuongVaGiaCa}", KhuNghiDuongVaGiaCa, $str);
$str = str_replace("{DanhMucKhuNghiDuong1}", DanhMucKhuNghiDuong1, $str);
$str = str_replace("{CoGiMoiTai}", CoGiMoiTai, $str);
$str = str_replace("{Loai}", Loai, $str);
$str = str_replace("{TatCa}", TatCa, $str);
$str = str_replace("{HomeShare}", HomeShare, $str);
$str = str_replace("{SapXepTheo}", SapXepTheo, $str);
$str = str_replace("{KhuyenMai}", KhuyenMai, $str);
$str = str_replace("{Moi}", Moi, $str);
$str = str_replace("{XemThongTinCaNhan}", XemThongTinCaNhan, $str);
$str = str_replace("{Gia}", Gia, $str);
$str = str_replace("{HinhDaiDien}", HinhDaiDien, $str);
$str = str_replace("{HoTenDK}", HoTenDK, $str);
$str = str_replace("{GioiTinhDK}", GioiTinhDK, $str);
$str = str_replace("{DiaChiDK}", DiaChiDK, $str);
$str = str_replace("{Nam}", Nam, $str);
$str = str_replace("{Nu}", Nu, $str);
$str = str_replace("{GioiTinh}", GioiTinh, $str);
$str = str_replace("{LichSuGiaoDich}", LichSuGiaoDich, $str);
$str = str_replace("{NgayNhanPhong}", NgayNhanPhong, $str);
$str = str_replace("{NgayTraPhong}", NgayTraPhong, $str);
$str = str_replace("{GhiChu}", GhiChu, $str);
$str = str_replace("{NguoiLon}", NguoiLon, $str);
$str = str_replace("{TreNho}", TreNho, $str);
$str = str_replace("{TheUuDai}", TheUuDai, $str);
$str = str_replace("{SoLuongPhong}", SoLuongPhong, $str);
$str = str_replace("{ThanhCong}", ThanhCong, $str);
$str = str_replace("{HuyBo}", HuyBo, $str);
$str = str_replace("{ChuaDuyet}", ChuaDuyet, $str);
$str = str_replace("{TrangThai}", TrangThai, $str);
$str = str_replace("{ThongTinCaNhan}", ThongTinCaNhan, $str);
$str = str_replace("{ThongTinDatCho}", ThongTinDatCho, $str);
echo $str;


function __autoload($class_name)
{
    $filename = "class/" . $class_name . ".php";
    if (file_exists($filename))
        require_once($filename);
}// autoload

function tach_url($url, &$lang, &$cname, &$action, &$params)
{
//function tach_url($url, &$cname, &$action, &$params){
    $arr = explode("/", $url);
    if (count($arr) <= 2)
        return FALSE;
    $lang = $arr[2];

    if($lang==""){
        $lang = 'en';
        $cname = DEFAULT_CONTROLLER;
        $action = DEFAULT_ACTION;
        $params = NULL;
        return TRUE;
    }

    if (in_array($lang, explode(',', NGONNGU)) == false)
        $lang = 'en';



    $cname = $arr[3];
    if ($cname == "") {
        $cname = DEFAULT_CONTROLLER;
        $action = DEFAULT_ACTION;
        $params = NULL;
        return TRUE;
    }

    $action = $arr[4];
    if ($action == "") {
        $action = DEFAULT_ACTION;
        $params = NULL;
        return TRUE;
    }

    array_shift($arr);
    array_shift($arr);
    array_shift($arr);
    array_shift($arr);
    array_shift($arr);

    $params = $arr;

    return TRUE;

}// tach_url