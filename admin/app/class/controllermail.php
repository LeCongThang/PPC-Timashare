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

        require "app/view/mail.php";
    }

    public function xemmail()
    {
        $readmail = $this->params[0];
        $mail = $this->controllermail->read($readmail);
        require "app/view/readmail.php";
    }

    public function delete()
    {
        $user = $this->params[0];
        $this->controllermail->delete($user);
        $this->index();
    }

    public function index(){
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $ds_mail = $this->controllermail->laydanhsachmail();
        $ds_mail_da_duyet = $this->controllermail->layDanhSachMailDaDuyet();
        require "app/view/mail.php";
    }

    public function update(){
        $user = $this->params[0];
        $this->controllermail->update($user);
        $this->index();
    }
}