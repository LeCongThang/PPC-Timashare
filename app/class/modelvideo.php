
<?php
class modelvideo{

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

public function update($id,$link,$noidung){
    $sql="UPDATE video SET name_video='".$noidung."',link_video='".$link."' WHERE id_video='".$id."'";
    $kq = $this->db->query($sql);
    return true;
}

public function laydanhsach($bang){
    $sql = "SELECT * FROM ".$bang;
    if(!$kq = $this->db->query($sql))
        die($this->db->error);
    foreach ($kq as $row) {
        $data = $row;
    }
    return $data; 
}

}//class





