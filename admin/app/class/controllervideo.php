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
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        require_once("view/quanlyvideo.php");
    }

    public function update()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
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
        $currentPage = 1;
        $numberPage = $this->getNumberPage();
        $items = 5;

        if (isset($this->params[0]))
            if ($this->params[0] <= $numberPage)
                $currentPage = $this->params[0];

        $pageList = intval(($currentPage - 1) / 5) + 1;
        $pageEnd = $pageList * 5;
        $pageListLasted = intval(($numberPage - 1) / 5) + 1;

        $offset = ($currentPage - 1) * $items;

        ($pageListLasted != $pageList) ? $lastPage = $pageEnd : $lastPage = $numberPage;
        $ds_video = $this->controllervideo->laydanhvideolimit($offset,$items);
        require_once("view/quanlyvideo.php");
    }

    public function getNumberPage()
    {
        $numberAll = $this->controllervideo->getNumber();
        $pages = $numberAll / 5;
        $tmp = explode(".", $pages);
        if (count($tmp) > 1) {
            $pages = $tmp[0] + 1;
        } else {
            $pages = $tmp[0];
        }
        return $pages;
    }

    public function create()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
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
               $this->index();
                return true;
        }
        require_once("view/create-video.php");
    }

    public function delete()
    {
        if (!isset($_SESSION['tendangnhapadmin']))
            header('location:' . BASE_URL_ADMIN . "controlleradmin/index");
        $id = $this->params[0];

        $this->controllervideo->delete($id);
        $this->index();
        return true;

    }

}//class