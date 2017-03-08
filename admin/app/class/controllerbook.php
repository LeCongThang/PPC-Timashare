<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 12/20/2016
 * Time: 1:59 PM
 */
//begin class controller admin
class controllerbook
{
    // begin variable declaration of the class
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
        $listBooking = $this->bv->getAllBooking();
        $listBookingUpdated = $this->bv->getAllBookingUpdated();
        require "view/quanlybook.php";
    }

    public function update()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllerbook/index');
        }
        $id = $this->params[0];

        if (count($_POST) > 0) {
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];
            $adults = $_POST['adults'];
            $childs = $_POST['childs'];
            $room = $_POST['room'];
            $total_price = $_POST['total_price'];
            $note = $_POST['note'];
            $status = $_POST['status'];
            if ($this->bv->update($id, $date_start, $date_end, $adults, $childs, $room, $total_price, $note, $status))
                $errors[] = "Thành công";
            else
                $errors[] = "Thất bại mời bạn thực hiện lại";
            $listBooking = $this->bv->getAllBooking();
            $listBookingUpdated = $this->bv->getAllBookingUpdated();
            require "view/quanlybook.php";
        }
        $data = $this->bv->getDetailsBook($id);
        require_once("view/ReadBooking.php");
    }

    public function get()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL_ADMIN . 'controllerbook/index');
        }
        $id = $this->params[0];
        $data = $this->bv->getDetailsBooked($id);
        require_once("view/ReadBooked.php");
    }

    public function delete()
    {
        if (!isset($this->params[0])) {
            redirect(BASE_URL . 'controllerbook/index');
        }
        $this->bv->delete($this->params[0]);
        redirect(BASE_URL . 'controllerbook/index');
    }
}