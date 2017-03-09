<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 12/20/2016
 * Time: 1:59 PM
 */
class controllermail
{
    public $controllermail;
    public $params;
    public $current_action;
    public $cname = "controllermail";
    public $lang;
    public $errors = [];

    function __construct($action, $params)
    {
        $this->controllermail = new modelmail();
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
    }

    public function mail()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        require "view/mail.php";
    }

    public function xemmail()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $readmail = $this->params[0];
        $mail = $this->controllermail->read($readmail);
        require "view/readmail.php";
    }

    public function xemMailDaKiemTra()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $readmail = $this->params[0];
        $mail = $this->controllermail->read($readmail);
        require "view/readmailchecked.php";
    }

    public function delete()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $user = $this->params[0];
        $this->controllermail->delete($user);
        $this->index();
    }

    public function index()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $ds_mail = $this->controllermail->laydanhsachmail();
        $ds_mail_da_duyet = $this->controllermail->layDanhSachMailDaDuyet();
        require "view/mail.php";
    }

    public function update()
    {
        $user = $this->params[0];
        if ($this->controllermail->update($user))
            $errors[] = "Duyệt thành công";
        else
            $errors[] = "Duyệt chưa thành công";
        $ds_mail = $this->controllermail->laydanhsachmail();
        $ds_mail_da_duyet = $this->controllermail->layDanhSachMailDaDuyet();
        require "view/mail.php";
    }
}