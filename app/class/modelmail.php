
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


    public function read($mail){
        $sql = "SELECT * FROM lienhe WHERE email_lienhe = '$mail' ";
        $kq = $this->db->query($sql);
        $row= $kq->fetch_assoc();
        return $row;
    }

//    public function laymail(){
//        $sql = "SELECT * FROM lienhe WHERE trangthai = 0";
//        if(!$kq = $this->db->query($sql))
//            die($this->db->error);
//        foreach ($kq as $row) {
//            $data = $row;
//        }
//        return $data;
//    }

}//class





