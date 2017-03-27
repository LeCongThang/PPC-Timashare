<?php

class model
{

    public $db;
    const STATUS_ACTIVE = 1;
    const STATUS_NEW = 0;
    const STATUS_CANCEL = -1;

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
            die("Error in laydanhsach");
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
        $sql = "SELECT slider.image_slider, slider.duongdan_slider, slider_ngonngu.noidung_slider, slider_ngonngu.tieude_slider, slider_ngonngu.mota_slider FROM slider,slider_ngonngu WHERE slider.id_slider = slider_ngonngu.id_slider AND slider_ngonngu.ngon_ngu = '" . $_SESSION['lang'] . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in laydanhsachslider");
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
        $sql = "SELECT gioithieu.id, gioithieu.img_tieude, gioithieu_ngonngu.tieu_de, gioithieu_ngonngu.noidung_gioithieu  FROM gioithieu,gioithieu_ngonngu WHERE gioithieu.id = gioithieu_ngonngu.id_gioithieu AND gioithieu_ngonngu.ngonngu = '" . $_SESSION['lang'] . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in laygioithieu");
        }
        return mysqli_fetch_assoc($result);
    }

    public function layDanhSachCauHoiThuongGap()
    {
        $sql = "SELECT cauhoithuonggap.id, cauhoithuonggap_ngonngu.cauhoi, cauhoithuonggap_ngonngu.cautraloi FROM cauhoithuonggap, cauhoithuonggap_ngonngu WHERE cauhoithuonggap.id = cauhoithuonggap_ngonngu.id_cauhoithuonggap AND cauhoithuonggap_ngonngu.ngonngu = '" . $_SESSION['lang'] . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in layDanhSachCauHoiThuongGap");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function layChiTietTheoNgonNgu($idslider)
    {
        $sql = "SELECT * FROM slider_ngonngu WHERE id_slider=" . $idslider . " AND ngon_ngu ='" . $_SESSION['lang'] . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in layChiTietTheoNgonNgu");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function laydulieu($bang)
    {
        $sql = "SELECT * FROM " . $bang;
        $result = mysqli_query($this->db, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function layThongTinChiTietKhuNghiDuong($id)
    {
        $sql = "SELECT * FROM khunghiduong_" . $_SESSION['lang'] . " WHERE id =" . $id;
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

        $sql = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' and id_vaitro = 1";

        if (!$kq = $this->db->query($sql))
            die($this->db->error);


        if ($kq->num_rows == 0)
            return false;
        $row = $kq->fetch_assoc();
        return password_verify($matkhau, $row['password']);
    }// xulydangnhap

    public function themTaiKhoan($tendangnhap, $matkhau, $hoten, $diachi, $dienthoai, $loaithaikhoan)
    {
        $sql = "insert into taikhoan values ('" . $tendangnhap . "','" . password_hash($matkhau, PASSWORD_DEFAULT) . "'," . $loaithaikhoan . ",'" . $hoten . "','" . $diachi . "','" . $dienthoai . "')";
        return mysqli_query($this->db, $sql);
    }

    public function themLienHe($ten, $dienthoai, $email, $tinnhan)
    {
        $sql = "insert into lienhe(ten_lienhe,sdt_lienhe,email_lienhe,conten_lienhe,trangthai) values ('" . $ten . "','" . $dienthoai . "','" . $email . "','" . $tinnhan . "',0)";
        return mysqli_query($this->db, $sql);
    }

    public function bookNow($id_user, $id_resort, $date_start, $date_end, $room, $adults, $childs, $note, $id_voucher)
    {
        $resort_price = $this->getDetailsResort($id_resort)['price'];
        $exchange_rate = $this->getExchangeRates()['value'];
        if ($id_voucher != 0)
            $value_voucher = $this->getVoucherById($id_voucher)['cost'];
        else
            $value_voucher = 0;
        $datetime1 = strtotime($date_start);
        $datetime2 = strtotime($date_end);
        $secs = $datetime2 - $datetime1;// == <seconds between the two times>
        $days = $secs / 86400;
        $total_price = ($resort_price * $room * $days) - $value_voucher;
        $created_date = date("Y/m/d");
        if ($id_voucher != 0)
            $sql = "insert into book_now(id_user,id_resort,note,start_date, end_date, adults, childs, room, status, created_at, voucher_id, updated_at, exchange_rate, total_price, resort_price, discount) values ({$id_user},{$id_resort},'{$note}','{$date_start}','{$date_end}',{$adults},{$childs},{$room},0,'{$created_date}',{$id_voucher},'{$created_date}',{$exchange_rate},{$total_price},{$resort_price},{$value_voucher})";
        else
            $sql = "insert into book_now(id_user,id_resort,note,start_date, end_date, adults, childs, room, status, created_at, updated_at, exchange_rate, total_price, resort_price) values ({$id_user},{$id_resort},'{$note}','{$date_start}','{$date_end}',{$adults},{$childs},{$room},0,'{$created_date}','{$created_date}',{$exchange_rate},{$total_price},{$resort_price})";
        return mysqli_query($this->db, $sql);
    }


    public function xemthongtincanhan($tendangnhap)
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '" . $tendangnhap . "'";
        if (!$kq = $this->db->query($sql)) die($this->db->error);
        if (!$kq) return FALSE;
        return $kq->fetch_assoc();

    }


    public function doimatkhau($tendangnhap, $matkhaucu, $matkhaumoi)
    {
        if ($this->xulydangnhap($tendangnhap, $matkhaucu)) {
            $sql = "UPDATE taikhoan SET password='" . password_hash($matkhaumoi, PASSWORD_DEFAULT) . "' WHERE tendangnhap = '" . $tendangnhap . "'";
            return mysqli_query($this->db, $sql);
        } else
            return false;
    }

    public function doiquenmatkhau($tendangnhap, $matkhaumoi)
    {
        $sql = "UPDATE taikhoan SET password='" . password_hash($matkhaumoi, PASSWORD_DEFAULT) . "' WHERE tendangnhap = '" . $tendangnhap . "'";
        return mysqli_query($this->db, $sql);

    }

    public function capnhatthongtintk($tendangnhap, $hoten, $diachi, $sodienthoai)
    {
        $sql = "UPDATE taikhoan SET hoten='" . $hoten . "', diachi='" . $diachi . "', dienthoai='" . $sodienthoai . "' WHERE tendangnhap = '" . $tendangnhap . "'";
        return mysqli_query($this->db, $sql);
    }

    public function ktIdVaSoDienThoai($tendangnhap, $sodienthoai)
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '" . $tendangnhap . "' AND dienthoai ='" . $sodienthoai . "'";
        if (!$kq = $this->db->query($sql))
            die($this->db->error);

        if ($kq->num_rows == 0)
            return false;
        return true;
    }

    public function layDuLieuThamGia()
    {
        $sql = "SELECT thamgia.hinh_anh, thamgia.link_hinh_1, thamgia.link_hinh_2, thamgia.link_hinh_3, thamgia.link_hinh_4, thamgia.link_hinh_5, thamgia_ngonngu.label_hinh_1, thamgia_ngonngu.label_hinh_2, thamgia_ngonngu.label_hinh_3, thamgia_ngonngu.label_hinh_4, thamgia_ngonngu.label_hinh_5 FROM thamgia, thamgia_ngonngu WHERE thamgia.id = thamgia_ngonngu.id_thamgia AND thamgia_ngonngu.ngonngu ='" . $_SESSION['lang'] . "'";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function laySoLuongVideo()
    {
        $sql = "select count(id_video) as total from video";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function layDanhSachVideo($offset, $items)
    {
        $sql = "SELECT * FROM video ORDER BY id_video ASC LIMIT " . $offset . "," . $items;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in layDanhSachVideo");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getListDeals()
    {
        $sql = "SELECT deals.id, deals.image, deals_language.title, deals_language.content FROM deals, deals_language WHERE deals.id = deals_language.id_deals AND deals_language.language ='" . $_SESSION['lang'] . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getListDeals");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getListDealsPage($offset, $items)
    {
        $sql = "SELECT deals.id, deals.image, deals_language.title, deals_language.content FROM deals, deals_language WHERE deals.id = deals_language.id_deals AND deals_language.language ='" . $_SESSION['lang'] . "' ORDER BY id ASC LIMIT " . $offset . "," . $items;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getListDealsPage");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getNumberDeals()
    {
        $sql = "select count(id) as total from deals";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function getDetailDeals($id)
    {
        $sql = "SELECT deals.id, deals.image, deals_language.title, deals_language.content FROM deals, deals_language WHERE deals.id = deals_language.id_deals AND deals_language.language ='" . $_SESSION['lang'] . "' AND deals.id = " . $id;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getDetailDeals");
        }
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getNumberConnect()
    {
        $sql = "select count(id) as total from connect_ppc";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function getListConnect($offset, $items)
    {
        $sql = "SELECT connect_ppc.id, connect_ppc.image, connect_ppc.date, connect_ppc_language.title, connect_ppc_language.content FROM connect_ppc, connect_ppc_language WHERE connect_ppc.id = connect_ppc_language.id_connect_ppc AND connect_ppc_language.language ='" . $_SESSION['lang'] . "' ORDER BY id ASC LIMIT " . $offset . "," . $items;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getListConnect");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getDetailConnect($id)
    {
        $sql = "SELECT connect_ppc.id, connect_ppc.image, connect_ppc.date, connect_ppc_language.title, connect_ppc_language.content FROM connect_ppc, connect_ppc_language WHERE connect_ppc.id = connect_ppc_language.id_connect_ppc AND connect_ppc_language.language ='" . $_SESSION['lang'] . "' AND connect_ppc.id = " . $id;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getDetailConnect");
        }
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getNumberAnncounce()
    {
        $sql = "select count(id) as total from announce_papers";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function getListAnnounce($offset, $items)
    {
        $sql = "SELECT announce_papers.id, announce_papers.link, announce_papers.image, announce_papers.date, announce_papers_language.title, announce_papers_language.content FROM announce_papers, announce_papers_language WHERE announce_papers.id = announce_papers_language.id_announce_papers AND announce_papers_language.language ='" . $_SESSION['lang'] . "' ORDER BY id ASC LIMIT " . $offset . "," . $items;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getListAnnounce");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getDetailsResort($id)
    {
        $sql = "SELECT resort.price, resort.lat, resort.lng, resort_language.name, resort.id, resort_language.address, resort_language.introduce, resort_language.location, resort_language.service, resort_language.equipment FROM resort, resort_language WHERE resort.id = resort_language.id_resort AND resort_language.language ='" . $_SESSION['lang'] . "' AND resort.id = " . $id . " AND resort.status = 0";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getDetailsResort");
        }
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getDetailsResortWithOneImage($id)
    {
        $sql = "SELECT * FROM resort, resort_image, resort_language WHERE resort.id = resort_image.id_resort AND resort_language.id_resort = resort.id AND resort.status = 0 AND resort_language.language = '" . $_SESSION['lang'] . "' " . " AND resort.id = {$id} LIMIT 1";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getDetailsResortWithOneImage");
        }
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getListImageResort($id)
    {
        $sql = "SELECT * FROM resort_image WHERE id_resort=" . $id;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getListImageResort");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function httpGet($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //  curl_setopt($ch,CURLOPT_HEADER, false);

        $output = curl_exec($ch);

        curl_close($ch);
        return $output;
    }

    public function getOwingATimeShare()
    {
        $sql = "SELECT * FROM owning_a_timeshare WHERE language ='" . $_SESSION['lang'] . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getOwingATimeShare");
        }
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getBenefitTimeShare()
    {
        $sql = "SELECT * FROM benefit_timeshare WHERE language ='" . $_SESSION['lang'] . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getBenefitTimeShare");
        }
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getListContinents()
    {
        $sql = "SELECT * FROM continents";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getListContinents");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getListRegions($id)
    {
        $sql = "SELECT * FROM country WHERE id_continents =" . $id;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getListRegions");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function countrytocontinent($country)
    {
        $continent = '';
        switch ($country) {
            case 'DE':
            case 'GG':
            case 'VA':
            case 'HU':
            case 'IS':
            case 'IE':
            case 'IM':
            case 'IT':
            case 'JE':
            case 'LV':
            case 'LI':
            case 'LT':
            case 'LU':
            case 'MK':
            case 'MT':
            case 'MD':
            case 'MC':
            case 'ME':
            case 'NL':
            case 'NO':
            case 'RO':
            case 'RU':
            case 'RS':
            case 'SK':
            case 'SI':
            case 'ES':
            case 'SJ':
            case 'SE':
            case 'CH':
            case 'UA':
            case 'GB':
            case 'GI':
            case 'GR':
            case 'AX':
            case 'AL':
            case 'AD':
            case 'AT':
            case 'BA':
            case 'BY':
            case 'BE':
            case 'BG':
            case 'CZ':
            case 'DK':
            case 'EE':
            case 'HR':
            case 'FI':
            case 'FR':
            case 'FO':
            case 'PL':
            case 'PT':
            case 'SM':
                $continent = 'Europe';
                break;
            case 'GH':
            case 'DZ':
            case 'AO':
            case 'BJ':
            case 'BW':
            case 'BF':
            case 'BI':
            case 'CM':
            case 'CV':
            case 'CF':
            case 'TD':
            case 'KM':
            case 'CD':
            case 'CG':
            case 'CI':
            case 'DJ':
            case 'EG':
            case 'GQ':
            case 'ER':
            case 'ET':
            case 'GA':
            case 'GM':
            case 'GN':
            case 'GW':
            case 'KE':
            case 'LS':
            case 'LR':
            case 'LY':
            case 'MG':
            case 'MW':
            case 'ML':
            case 'MR':
            case 'MU':
            case 'YT':
            case 'MA':
            case 'MZ':
            case 'NA':
            case 'NE':
            case 'NG':
            case 'RE':
            case 'RW':
            case 'SH':
            case 'ST':
            case 'SN':
            case 'SC':
            case 'SL':
            case 'SO':
            case 'ZA':
            case 'SD':
            case 'SZ':
            case 'TZ':
            case 'TG':
            case 'TN':
            case 'UG':
            case 'EH':
            case 'ZM':
            case 'ZW':

                $continent = 'Africa';

                break;

            case 'AF':
            case 'AM':
            case 'AZ':
            case 'BH':
            case 'BD':
            case 'BT':
            case 'IO':
            case 'BN':
            case 'KH':
            case 'CN':
            case 'CX':
            case 'CC':
            case 'CY':
            case 'GE':
            case 'HK':
            case 'IN':
            case 'ID':
            case 'IR':
            case 'IQ':
            case 'IL':
            case 'JP':
            case 'JO':
            case 'KZ':
            case 'KP':
            case 'KR':
            case 'KW':
            case 'KG':
            case 'LA':
            case 'LB':
            case 'MO':
            case 'MY':
            case 'MV':
            case 'MN':
            case 'MM':
            case 'NP':
            case 'OM':
            case 'PK':
            case 'PS':
            case 'PH':
            case 'QA':
            case 'SA':
            case 'SG':
            case 'LK':
            case 'SY':
            case 'TW':
            case 'TJ':
            case 'TH':
            case 'TL':
            case 'TR':
            case 'TM':
            case 'AE':
            case 'UZ':
            case 'VN':
            case 'YE':

                $continent = 'Asia';
                break;

            case 'AU':
            case 'AS':
            case 'CK':
            case 'FJ':
            case 'PF':
            case 'GU':
            case 'KI':
            case 'MH':
            case 'FM':
            case 'NR':
            case 'NC':
            case 'NZ':
            case 'NU':
            case 'NF':
            case 'MP':
            case 'PW':
            case 'PG':
            case 'PN':
            case 'WS':
            case 'SB':
            case 'TK':
            case 'TO':
            case 'TV':
            case 'UM':
            case 'VU':
            case 'WF':

                $continent = 'Oceania';
                break;

            case 'AQ':
            case 'BV':
            case 'TF':
            case 'HM':
            case 'GS':

                $continent = 'Antarctica';
                break;

            case 'AI':
            case 'AW':
            case 'AG':
            case 'BS':
            case 'BB':
            case 'BZ':
            case 'BM':
            case 'CA':
            case 'KY':
            case 'VG':
            case 'CR':
            case 'CU':
            case 'DM':
            case 'DO':
            case 'SV':
            case 'GL':
            case 'GD':
            case 'GP':
            case 'GT':
            case 'HT':
            case 'HN':
            case 'JM':
            case 'MQ':
            case 'MX':
            case 'MS':
            case 'NI':
            case 'PA':
            case 'PR':
            case 'BL':
            case 'KN':
            case 'LC':
            case 'MF':
            case 'PM':
            case 'VC':
            case 'AN':
            case 'TT':
            case 'TC':
            case 'US':
            case 'VI':
                $continent = 'North America';
                break;

            case 'AR':
            case 'BO':
            case 'CL':
            case 'CO':
            case 'BR':
            case 'EC':
            case 'FK':
            case 'GF':
            case 'GY':
            case 'PY':
            case 'PE':
            case 'SR':
            case 'UY':
            case 'VE':
                $continent = 'South America';
                break;
        }

        return $continent;
    }

    public function getIdContinents($name)
    {
        $sql = "SELECT * FROM continents WHERE name ='" . $name . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getIdContinents");
        }
        $row = $result->fetch_assoc();
        return $row['id'];
    }

    public function setIdContinents($idCountry, $idContinents)
    {
        $sql = "UPDATE country SET id_continents = " . $idContinents . " WHERE id=" . $idCountry;
        return mysqli_query($this->db, $sql);
    }

    public function getAllResort($resort_type_clause, $sort_by_clause)
    {
        $sql = "SELECT * FROM resort, resort_image, resort_language WHERE resort.id = resort_image.id_resort AND resort.status = 0 AND resort_language.id_resort = resort.id AND resort_language.language = '" . $_SESSION['lang'] . "' " . $resort_type_clause . $sort_by_clause . " GROUP BY resort.id";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in setIdContinents");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }


    public function getNumberResort($resort_type_clause, $sort_by_clause)
    {
        $sql = "select count(id) as total from resort WHERE  " . $resort_type_clause . $sort_by_clause. "";
        if ($resort_type_clause == "" && $sort_by_clause == "")
            $sql = $sql . " 1 AND resort.status = 0";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function getNumberHint($lat, $lng, $distance)
    {

        $sql = "select count(id) as total from resort WHERE calc_distance(" . $lat . "," . $lng . ", resort.lat, resort.lng) < " . $distance. " AND resort.status = 0" ;
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    // getNumber By Country
    public function getNumberResortByCountinent($idCountinent, $resort_type_clause, $sort_by_clause)
    {
        $sql = "SELECT COUNT(id) as total FROM resort WHERE resort.status = 0 AND id_city IN (SELECT city.id FROM city WHERE  city.id_country IN ( SELECT country.id FROM country WHERE country.id_continents = " . $idCountinent . " )) " . $resort_type_clause . $sort_by_clause . "";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getNumberResortByCountinent");
        }
        $row = $result->fetch_assoc();

        return $row['total'];
    }


    // getNumber By Country
    public function getNumberResortById($id, $resort_type_clause, $sort_by_clause)
    {
        $sql = "SELECT COUNT(id) as total FROM resort WHERE resort.status = 0 AND id_city IN (SELECT city.id FROM city WHERE city.id_country = " . $id . ") " . $resort_type_clause . $sort_by_clause . " ";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in getNumberResortById");
        }
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    // getNumber By IdCity
    public function getNumberResortByIdCity($id, $resort_type_clause, $sort_by_clause)
    {
        $sql = "SELECT COUNT(id) as total FROM resort  WHERE resort.status = 0 AND id_city = " . $id . " " . $resort_type_clause . $sort_by_clause . "";
        $result = $this->db->query($sql);
        if (!$result) {
            die("Error in query in getNumberResortByIdCity");
        }
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function getAllResortPage($offset, $items, $resort_type_clause, $sort_by_clause)
    {
        $sql = "SELECT * FROM resort, resort_image, resort_language WHERE resort.status = 0 AND resort.id = resort_image.id_resort AND resort_language.id_resort = resort.id AND resort_language.language = '" . $_SESSION['lang'] . "' " . $resort_type_clause . $sort_by_clause . " GROUP BY resort.id ORDER BY resort.id ASC LIMIT " . $offset . "," . $items;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die($sql);
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getAllResortPageById($id, $offset, $items, $resort_type_clause, $sort_by_clause)
    {
        $sql = "SELECT * FROM resort, resort_image, resort_language WHERE resort.status = 0 AND resort.id = resort_image.id_resort AND resort_language.id_resort = resort.id AND resort_language.language = '" . $_SESSION['lang'] . "' " . $resort_type_clause . $sort_by_clause . " AND id_city IN (SELECT city.id FROM city, country WHERE city.id_country = country.id AND country.id =" . $id . ") GROUP BY resort.id ORDER BY resort.id ASC LIMIT " . $offset . "," . $items;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die($sql);
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getAllResortPageByIdCity($id, $offset, $items, $resort_type_clause, $sort_by_clause)
    {
        $sql = "SELECT * FROM resort, resort_image, resort_language WHERE resort.status = 0 AND resort.id = resort_image.id_resort AND resort_language.id_resort = resort.id AND resort_language.language = '" . $_SESSION['lang'] . "' AND resort.id_city =" . $id . " " . $resort_type_clause . $sort_by_clause . " GROUP BY resort.id ORDER BY resort.id ASC LIMIT " . $offset . "," . $items;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die($sql);
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getLongNameCountry($id)
    {
        $sql = "SELECT * FROM country WHERE id = " . $id;
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['name'];
    }

    public function getResortByCountryName($id, $resort_type_clause, $sort_by_clause)
    {
        $sql = "SELECT * FROM resort, resort_image, resort_language WHERE resort.status = 0 AND resort.id = resort_image.id_resort AND resort_language.id_resort = resort.id AND resort_language.language = '" . $_SESSION['lang'] . "' " . $resort_type_clause . $sort_by_clause . " AND id_city IN (SELECT city.id FROM city, country WHERE city.id_country = country.id AND country.id = " . $id . ") GROUP BY resort.id";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die($sql);
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getAllResortPageSortByPriority($offset, $items)
    {
        $sql = "SELECT * FROM resort, resort_image, resort_language WHERE resort.status = 0 AND resort.id = resort_image.id_resort AND resort_language.id_resort = resort.id AND resort_language.language = '" . $_SESSION['lang'] . "' GROUP BY resort.id ORDER BY resort.priority DESC, resort.id ASC LIMIT " . $offset . "," . $items;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die($sql);
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getAllResortPageSortByDate($offset, $items)
    {
        $sql = "SELECT * FROM resort, resort_image, resort_language WHERE resort.status = 0 AND resort.id = resort_image.id_resort AND resort_language.id_resort = resort.id AND resort_language.language = '" . $_SESSION['lang'] . "' GROUP BY resort.id ORDER BY DATE(created_date) DESC, resort.id ASC LIMIT " . $offset . "," . $items;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die($sql);
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getAllResortSortByHint($offset, $items, $lat, $lng, $distance)
    {
        $sql = "SELECT * FROM resort, resort_image, resort_language WHERE resort.status = 0 AND resort.id = resort_image.id_resort AND resort_language.id_resort = resort.id AND resort_language.language = '" . $_SESSION['lang'] . "' AND calc_distance(" . $lat . "," . $lng . ", resort.lat, resort.lng) < " . $distance . " GROUP BY resort.id ORDER BY  resort.id ASC LIMIT " . $offset . "," . $items;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die($sql);
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getIdCityByIdCountry($id_country, $name_city)
    {
        $sql = "SELECT * FROM city WHERE id_country ='" . $id_country . "' AND name = '" . $name_city . "'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getIdCityByIdCountry");
        }

        return mysqli_fetch_assoc($result);
    }

    public function getListCityByIdCountry($id_country)
    {
        $sql = "SELECT * FROM city WHERE id_country ='" . $id_country . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die($sql);
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getCityById($id_city)
    {
        $sql = "SELECT * FROM city WHERE id ='" . $id_city . "'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getIdCityByIdCountry");
        }

        return mysqli_fetch_assoc($result);
    }

    public function getAllResortByIdCity($id, $resort_type_clause, $sort_by_clause)
    {
        $sql = "SELECT * FROM resort, resort_image, resort_language WHERE resort.status = 0 AND resort.id = resort_image.id_resort AND resort_language.id_resort = resort.id AND resort_language.language = '" . $_SESSION['lang'] . "' " . $resort_type_clause . $sort_by_clause . " AND resort.id_city = " . $id . " GROUP BY resort.id";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die($sql);
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap ='" . $email . "'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getIdUserByEmail");
        }

        return mysqli_fetch_assoc($result);
    }

    public function updatePasswordKey($password_key, $id_account)
    {
        $sql = "UPDATE taikhoan SET password_key ='" . $password_key . "' WHERE id =" . $id_account;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in updatePasswordKey");
        }
        return $result;
    }

    public function checkPasswordKey($password_key)
    {
        $sql = "SELECT * FROM taikhoan WHERE password_key ='" . $password_key . "'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getIdUserByEmail");
        }

        return mysqli_fetch_assoc($result);
    }

    public function updatePassword($id_user, $password)
    {
        $sql = "UPDATE taikhoan SET password ='" . password_hash($password, PASSWORD_DEFAULT) . "' WHERE id =" . $id_user;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in updatePasswordKey");
        } else {
            $this->updatePasswordKey("", $id_user);
        }
        return $result;
    }

    public function getExchangeRates()
    {
        $sql = "Select * FROM settings WHERE settings.key = 'exchange_rates'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getExchangeRates");
        }

        return mysqli_fetch_assoc($result);
    }

    public function getMoneyBonus()
    {
        $sql = "Select * FROM settings WHERE settings.key = 'register_discount'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getMoneyBonus");
        }

        return mysqli_fetch_assoc($result);
    }

    public function isHasEmail($email)
    {
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '{$email}'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in isHasEmail");
        }
        return mysqli_fetch_assoc($result);
    }

    public function isHasNumberPhone($numberPhone)
    {
        $sql = "SELECT * FROM taikhoan WHERE dienthoai = '{$numberPhone}'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in isHasNumberPhone");
        }
        return mysqli_fetch_assoc($result);
    }

    public function insertAccountUser($imageResgiter, $emailResgiter, $passwordResgiter, $nameResgiter, $addressResgiter, $numberPhoneResgiter, $sexResgiter)
    {
        $bonus_money = $this->getMoneyBonus()['value'];
        $passwordResgiter_password_hash = password_hash($passwordResgiter, PASSWORD_DEFAULT);
        if($imageResgiter != "NULL")
            $sql = "INSERT INTO taikhoan(tendangnhap,password,id_vaitro,hoten,diachi,dienthoai,sex,status,avatar) VALUES ('{$emailResgiter}','{$passwordResgiter_password_hash}',1,'{$nameResgiter}','{$addressResgiter}','{$numberPhoneResgiter}',$sexResgiter,0,'{$imageResgiter}')";
        else
            $sql = "INSERT INTO taikhoan(tendangnhap,password,id_vaitro,hoten,diachi,dienthoai,sex,status) VALUES ('{$emailResgiter}','{$passwordResgiter_password_hash}',1,'{$nameResgiter}','{$addressResgiter}','{$numberPhoneResgiter}',$sexResgiter,0)";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in insertAccountUser");
        }
        $last_id = mysqli_insert_id($this->db);
        $date_now = date("Y-m-d");
        $nameVoucher = "Voucher Resgiter";
        $cost = 3;
        $total = 1;
        $this->insertVoucher($nameVoucher, $cost, $date_now, $last_id, $total);
        return $result;
    }

    public function getListDiscount($id)
    {
        $sql = "SELECT * FROM voucher WHERE total > 0 AND id_user =" . $id;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die($sql);
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getVoucherById($id)
    {
        $sql = "SELECT * FROM voucher WHERE id =" . $id;
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in isHasNumberPhone");
        }
        return mysqli_fetch_assoc($result);
    }

    public function insertVoucher($name, $cost, $date, $id_account, $total)
    {
        $sql = "INSERT INTO voucher(name,cost,date,id_user, total) VALUES ('{$name}',{$cost},'{$date}',{$id_account},{$total})";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in insertVoucher");
        }
        return $result;
    }

    public function getNumberTotalVoucher($id_voucher)
    {
        $sql = "SELECT * FROM voucher WHERE id=" . $id_voucher;
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getNumberTotalVoucher");
        }
        return mysqli_fetch_assoc($result);
    }

    public function decreaseNumberVoucher($id_voucher)
    {
        $totalNumberVoucher = $this->getNumberTotalVoucher($id_voucher)['total'] - 1;
        $sql = "UPDATE voucher SET total = " . $totalNumberVoucher . " WHERE id=" . $id_voucher;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in insertVoucher");
        }
        return $result;
    }

    /**
     * @param $id_user
     */
    public function getTransactionHistory($id_user)
    {
        $sql = "SELECT book_now.created_at , book_now.id_book, book_now.exchange_rate, book_now.total_price, resort_language.name , resort_language.address FROM book_now,resort,resort_language WHERE book_now.id_resort = resort.id AND resort.id = resort_language.id_resort AND id_user =" . $id_user . " AND resort_language.language ='" . $_SESSION['lang'] . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in getTransactionHistory");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getDetailTransactionByIdBook($id_book,$is_voucher)
    {
        if ($is_voucher == false)
            $sql = "SELECT book_now.note, book_now.start_date,book_now.end_date,book_now.adults,book_now.childs,book_now.room,book_now.status ,book_now.created_at , book_now.id_book, book_now.exchange_rate, book_now.total_price, resort_language.name resort_name, resort_language.address FROM book_now,resort,resort_language WHERE  book_now.id_resort = resort.id AND resort.id = resort_language.id_resort AND book_now.id_book =" . $id_book . " AND resort_language.language ='{$_SESSION['lang']}'";
        else
            $sql = "SELECT book_now.note, book_now.start_date,book_now.end_date,book_now.adults,book_now.childs,book_now.room,book_now.status ,book_now.created_at , book_now.id_book, book_now.exchange_rate, book_now.total_price, resort_language.name resort_name, resort_language.address, voucher.name voucher_name, voucher.cost FROM book_now,resort,resort_language,voucher WHERE book_now.voucher_id = voucher.id AND book_now.id_resort = resort.id AND resort.id = resort_language.id_resort AND book_now.id_book =" . $id_book . " AND resort_language.language ='{$_SESSION['lang']}'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die($sql);
        }
        return mysqli_fetch_assoc($result);
    }

    public function getDetailTransaction($id_book)
    {
        $sql = "SELECT * FROM book_now WHERE id_book =" . $id_book;
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die($sql);
        }
        return mysqli_fetch_assoc($result);
    }

    public function getProFileByIdAccount($id_account)
    {
        $sql = "SELECT * FROM taikhoan WHERE id =" . $id_account;
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die($sql);
        }
        return mysqli_fetch_assoc($result);
    }

    public function UpdateAccountUser($imageUpdate,$nameUpdate, $addressUpdate, $numberPhoneUpdate, $sexUpdate)
    {
        $sql = "UPDATE taikhoan SET hoten = '{$nameUpdate}', diachi = '{$addressUpdate}', dienthoai ='{$numberPhoneUpdate}', sex = {$sexUpdate}";
        if($imageUpdate != "NULL")
            $sql.=" , avatar ='{$imageUpdate}' ";
        $sql.= " WHERE id =".$_SESSION['id'];
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in UpdateAccountUser");
        }
        return $result;
    }

    public function loadAbout($lang){
        $sql = "SELECT * FROM about WHERE about_language ='".$lang."'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die($sql);
        }
        return mysqli_fetch_assoc($result);
    }



}//class
