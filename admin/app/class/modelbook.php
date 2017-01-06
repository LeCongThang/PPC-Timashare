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

    public function getAll($customWhere = '')
    {
        $sql = "select book_now.*,khunghiduong.thongtin from book_now JOIN khunghiduong ON khunghiduong.id_khunghi = book_now.id_khunghi ".$customWhere;
        return  $this->db->query($sql);
    }

    public function get($id)
    {
        $sql = "select book_now.*,khunghiduong.thongtin from book_now JOIN khunghiduong ON khunghiduong.id_khunghi = book_now.id_khunghi where book_now.id = {$id}  limit 1";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function update($id, $ngay_den, $ngay_di, $ghichu)
    {
        $sql = "UPDATE book_now SET ngay_den ='" . $ngay_den . "', ngay_di='" . $ngay_di . "',ghichu='" . $ghichu . "' WHERE id = {$id}";
 
        $kq = $this->db->query($sql);

        return $kq;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM book_now where id = {$id}";
        return  $this->db->query($sql);
    }
}