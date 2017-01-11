
<?php
class modelmail{

    public $db;

    public function __construct(){

        $this->db= new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);
        $this->db->set_charset("utf8");

    } //construct

    public function closeDatabase(){
        if($this->db){
            mysqli_close($this->db);
        }
    }

    public function delete($user){
        $sql = "DELETE FROM lienhe WHERE email_lienhe = '$user' ";
        $kq = $this->db->query($sql);
        return true;
    }


    public function read($readmail){
        $sql = "SELECT * FROM lienhe WHERE email_lienhe = '$readmail' limit 1 ";
        $kq = $this->db->query($sql);
        $mail= $kq->fetch_assoc();
        return $mail;
    }

    public function laydanhsachmail(){
        $sql = "SELECT * FROM lienhe WHERE trangthai =0";
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
    public function layDanhSachMailDaDuyet(){
        $sql = "SELECT * FROM lienhe WHERE trangthai =1";
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

    public function update($id)
    {
        $sql = "UPDATE lienhe SET trangthai = 1 WHERE id = ".$id;
        return $this->db->query($sql);
    }
}//class





