<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 12/20/2016
 * Time: 2:06 PM
 */
class modeltrangthai
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

    public function load(){
        $sql = "SELECT*FROM private_nghiduong";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function chitiettrangthai($id){
        $sql = "SELECT*FROM private_nghiduong WHERE id_khunghi= '$id' ";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function insert($id,$diachi,$thongtin,$sdt,$img){
        $sql = "INSERT INTO public_nghiduong(id_khunghi,diachi, thongtin, sdt, img_khu) VALUES ('$id' , '$diachi','$thongtin',$sdt,'$img') ";
        return  $this->db->query($sql);
    }

    public function delete($id){
        $sqli = "DELETE FROM private_nghiduong WHERE id_khunghi='$id'  ";
        return  $this->db->query($sqli);
    }


}