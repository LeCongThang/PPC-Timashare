<?php

class modeluudai
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

    public function getNumber()
    {
        $sql = "select count(id) as total from deals";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function create($tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh, $list_id_resort, $start_date, $end_date)
    {
        $imagick1 = new \Imagick(realpath(REAL_PATH . BASE_DIR . $hinh));
        $image_high1 = $imagick1->getImageHeight();
        $imagick1->resizeImage(530, 262, Imagick::FILTER_LANCZOS, 1);
        file_put_contents(REAL_PATH . BASE_DIR . $hinh, $imagick1);
        $sql_deals = "INSERT INTO deals(image) VALUES('$hinh')";
        $kq_deals = $this->db->query($sql_deals);
        if ($kq_deals)
            $id_deals_inserted = mysqli_insert_id($this->db);
        if ($kq_deals) {
            $id_deals = mysqli_insert_id($this->db);
            $sql_deals_vi = "INSERT INTO deals_language(id_deals,title,content,language) VALUES ('$id_deals', '$tieu_de_vi', '$noi_dung_vi','vi')";
            $sql_deals_en = "INSERT INTO deals_language(id_deals,title,content,language) VALUES ('$id_deals', '$tieu_de_en', '$noi_dung_en','en')";
            $kq_deals_vi = $this->db->query($sql_deals_vi);
            $kq_deals_en = $this->db->query($sql_deals_en);
        }
        if ($kq_deals && $kq_deals_vi && $kq_deals_en) {
            foreach ($list_id_resort as $key => $resort_id) {
                $this->insertDetail_Resort_Deals($resort_id, $id_deals_inserted, $start_date, $end_date);
            }

        }
        return true;
    }

    public function update($id_deals, $tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh)
    {
        $sql_hinh = "UPDATE deals SET ";
        if ($hinh != null) {
            $imagick1 = new \Imagick(realpath(REAL_PATH . BASE_DIR . $hinh));
            $image_high1 = $imagick1->getImageHeight();
            $imagick1->resizeImage(530, 262, Imagick::FILTER_LANCZOS, 1);
            file_put_contents(REAL_PATH . BASE_DIR . $hinh, $imagick1);
            $sql_hinh .= "image='" . $hinh . "'";
            $sql_hinh .= " where id = {$id_deals}";
            $kq_hinh = $this->db->query($sql_hinh);
        }
        $sql_deals_vi = "UPDATE deals_language SET title ='" . $tieu_de_vi . "', content ='" . $noi_dung_vi . "' WHERE id_deals =" . $id_deals . " AND language = 'vi'";
        $sql_deals_en = "UPDATE deals_language SET title ='" . $tieu_de_en . "', content ='" . $noi_dung_en . "' WHERE id_deals =" . $id_deals . " AND language = 'en'";

        $kq_deals_vi = $this->db->query($sql_deals_vi);
        $kq_deals_en = $this->db->query($sql_deals_en);
        if ( $kq_deals_vi && $kq_deals_en)
            return true;
        return false;
    }

    public function getAll()
    {
        $sql = "select deals.id, deals.image, deals_language.title, deals_language.content from deals,deals_language WHERE deals.id = deals_language.id_deals AND deals_language.language = 'vi'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getListResort");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getAllLimit($offset, $item)
    {
        $sql = "select  deals.id, deals.image, deals_language.title, deals_language.content from deals,deals_language WHERE deals.id = deals_language.id_deals AND deals_language.language = 'vi' ORDER BY deals.id DESC LIMIT " . $offset . "," . $item;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getListResort");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function getListResort()
    {
        $sql = "SELECT resort.id, resort_language.name FROM resort, resort_language WHERE resort_language.language ='vi' AND resort.id = resort_language.id_resort";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getListResort");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function get($id, $lang)
    {
        $sql = "SELECT deals.id, deals.image, deals_language.title, deals_language.content FROM deals, deals_language WHERE deals.id = deals_language.id_deals AND deals_language.language = '" . $lang . "' AND deals.id  =" . $id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM deals where id  = {$id}";
        $sql_ngonngu = "DELETE FROM deals_language WHERE id_deals = {$id}";
        $sql_deals_resort = "DELETE FROM details_deal_resort WHERE id_deal ={$id}";
        $kq_deals = $this->db->query($sql);
        $kq_deals_ngonngu = $this->db->query($sql_ngonngu);
        $kq_deals_resort = $this->db->query($sql_deals_resort);
        if ($kq_deals && $kq_deals_ngonngu && $kq_deals_resort)
            return true;
        return false;
    }

    public function insertDetail_Resort_Deals($id_resort, $id_deals, $start_date, $end_date)
    {
        $sql = "INSERT INTO details_deal_resort(id_resort, id_deal, start_date, end_date) VALUES ({$id_resort},{$id_deals},'{$start_date}','{$end_date}')";
        $kq_deals = $this->db->query($sql);
        return $kq_deals;
    }

    public function getDetailsDealsResort($deals_id)
    {
        $sql = "SELECT details_deal_resort.start_date, details_deal_resort.end_date, details_deal_resort.id, details_deal_resort.id_resort, details_deal_resort.id_deal, resort_language.name FROM details_deal_resort, resort, resort_language WHERE resort.id = resort_language.id_resort AND resort_language.language = 'vi' AND resort.id = details_deal_resort.id_resort AND id_deal =" . $deals_id;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getDetailsDealsResort");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function updateDetails($id_deals, $list_resort_choose, $start_date, $end_date)
    {
        $sql_deals_resort = "DELETE FROM details_deal_resort WHERE id_deal ={$id_deals}";
        $kq_deals_resort = $this->db->query($sql_deals_resort);
        if ($kq_deals_resort) {
            if ($list_resort_choose != "")
                foreach ($list_resort_choose as $key => $resort_id) {
                    $this->insertDetail_Resort_Deals($resort_id, $id_deals, $start_date, $end_date);
                }
        }
        return true;
    }
}