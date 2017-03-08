<?php

class controllerbanner
{
    const UPDATE_DIR = '../';

    public $controllerbanner;
    public $params;
    public $current_action;
    public $cname = "controllerbanner";
    public $errors = [];

    function __construct($action, $params)
    {
        $this->controllerbanner = new modelbanner();
        $this->current_action = $action;
        $this->params = $params;
    }//construct


    public function index()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $listResortBanner = $this->controllerbanner->getAllResortBanner();
        $listResortNotBanner = $this->controllerbanner->getAllResortExceptionResortBanner();
        require_once("view/quanlybanner.php");
    }

    public function insertBanner()
    {
        if (isset($_POST['idResort'])) {
            $idResort = $_POST['idResort'];
            $listBannerNull = $this->controllerbanner->getNumberNullBanner();
            $number = count($listBannerNull);
            if ($number > 0) {
                $idBanner = $listBannerNull[0]['id'];
                if($this->controllerbanner->insertResortBanner($idResort,$idBanner))
                    $this->errors[] = 'Thêm thành công';
                else
                    $this->errors[] = 'Thêm thất bại, mời bạn thử lại!!!';
            } else {
                $this->errors[] = 'Số lượng tối đa trên banner chỉ có 4 mời bạn xóa rồi hãy thêm mới vào!!!';

            }
            $listResortBanner = $this->controllerbanner->getAllResortBanner();
            $listResortNotBanner = $this->controllerbanner->getAllResortExceptionResortBanner();
            require_once("view/quanlybanner.php");
            return true;
        } else
            $this->index();
    }

    public function removeBanner()
    {
        if (isset($_POST['idBanner'])) {
            $idBanner = $_POST['idBanner'];
            if($this->controllerbanner->removeResortBanner($idBanner))
                $this->errors[] = 'Xóa thành công';
            else
                $this->errors[] = 'Xóa thất bại, mời bạn thử lại!!!';
            $listResortBanner = $this->controllerbanner->getAllResortBanner();
            $listResortNotBanner = $this->controllerbanner->getAllResortExceptionResortBanner();
            require_once("view/quanlybanner.php");
        } else
            $this->index();
    }

}//class
