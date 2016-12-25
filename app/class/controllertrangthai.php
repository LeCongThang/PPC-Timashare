<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 12/20/2016
 * Time: 1:59 PM
 */
class controllertrangthai
{
    public $bv;
    public $params;
    public $current_action;
    public $cname = "controllertrangthai";
    public $lang;
    public $errors = [];
    function __construct($action, $params)
    {
        $this->bv = new modeltrangthai();
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
    }

    public function trangthai()
    {
        $row = $this->bv->load();
        require "view/trangthai.php";
    }

    public  function chitiet(){
        $id = $this->params[0];
        $row = $this->bv->chitiettrangthai($id);
        require "view/chitiettrangthai.php";
    }

    public function dongy(){
        $id = $_POST['id'];
        $diachi = $_POST['diachi'];
        $thongtin = $_POST['thongtin'];
        $sdt = $_POST['sdt'];
        $img = $_POST['img_khu'];
        $this->bv->insert($id,$diachi,$thongtin,$sdt,$img);
        $this->bv->delete($id);
        require "view/trangthai.php";
    }

    public  function tuchoi(){
        $id = $this->bv->params[0];
        $this->bv->delete($id);
        require "view/trangthai.php";
    }


}