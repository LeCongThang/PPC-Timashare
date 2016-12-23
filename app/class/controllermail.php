<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 12/20/2016
 * Time: 1:59 PM
 */
class controllermail
{
    public $bv;
    public $params;
    public $current_action;
    public $cname = "controllermail";
    public $lang;
    public $errors = [];
    function __construct($action, $params)
    {
        $this->bv = new modelmail();
        $this->current_action = $action;
        $this->params = $params;
        $this->lang = 'vi';
    }

    public function mail()
    {
        require "view/mail.php";
    }

    public  function  mail2()
    {
        require "view/readmail.php";
    }

    public function delete(){
            $user=$this->params[0];
            $this->bv->delete($user);
            $url = BASE_URL."controllermail/mail ";
            header('Location: ' . $url, true);
            die();
    }

    public  function readmail(){
        $readmail = $this->params[0];
        $this->bv->read($readmail);
        $url = BASE_URL."controllermail/mail2";
        header('Location: ' . $url, true);
        die();
    }
}