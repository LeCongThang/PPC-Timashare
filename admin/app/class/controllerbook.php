<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 12/20/2016
 * Time: 1:59 PM
 */
class controllerbook
{
    public $bv;
    public $params;
    public $current_action;
    public $cname = "controllerbook";
    public $lang;
    public $errors = [];
    function __construct($action, $params)
    {
        $this->bv = new modelbook();
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
    }

    public function index()
    {
        $books = $this->bv->getAll();
        require "view/book.php";
    }

    public function update()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL.'controllerbook/index');
        }
        $id = $this->params[0];

        if (count($_POST) > 0) {

            $ngayDen = $_POST['ngay_den'];
            $ngayDi = $_POST['ngay_di'];
            $ghichu = $_POST['ghichu'];
            $this->bv->update($id, $ngayDen, $ngayDi, $ghichu);
            redirect(BASE_URL.'controllerbook/index');
        }
        $data = $this->bv->get($id);
        require_once("view/update-book.php");
    }

    public function delete()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL.'controllerbook/index');
        }
        $this->bv->delete($this->params[0]);
        redirect(BASE_URL.'controllerbook/index');
    }
}