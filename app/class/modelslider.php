<?php

class modelslider
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
    public function create($tieude, $noidung, $hinh)
    {
        $sql = "INSERT INTO slider(title, content, image) VALUES('$tieude', '$noidung', '$hinh')";
        $kq = $this->db->query($sql);
        return $kq;
    }

    public function update($id, $tieude, $noidung, $hinh)
    {
        $sql = "UPDATE slider SET title='" . $tieude . "', content='" . $noidung . "'";
        if ($hinh != null) {
            $sql .= ",image='" . $hinh . "'";
        }
        $sql .= " where id = {$id}";
        $kq = $this->db->query($sql);
        return $kq;
    }

    public function getAll($customWhere = "")
    {
        $sql = "select * from slider ".$customWhere;

        return  $this->db->query($sql);
    }

    public function get($id)
    {
        $sql = "select * from slider where id = {$id} limit 1";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM slider where id = {$id}";
        return  $this->db->query($sql);
    }
}