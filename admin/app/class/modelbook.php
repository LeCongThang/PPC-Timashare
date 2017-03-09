<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 12/20/2016
 * Time: 2:06 PM
 */
class modelbook
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

    public function getAllBooking()
    {
        $sql = "SELECT book_now.*,resort_language.name,taikhoan.hoten, taikhoan.diachi, taikhoan.dienthoai, taikhoan.sex, resort_language.address, resort.id_resort_type FROM book_now,resort,taikhoan,resort_language WHERE resort.id = resort_language.id_resort AND resort_language.language = 'vi' AND resort.id = book_now.id_resort AND taikhoan.id = book_now.id_user AND book_now.status = 0";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getAllBooking");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getAllBookingUpdated()
    {
        $sql = "SELECT book_now.*,resort_language.name,taikhoan.hoten, taikhoan.diachi, taikhoan.dienthoai, taikhoan.sex, resort_language.address, resort.id_resort_type FROM book_now,resort,taikhoan,resort_language WHERE resort.id = resort_language.id_resort AND resort_language.language = 'vi' AND resort.id = book_now.id_resort AND taikhoan.id = book_now.id_user AND book_now.id_book NOT IN (SELECT book_now.id_book FROM book_now WHERE book_now.status = 0)";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getAllBookingUpdated");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getDetailsBook($id)
    {
        if($this->isUsedVoucher($id))
            $sql = "SELECT voucher.id v, book_now.exchange_rate e,voucher.cost, book_now.status s , voucher.name n, book_now.*, resort.id, resort.id_resort_type, resort_language.name,taikhoan.tendangnhap, taikhoan.hoten, taikhoan.diachi, taikhoan.dienthoai, taikhoan.sex, resort_language.address, resort.id_resort_type FROM voucher, book_now,resort,taikhoan,resort_language WHERE voucher.id = book_now.voucher_id AND resort.id = resort_language.id_resort AND resort_language.language = 'vi' AND resort.id = book_now.id_resort AND taikhoan.id = book_now.id_user AND book_now.id_book =".$id;
        else
            $sql = "SELECT book_now.exchange_rate e, book_now.status s ,book_now.*, resort.id, resort.id_resort_type, resort_language.name,taikhoan.tendangnhap, taikhoan.hoten, taikhoan.diachi, taikhoan.dienthoai, taikhoan.sex, resort_language.address, resort.id_resort_type FROM  book_now,resort,taikhoan,resort_language WHERE  resort.id = resort_language.id_resort AND resort_language.language = 'vi' AND resort.id = book_now.id_resort AND taikhoan.id = book_now.id_user AND book_now.id_book =".$id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getDetailsBooked($id)
    {
        if($this->isUsedVoucher($id))
            $sql = "SELECT voucher.id v, book_now.exchange_rate e,voucher.cost, book_now.status s , voucher.name n, book_now.*, resort.id, resort.id_resort_type, resort_language.name,taikhoan.tendangnhap, taikhoan.hoten, taikhoan.diachi, taikhoan.dienthoai, taikhoan.sex, resort_language.address, resort.id_resort_type FROM voucher, book_now,resort,taikhoan,resort_language WHERE voucher.id = book_now.voucher_id AND resort.id = resort_language.id_resort AND resort_language.language = 'vi' AND resort.id = book_now.id_resort AND taikhoan.id = book_now.id_user AND book_now.id_book =".$id;
        else
            $sql = "SELECT book_now.exchange_rate e, book_now.status s ,book_now.*, resort.id, resort.id_resort_type, resort_language.name,taikhoan.tendangnhap, taikhoan.hoten, taikhoan.diachi, taikhoan.dienthoai, taikhoan.sex, resort_language.address, resort.id_resort_type FROM  book_now,resort,taikhoan,resort_language WHERE  resort.id = resort_language.id_resort AND resort_language.language = 'vi' AND resort.id = book_now.id_resort AND taikhoan.id = book_now.id_user AND book_now.id_book =".$id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function isUsedVoucher($id)
    {
        $sql = "SELECT * FROM book_now WHERE id_book =".$id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        if($row['voucher_id']==null)
            return false;
        else
            return true;
    }

    public function update($id,$date_start,$date_end,$adults,$childs,$room,$total_price,$note,$status)
    {
        $user = $_SESSION["idAdmin"];
        $created_date = date("Y/m/d");
        $sql = "UPDATE book_now SET updated_at = '{$created_date}', updated_by = {$user}, start_date = '{$date_start}', end_date='{$date_end}', adults = {$adults}, childs = {$childs}, room = {$room}, total_price = {$total_price}, note = '{$note}', status ={$status} WHERE id_book =" .$id;
        $kq = $this->db->query($sql);
        if($kq && $status == -1 && $this->isUsedVoucher($id))
        {
            $idVoucher = $this->getDetailsBooked($id)['v'];
            $this->updateVoucher($idVoucher);
            // phuc hoi voucher
        }
        return $kq;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM book_now where id = {$id}";
        return  $this->db->query($sql);
    }

    public function updateVoucher($id){
        $sql = "UPDATE voucher SET total = 1 WHERE id=".$id;
        $kq = $this->db->query($sql);
        return $kq;
    }
}