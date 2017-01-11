<?php

class controllervideo
{
    public $controllervideo;
    public $params;
    public $current_action;
    public $cname = "controllergioithieu";
    public $lang;

    function __construct($action, $params)
    {
        $this->controllervideo = new modelvideo;
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
    }//construct

    public function video()
    {
        require_once("app/view/quanlyvideo.php");
    }

    public function update()
    {
        $id = $this->params[0];
        $link = $_POST['noidung1'];
        $noidung = $_POST['noidung2'];
        $this->controllervideo->update($id, $link, $noidung);
        $this->index();
    }

    public function index(){
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $ds_video = $this->controllervideo->laydanhvideo();
        require_once("app/view/quanlyvideo.php");
    }

}//class