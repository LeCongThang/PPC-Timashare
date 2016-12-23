<?php

class controllertaikhoan
{
    public $bv;
    public $params;
    public $current_action;
    public $cname = "controllertaikhoan";
    public $lang;

    function __construct($action, $params)
    {
        $this->bv = new modeltaikhoan;
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
    }//construct


    public function taikhoan()
    {
        require_once("view/quanlytaikhoan.php");
    }

    public  function file(){
        $user =$this->params[0];
        $row = $this->bv->load($user);
        require_once("view/update.php");
    }


    public function update()
    {
        $user = $_POST['box1'];
        $pass = $_POST['box2'];
        $hoten = $_POST['box3'];
        $diachi = $_POST['box4'];
        $sodienthoai = $_POST['box5'];
        $vaitro = $_POST['box6'];
        $this->bv->update($user,$pass,$hoten,$diachi,$sodienthoai,$vaitro);
        $url = BASE_URL."controllertaikhoan/taikhoan";
        header('Location: ' . $url, true);
        die();
    }

    public function delete(){
        $user=$this->params[0];
        $this->bv->delete($user);
        $url = BASE_URL."controllertaikhoan/taikhoan";
        header('Location: ' . $url, true);
        die();

    }


}//class
