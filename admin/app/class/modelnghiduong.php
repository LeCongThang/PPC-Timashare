<?php

class modelnghiduong
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

    public function getListResort($lang)
    {
        $sql = "SELECT * FROM resort, resort_language WHERE resort.id = resort_language.id_resort AND resort_language.language ='" . $lang . "' AND resort.id_resort_type = 0";
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

    public function getListImage($id)
    {
        $sql = "SELECT * FROM resort_image WHERE resort_image.id_resort =" . $id;
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

    public function getListHome($lang)
    {
        $sql = "SELECT * FROM resort, resort_language WHERE resort.id = resort_language.id_resort AND resort_language.language ='" . $lang . "' AND resort.id_resort_type = 1";
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

    public function getIdCountry($short_name)
    {
        $sql = "SELECT * FROM country WHERE sort_name like '".$short_name."'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in getIdCountry");
        }
        return mysqli_fetch_assoc($result)['id'];
    }

    public function createResort($list_img, $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_status, $resort_type, $resort_priority, $resort_price, $resort_address, $resort_lat, $resort_lon, $resort_country)
    {
        $idCountry = $this->getIdCountry($resort_country);
        if ($idCountry=="") {
            die("Error in getIdCountry");
        }
        if (!$this->insertResort($resort_status, $resort_type, $resort_priority, $resort_price, $resort_lat, $resort_lon, $idCountry)) {
            die("Error in createResort");
        }

        $last_id = mysqli_insert_id($this->db);

        $this->insertImageResort($last_id, $list_img);
        $this->insertDetailResort($last_id, "vi", $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_address);
        $this->updateInfoMap($last_id,$list_img[0],$resort_name,$resort_address);

        return true;
    }

    public function insertResort($resort_status, $resort_type, $resort_priority, $resort_price, $resort_lat, $resort_lon, $idCountry)
    {
        $sql = "INSERT INTO resort(status, id_resort_type, priority, lat, lng, id_country, price) VALUES (".$resort_status.",".$resort_type.",".$resort_priority.",'".$resort_lat."','".$resort_lon."',".$idCountry.",".$resort_price.")";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function insertDetailResort($id, $lang, $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_address)
    {
        $info_map = "";
        $sql = "INSERT INTO resort_language(introduce, location, service, equipment, language, id_resort, name, address, info_map) VALUES ('".$resort_introduce."','".$resort_location."','".$resort_service."','".$resort_equipment."','".$lang."',".$id.",'".$resort_name."','".$resort_address."','".$info_map."')";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function insertImageResort($id, $list_img)
    {
        $count = count($list_img);
        if($count>0) {
            $sql = "INSERT INTO resort_image(image, id_resort) VALUES ";
            foreach ($list_img as $key => $img) {
                if ($key < $count - 1)
                    $sql = $sql . "('" . $img . "', " . $id . "), ";
                else
                    $sql = $sql . "('" . $img . "', " . $id . ")";
            }
            $result = mysqli_query($this->db, $sql);
            return $result;
        }else
            return false;
    }

    public function updateInfoMap($id, $img, $name, $address)
    {
        $info_map = '<div id="bodyContent"><img style="height: 100px; width:200px;float:left" border="0" src="<?=BASE_DIR?>'
            .$img.'"/> <a href ="#"> <b>'.$name.'</b></a><br/><br/>'.$address.'</div>';
        $sql = "UPDATE resort_language SET info_map ='".$info_map."' WHERE id =".$id;
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in updateInfoMap");
        }
        return $result;
    }




}//class





