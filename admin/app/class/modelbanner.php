<?php

class modelbanner
{
    public $db;

    public function __construct()
    {

        $this->db = new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);
        $this->db->set_charset("utf8");

    } //construct

    public function closeDatabase()
    {
        if ($this->db) {
            mysqli_close($this->db);
        }
    }

    public function getAllResortBanner(){
        $sql = "SELECT resort.id_resort_type, resort.priority, banner.id b, resort.id, resort.status, resort_language.name,resort_language.address  FROM resort, resort_language, banner WHERE resort.id = resort_language.id_resort AND resort_language.language = 'vi' AND banner.idkhunghiduong = resort.id";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getAllResortBanner");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getAllResortExceptionResortBanner(){
        $sql = "SELECT DISTINCT  resort.id r, resort.priority, banner.id, resort.status, resort_language.name,resort_language.address, resort.id_resort_type FROM resort, resort_language, banner WHERE resort.id = resort_language.id_resort AND resort_language.language = 'vi' AND resort.id NOT IN (SELECT resort.id FROM resort, banner WHERE banner.idkhunghiduong = resort.id) GROUP BY resort.id";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getAllResortExceptionResortBanner");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getAllResortExceptionResortBannerLimit($txtSearch)
    {
        $sql = "SELECT DISTINCT  resort.id r, resort.priority, banner.id, resort.status, resort_language.name,resort_language.address, resort.id_resort_type FROM resort, resort_language, banner WHERE resort.id = resort_language.id_resort AND resort_language.language = 'vi' AND resort.id NOT IN (SELECT resort.id FROM resort, banner WHERE banner.idkhunghiduong = resort.id) ";
        if($txtSearch != "")
            $sql.= " AND  resort_language.name like '%".$txtSearch."%' ";
        $sql.= " GROUP BY resort.id";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getAllResortExceptionResortBanner");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function removeResortBanner($idBanner){
        $sql = "UPDATE banner SET idkhunghiduong = 0 WHERE id =".$idBanner;
        return mysqli_query($this->db, $sql);
    }

    public function getNumberNullBanner(){
        $sql = "SELECT * FROM banner WHERE banner.idkhunghiduong = 0";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getAllResortBanner");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function insertResortBanner($idResosrt, $idBanner){
        $sql = "UPDATE banner SET idkhunghiduong = ".$idResosrt." WHERE id =".$idBanner;
        return mysqli_query($this->db, $sql);
    }

}