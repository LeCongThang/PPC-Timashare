<?php

class model
{

    public $db;

    public function __construct()
    {

        $this->db = new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);
        $this->db->set_charset("utf8");

    } //construct

    public function closeDatabase()
    {
        if ($this->db) {
            mysqli_close($this->db);
        }
    }

    public function laydanhsach($bang)
    {
        $sql = "SELECT * FROM " . $bang;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function laydanhsachslider()
    {
        $sql = "SELECT slider.image_slider, slider.duongdan_slider, slider_ngonngu.noidung_slider, slider_ngonngu.tieude_slider, slider_ngonngu.mota_slider FROM slider,slider_ngonngu WHERE slider.id_slider = slider_ngonngu.id_slider AND slider_ngonngu.ngon_ngu = '".$_SESSION['lang']."'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function laygioithieu()
    {
        $sql = "SELECT gioithieu.id, gioithieu.img_tieude, gioithieu_ngonngu.tieu_de, gioithieu_ngonngu.noidung_gioithieu  FROM gioithieu,gioithieu_ngonngu WHERE gioithieu.id = gioithieu_ngonngu.id_gioithieu AND gioithieu_ngonngu.ngonngu = '".$_SESSION['lang']."'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query");
        }
        return mysqli_fetch_assoc($result);
    }

    public function layDanhSachCauHoiThuongGap(){
        $sql = "SELECT cauhoithuonggap.id, cauhoithuonggap_ngonngu.cauhoi, cauhoithuonggap_ngonngu.cautraloi FROM cauhoithuonggap, cauhoithuonggap_ngonngu WHERE cauhoithuonggap.id = cauhoithuonggap_ngonngu.id_cauhoithuonggap AND cauhoithuonggap_ngonngu.ngonngu = '".$_SESSION['lang']."'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function layChiTietTheoNgonNgu($idslider){
        $sql = "SELECT * FROM slider_ngonngu WHERE id_slider=".$idslider." AND ngon_ngu ='".$_SESSION['lang']."'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in here");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function laydulieu($bang){
        $sql = "SELECT * FROM " . $bang;
        $result = mysqli_query($this->db, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function layThongTinChiTietKhuNghiDuong($id)
    {
        $sql = "SELECT * FROM khunghiduong_".$_SESSION['lang']." WHERE id =". $id;
        //echo $sql;
        if (!$kq = $this->db->query($sql)) die($this->db->error);
        if (!$kq) return FALSE;
        return $kq->fetch_assoc();
    }

    public function laymail()
    {
        $sql = "SELECT * FROM lienhe WHERE trangthai = 0";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        foreach ($kq as $row) {
            $data = $row;
        }
        return $data;
    }

    public function dakiemtramail($id)
    {
        $sql = "UPDATE 'lienhe' SET 'trangthai' = '1' WHERE 'id' = " . $id;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        return true;
    }

    public function xulydangnhap($tendangnhap, $matkhau)
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' and matkhau='" . md5($matkhau) . "' and id_vaitro = 1";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);


        if ($kq->num_rows == 0)
            return false;
        $row = $kq->fetch_assoc();
        $_SESSION["tentaikhoannguoidung"] = $row['hoten'];
        return true;
    }// xulydangnhap

    public function themTaiKhoan($tendangnhap, $matkhau, $hoten, $diachi, $dienthoai, $loaithaikhoan)
    {
        $sql = "insert into taikhoan values ('" . $tendangnhap . "','" . md5($matkhau) . "'," . $loaithaikhoan . ",'" . $hoten . "','" . $diachi . "','" . $dienthoai . "')";
        return mysqli_query($this->db, $sql);
    }

    public function themLienHe($ten, $dienthoai, $email, $tinnhan)
    {
        $sql = "insert into lienhe(ten_lienhe,sdt_lienhe,email_lienhe,conten_lienhe,trangthai) values ('" . $ten . "','" . $dienthoai . "','" . $email . "','" . $tinnhan . "',0)";
        return mysqli_query($this->db, $sql);
    }

    public function booknow($tendangnhap, $idsp, $thoigian, $ghichu)
    {
        $sql = "insert into book_now(tendangnhap,idkhunghiduong,thoigian,ghichu) values ('" . $tendangnhap . "'," . $idsp . ",'".$thoigian."','".$ghichu."')";
        //echo $sql;
        return mysqli_query($this->db, $sql);
    }

    public function readmor($idsp)
    {
        $sql = "SELECT * FROM khunghiduong_".$_SESSION['lang']." WHERE id =" . $idsp;
        return mysqli_query($this->db, $sql);
    }

    public function xemthongtincanhan($tendangnhap)
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '" . $tendangnhap . "'";
        if (!$kq = $this->db->query($sql)) die($this->db->error);
        if (!$kq) return FALSE;
        return $kq->fetch_assoc();

    }

    public function kiemtrataikhoan($tendangnhap, $matkhau)
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' and matkhau='" . md5($matkhau) . "' and id_vaitro = 1";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);

        if ($kq->num_rows == 0)
            return false;
        return true;
    }// xulydangnhap

    public function doimatkhau($tendangnhap, $matkhaucu, $matkhaumoi)
    {
        if ($this->kiemtrataikhoan($tendangnhap, $matkhaucu)) {
            $sql = "UPDATE taikhoan SET matkhau='" . md5($matkhaumoi) . "' WHERE tendangnhap = '" . $tendangnhap . "'";
            return mysqli_query($this->db, $sql);
        }
        return false;
    }

    public function doiquenmatkhau($tendangnhap,$matkhaumoi)
    {
        $sql = "UPDATE taikhoan SET matkhau='" . md5($matkhaumoi) . "' WHERE tendangnhap = '" . $tendangnhap . "'";
        return mysqli_query($this->db, $sql);

    }

    public function capnhatthongtintk($tendangnhap, $hoten, $diachi, $sodienthoai)
    {
        $sql = "UPDATE taikhoan SET hoten='" . $hoten . "', diachi='" . $diachi . "', dienthoai='" . $sodienthoai . "' WHERE tendangnhap = '" . $tendangnhap . "'";
        return mysqli_query($this->db, $sql);
    }

    public function ktIdVaSoDienThoai($tendangnhap, $sodienthoai)
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '".$tendangnhap."' AND dienthoai ='".$sodienthoai."'";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);

        if ($kq->num_rows == 0)
            return false;
        return true;
    }

    public function themTaiKhoanDangKy($email, $sodienthoai){
        $sql = "insert into taikhoandangky(email_taikhoandk, sdt_taikhoandk, trangthai_taikhoandk) values ('" . $email . "','" . $sodienthoai . "',1)";
        return mysqli_query($this->db, $sql);
    }

    public function layDuLieuThamGia()
    {
        $sql = "SELECT thamgia.hinh_anh, thamgia.link_hinh_1, thamgia.link_hinh_2, thamgia.link_hinh_3, thamgia.link_hinh_4, thamgia.link_hinh_5, thamgia_ngonngu.label_hinh_1, thamgia_ngonngu.label_hinh_2, thamgia_ngonngu.label_hinh_3, thamgia_ngonngu.label_hinh_4, thamgia_ngonngu.label_hinh_5 FROM thamgia, thamgia_ngonngu WHERE thamgia.id = thamgia_ngonngu.id_thamgia AND thamgia_ngonngu.ngonngu ='" . $_SESSION['lang'] . "'";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }




}//class
