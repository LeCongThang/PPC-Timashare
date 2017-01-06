<?php

class modelvideo
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

    public function laydanhvideo(){
        $sql = "SELECT * FROM video";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function update($id, $link, $noidung)
    {
        $sql = "UPDATE video SET ten_video ='" . $noidung . "',url_video ='" . $link . "' WHERE id_video='" . $id . "'";
        $kq = $this->db->query($sql);
        return true;
    }

    public function laydanhsach($bang)
    {
        $sql = "SELECT * FROM " . $bang;
        if (!$kq = $this->db->query($sql))
            die($this->db->error);
        foreach ($kq as $row) {
            $data = $row;
        }
        return $data;
    }

}//class





