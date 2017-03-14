<?php

class modelthongbao
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
        $sql = "select count(id) as total from announce_papers";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function create($tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh, $link)
    {
        $date_insert = date("Y/m/d");
        $sql_announce_papers = "INSERT INTO announce_papers(image,date, link) VALUES('$hinh','$date_insert','$link')";
        $kq_announce_papers = $this->db->query($sql_announce_papers);
        if ($kq_announce_papers) {
            $id_announce_papers = mysqli_insert_id($this->db);
            $sql_announce_papers_vi = "INSERT INTO announce_papers_language(id_announce_papers,title,content,language) VALUES ('$id_announce_papers', '$tieu_de_vi', '$noi_dung_vi','vi')";
            $sql_announce_papers_en = "INSERT INTO announce_papers_language(id_announce_papers,title,content,language) VALUES ('$id_announce_papers', '$tieu_de_en', '$noi_dung_en','en')";
            $kq_announce_papers_vi = $this->db->query($sql_announce_papers_vi);
            $kq_announce_papers_en = $this->db->query($sql_announce_papers_en);
        }
        if ($kq_announce_papers && $kq_announce_papers_vi && $kq_announce_papers_en)
            return true;
        return false;
    }

    public function update($id_announce_papers, $tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh, $link)
    {
        $sql_hinh = "UPDATE announce_papers SET ";
        if ($hinh != null) {
            $sql_hinh .= "image='" . $hinh . "',";
        }
        $sql_hinh .= " link ='".$link."' where id = {$id_announce_papers}";

        $sql_announce_papers_vi = "UPDATE announce_papers_language SET title ='" . $tieu_de_vi . "', content ='" . $noi_dung_vi . "' WHERE id_announce_papers =" . $id_announce_papers . " AND language = 'vi'";
        $sql_announce_papers_en = "UPDATE announce_papers_language SET title ='" . $tieu_de_en . "', content ='" . $noi_dung_en . "' WHERE id_announce_papers =" . $id_announce_papers . " AND language = 'en'";
        $kq_hinh = $this->db->query($sql_hinh);
        $kq_announce_papers_vi = $this->db->query($sql_announce_papers_vi);
        $kq_announce_papers_en = $this->db->query($sql_announce_papers_en);
        if ($kq_hinh && $kq_announce_papers_vi && $kq_announce_papers_en)
            return true;
        return false;
    }

    public function getAll()
    {
        $sql = "select announce_papers.id, announce_papers.link, announce_papers.image, announce_papers_language.title, announce_papers_language.content from announce_papers,announce_papers_language WHERE announce_papers.id = announce_papers_language.id_announce_papers AND announce_papers_language.language = 'vi'" ;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getAll");
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
        $sql = "select announce_papers.id, announce_papers.link, announce_papers.image, announce_papers_language.title, announce_papers_language.content from announce_papers,announce_papers_language WHERE announce_papers.id = announce_papers_language.id_announce_papers AND announce_papers_language.language = 'vi' ORDER BY announce_papers.id ASC LIMIT " . $offset . "," . $item;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query getAllLimit");
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
        $sql = "SELECT announce_papers.id,announce_papers.link, announce_papers.image, announce_papers_language.title, announce_papers_language.content FROM announce_papers, announce_papers_language WHERE announce_papers.id = announce_papers_language.id_announce_papers AND announce_papers_language.language = '" . $lang . "' AND announce_papers.id  =" . $id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM announce_papers where id  = {$id}";
        $sql_ngonngu = "DELETE FROM announce_papers_language WHERE id_announce_papers = {$id}";
        $kq_announce_papers = $this->db->query($sql);
        $kq_announce_papers_ngonngu = $this->db->query($sql_ngonngu);
        if ($kq_announce_papers && $kq_announce_papers_ngonngu)
            return true;
        return false;
    }
}