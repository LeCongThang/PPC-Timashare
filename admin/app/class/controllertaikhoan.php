<?php

class controllertaikhoan
{
    public $controllertaikhoan;
    public $params;
    public $current_action;
    public $cname = "controllertaikhoan";
    public $lang;

    function __construct($action, $params)
    {
        $this->controllertaikhoan = new modeltaikhoan;
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
    }//construct


    public function taikhoan()
    {
        require_once("app/view/quanlytaikhoan.php");
    }

    public  function layThongTinUser(){
        $user =$this->params[0];
        $row = $this->controllertaikhoan->layThongTinUser($user);
        require_once("app/view/update.php");
    }


    public function update()
    {
        $user = $_POST['box1'];
        $pass = $_POST['box2'];
        $hoten = $_POST['box3'];
        $diachi = $_POST['box4'];
        $sodienthoai = $_POST['box5'];
        $vaitro = $_POST['box6'];
        $this->controllertaikhoan->update($user,$pass,$hoten,$diachi,$sodienthoai,$vaitro);
        $this->index();
        die();
    }

    public function delete(){
        $user=$this->params[0];
        $this->controllertaikhoan->delete($user);
        $this->index();
        die();

    }

    public function index(){
        $ds_tai_khoan = $this->controllertaikhoan->laydanhsachtaikhoan();
        require_once("app/view/quanlytaikhoan.php");
    }


}//class
