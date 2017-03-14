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

    public function search()
    {
        (isset($_POST['txtSearchName'])) ? $txtSearchName = $_POST['txtSearchName'] : $txtSearchName = "";
        (isset($_POST['txtSearchAddress'])) ? $txtSearchAddress = $_POST['txtSearchAddress'] : $txtSearchAddress = "";
        (isset($_POST['txtSearchPhone'])) ? $txtSearchPhone = $_POST['txtSearchPhone'] : $txtSearchPhone = "";
        $list = $this->controllermail->search($txtSearchName,$txtSearchAddress,$txtSearchPhone);
        echo json_encode($list);
    }

    public function searchChecked()
    {
        (isset($_POST['txtSearchNameChecked'])) ? $txtSearchNameChecked = $_POST['txtSearchNameChecked'] : $txtSearchNameChecked = "";
        (isset($_POST['txtSearchAddressChecked'])) ? $txtSearchAddressChecked = $_POST['txtSearchAddressChecked'] : $txtSearchAddressChecked = "";
        (isset($_POST['txtSearchPhoneChecked'])) ? $txtSearchPhoneChecked = $_POST['txtSearchPhoneChecked'] : $txtSearchPhoneChecked = "";
        $list = $this->controllermail->searchChecked($txtSearchNameChecked,$txtSearchAddressChecked,$txtSearchPhoneChecked);
        echo json_encode($list);
    }
}