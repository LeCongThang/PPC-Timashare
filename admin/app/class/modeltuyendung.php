<?php

class modeltuyendung
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

    public function create($tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh)
    {
        $date_insert = date("Y/m/d");
        $sql_connect_ppc = "INSERT INTO connect_ppc(image,date) VALUES('$hinh','$date_insert')";
        $kq_connect_ppc = $this->db->query($sql_connect_ppc);
        if ($kq_connect_ppc) {
            $id_connect_ppc = mysqli_insert_id($this->db);
            $sql_connect_ppc_vi = "INSERT INTO connect_ppc_language(id_connect_ppc,title,content,language) VALUES ('$id_connect_ppc', '$tieu_de_vi', '$noi_dung_vi','vi')";
            $sql_connect_ppc_en = "INSERT INTO connect_ppc_language(id_connect_ppc,title,content,language) VALUES ('$id_connect_ppc', '$tieu_de_en', '$noi_dung_en','en')";
            $kq_connect_ppc_vi = $this->db->query($sql_connect_ppc_vi);
            $kq_connect_ppc_en = $this->db->query($sql_connect_ppc_en);
        }
        if ($kq_connect_ppc && $kq_connect_ppc_vi && $kq_connect_ppc_en)
            return true;
        return false;
    }

    public function update($id_connect_ppc, $tieu_de_vi, $noi_dung_vi, $tieu_de_en, $noi_dung_en, $hinh)
    {
        $sql_hinh = "UPDATE connect_ppc SET ";
        if ($hinh != null) {
            $sql_hinh .= "image='" . $hinh . "'";
        }
        $sql_hinh .= " where id = {$id_connect_ppc}";

        $sql_connect_ppc_vi = "UPDATE connect_ppc_language SET title ='" . $tieu_de_vi . "', content ='" . $noi_dung_vi . "' WHERE id_connect_ppc =" . $id_connect_ppc . " AND language = 'vi'";
        $sql_connect_ppc_en = "UPDATE connect_ppc_language SET title ='" . $tieu_de_en . "', content ='" . $noi_dung_en . "' WHERE id_connect_ppc =" . $id_connect_ppc . " AND language = 'en'";
        $kq_hinh = $this->db->query($sql_hinh);
        $kq_connect_ppc_vi = $this->db->query($sql_connect_ppc_vi);
        $kq_connect_ppc_en = $this->db->query($sql_connect_ppc_en);
        if ($kq_hinh && $kq_connect_ppc_vi && $kq_connect_ppc_en)
            return true;
        return false;
    }

    public function getAll()
    {
        $sql = "select connect_ppc.id, connect_ppc.image, connect_ppc_language.title, connect_ppc_language.content from connect_ppc,connect_ppc_language WHERE connect_ppc.id = connect_ppc_language.id_connect_ppc AND connect_ppc_language.language = 'vi'" ;
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
        $sql = "SELECT connect_ppc.id, connect_ppc.image, connect_ppc_language.title, connect_ppc_language.content FROM connect_ppc, connect_ppc_language WHERE connect_ppc.id = connect_ppc_language.id_connect_ppc AND connect_ppc_language.language = '" . $lang . "' AND connect_ppc.id  =" . $id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM connect_ppc where id  = {$id}";
        $sql_ngonngu = "DELETE FROM connect_ppc_language WHERE id_connect_ppc = {$id}";
        $kq_connect_ppc = $this->db->query($sql);
        $kq_connect_ppc_ngonngu = $this->db->query($sql_ngonngu);
        if ($kq_connect_ppc && $kq_connect_ppc_ngonngu)
            return true;
        return false;
    }
}