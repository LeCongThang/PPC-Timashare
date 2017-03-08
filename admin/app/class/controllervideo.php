<?php

class controllervideo
{
    public $controllervideo;
    public $params;
    public $current_action;
    public $cname = "controllervideo";
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
        require_once("view/quanlyvideo.php");
    }

    public function update()
    {
        $id = $this->params[0];
        $url_video = $_POST['url_video'];
        $ten_video_vi = $_POST['ten_video_vi'];
        $ten_video_en = $_POST['ten_video_en'];
        $this->controllervideo->update($id, $url_video, $ten_video_vi, $ten_video_en);
        $this->index();
    }

    public function index()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $ds_video = $this->controllervideo->laydanhvideo();
        require_once("view/quanlyvideo.php");
    }

    public function create()
    {
        $data = ['title' => '', 'content' => ''];
        if (count($_POST) > 0) {
                $url_video = $_POST['url_video'];
                $ten_video_vi = $_POST['ten_video_vi'];
                $ten_video_en = $_POST['ten_video_en'];
                $url_video = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","https://www.youtube.com/embed/$1",$url_video);
            if ($this->controllervideo->create($url_video, $ten_video_vi, $ten_video_en))
                    $this->errors[] = 'Thêm video thành công!';
                else
                    $this->errors[] = 'Lỗi! Thêm video không thành công!';
                $ds_video = $this->controllervideo->laydanhvideo();
                require_once("view/quanlyvideo.php");
                return true;
        }
        require_once("view/create-video.php");
    }

    public function delete()
    {
        $id = $this->params[0];

        $this->controllervideo->delete($id);
        $ds_video = $this->controllervideo->laydanhvideo();
        require_once("view/quanlyvideo.php");
        return true;

    }

}//class