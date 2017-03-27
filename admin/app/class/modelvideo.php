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
    public function getNumber()
    {
        $sql = "select count(id_video) as total from video";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
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

    public function laydanhvideoLimit($offset, $item){
        $sql = "SELECT * FROM video ORDER BY video.id_video DESC LIMIT " . $offset . "," . $item;
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

    public function update($id, $link, $ten_video_vi, $ten_video_en)
    {
        $sql = "UPDATE video SET ten_video_vi ='" . $ten_video_vi . "', ten_video_en = '".$ten_video_en."', url_video ='" . trim($link) . "' WHERE id_video='" . $id . "'";
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

    public function create($url_video, $ten_video_vi, $ten_video_en)
    {
        $sql = "INSERT INTO video (url_video, ten_video_vi, ten_video_en) VALUES ('{$url_video}','{$ten_video_vi}','{$ten_video_en}')";
        $kq = $this->db->query($sql);
        return $kq;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM video where id_video  = {$id}";
        $kq_deals = $this->db->query($sql);
        return $kq_deals;
    }

}//class





