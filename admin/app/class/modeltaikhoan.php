<?php

class modeltaikhoan
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

    public function laydanhsachtaikhoan()
    {
        $sql = "SELECT * FROM taikhoan";
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

    public function getListAccount($offset, $item)
    {
        $sql = "SELECT * FROM taikhoan ORDER BY id ASC LIMIT " . $offset . "," . $item;
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

    public function getNumber()
    {
        $sql = "select count(id) as total from taikhoan";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }


    public function delete($user)
    {
        $sql = "DELETE FROM taikhoan WHERE tendangnhap = '$user' ";
        $kq = $this->db->query($sql);
        return true;
    }


    public function update($user, $pass, $hoten, $diachi, $sodienthoai, $vaitro)
    {
        $password_hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "UPDATE taikhoan SET tendangnhap='$user',password='{$password_hash}',id_vaitro='$vaitro',hoten='$hoten', diachi='$diachi',dienthoai=$sodienthoai WHERE tendangnhap='$user'";
        $kq = $this->db->query($sql);
        return true;
    }

    public function layThongTinUser($userId)
    {
        $sql = "SELECT * FROM taikhoan WHERE id={$userId} ";
        $kq = $this->db->query($sql);
        $row = $kq->fetch_assoc();
        return $row;
    }

    public function createAccount($userName, $hinh, $fullName, $address, $phoneNumber, $gender, $password, $status, $role)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO taikhoan(tendangnhap, avatar,password,id_vaitro,hoten,diachi,dienthoai,sex,status) VALUES ('{$userName}', '{$hinh}','{$passwordHash}',{$role},'{$fullName}','{$address}','{$phoneNumber}',{$gender},{$status} )";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in createAccount");
        }
        $last_id = mysqli_insert_id($this->db);
        $date_now = date("Y-m-d");
        $nameVoucher = "Voucher Resgiter";
        $cost = 3;
        $total = 1;
        $this->insertVoucher($nameVoucher, $cost, $date_now, $last_id, $total);
        return true;
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

    public function capnhatthongtintk($id, $hinh, $fullName, $address, $phoneNumber, $gender, $password, $status, $role)
    {
        $passwordOld = $this->layThongTinUser($id)['password'];
        if($passwordOld != $password)
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        else
            $passwordHash = $password;
        $sql = "UPDATE taikhoan SET hoten='{$fullName}', diachi='{$address}',dienthoai='{$phoneNumber}',sex = {$gender}, password ='{$passwordHash}', status = {$status}, id_vaitro = {$role}";
        if ($hinh != null)
            $sql .= ", avatar = '{$hinh}' ";
        $sql .= " WHERE id='" . $id . "'";
        $kq = $this->db->query($sql);
        return $kq;
    }

    public function search($txtSearch,$txtSearchPhone, $type, $status)
    {
        $sql = "SELECT * FROM taikhoan WHERE 1  ";
        if ($txtSearch != "")
            $sql .= " AND hoten like '%" . $txtSearch . "%' ";
        if ($txtSearchPhone != "")
            $sql .= " AND dienthoai like '%" . $txtSearchPhone . "%' ";
        if ($type != -1)
            $sql .= " AND id_vaitro = " . $type;
        if ($status != -1)
            $sql .= " AND status = " . $status;
        $sql.= " ORDER BY taikhoan.id DESC";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in search");
        }

        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }
}//class





