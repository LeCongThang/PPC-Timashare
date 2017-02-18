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
        $sql = "SELECT * FROM country WHERE sort_name like '" . $short_name . "'";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in getIdCountry");
        }
        return mysqli_fetch_assoc($result)['id'];
    }

    public function createResort($resort_name_en, $resort_introduce_en, $resort_location_en, $resort_service_en, $resort_equipment_en, $resort_address_en, $list_img, $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_status, $resort_type, $resort_priority, $resort_price, $resort_address, $resort_lat, $resort_lon, $resort_country, $city_name)
    {
        $idCountry = $this->getIdCountry($resort_country);
        if ($idCountry == "") {
            die("Error in getIdCountry");
        }
        $id_city_insert = "";
        $type = "";
        if ($city_name == "")
            $type = "other";
        else
            $type = $city_name;

        $city = $this->getIdCityByIdCountry($idCountry, $type);
        if (empty($city)) {
            $this->insertCity($idCountry, $type);
            $id_city_insert = mysqli_insert_id($this->db);
        } else
            $id_city_insert = $this->getIdCityByIdCountry($idCountry, $type)['id'];

        $date_insert = date("Y/m/d");
        if (!$this->insertResort($resort_status, $resort_type, $resort_priority, $resort_price, $resort_lat, $resort_lon, $id_city_insert, $date_insert)) {
            die("Error in createResort");
        }
        $last_id = mysqli_insert_id($this->db);

        $this->insertImageResort($last_id, $list_img);
        $this->insertDetailResort($last_id, "en", $resort_name_en, $resort_introduce_en, $resort_location_en, $resort_service_en, $resort_equipment_en, $resort_address_en);
        $last_id_en = mysqli_insert_id($this->db);
        $this->updateInfoMap($last_id, $last_id_en, $list_img[0], $resort_name_en, $resort_address_en, 'en');
        $this->insertDetailResort($last_id, "vi", $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_address);
        $last_id_vi = mysqli_insert_id($this->db);
        $this->updateInfoMap($last_id, $last_id_vi, $list_img[0], $resort_name, $resort_address, 'vi');
        $this->updateNumberContinentsCountry($idCountry, $id_city_insert);
        return true;
    }

    // insert Resort co them truong id_country de de gom
    public function insertResort($resort_status, $resort_type, $resort_priority, $resort_price, $resort_lat, $resort_lon, $id_city, $date_insert)
    {
        $sql = "INSERT INTO resort(status, id_resort_type, priority, lat, lng, id_city, price, date_created) VALUES (" . $resort_status . "," . $resort_type . "," . $resort_priority . ",'" . $resort_lat . "','" . $resort_lon . "'," . $id_city . "," . $resort_price . ",'" . $date_insert . "')";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function updateResort($id_resort, $resort_status, $resort_type, $resort_priority, $resort_price, $resort_lat, $resort_lon, $idCountry)
    {
        $sql = "UPDATE resort SET status = " . $resort_status . ", id_resort_type = " . $resort_type . ", priority =" . $resort_priority . ", price =" . $resort_price . ", lat ='" . $resort_lat . "', lng ='" . $resort_lon . "', id_country =" . $idCountry . " WHERE id =" . $id_resort;
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function insertDetailResort($id, $lang, $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_address)
    {
        $info_map = "";
        $sql = "INSERT INTO resort_language(introduce, location, service, equipment, language, id_resort, name, address, info_map) VALUES ('" . $resort_introduce . "','" . $resort_location . "','" . $resort_service . "','" . $resort_equipment . "','" . $lang . "'," . $id . ",'" . $resort_name . "','" . $resort_address . "','" . $info_map . "')";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function updateDetailResort($id_resort_language, $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_address)
    {
        $sql = "UPDATE resort_language SET name ='" . $resort_name . "', introduce ='" . $resort_introduce . "', location ='" . $resort_location . "', service ='" . $resort_service . "', equipment ='" . $resort_equipment . "', address ='" . $resort_address . "' WHERE id_resort_language =" . $id_resort_language;
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function insertImageResort($id, $list_img)
    {
        $count = count($list_img);
        if ($count > 0) {
            $sql = "INSERT INTO resort_image(image, id_resort) VALUES ";
            foreach ($list_img as $key => $img) {
                if ($key < $count - 1)
                    $sql = $sql . "('" . $img . "', " . $id . "), ";
                else
                    $sql = $sql . "('" . $img . "', " . $id . ")";
            }
            $result = mysqli_query($this->db, $sql);
            return $result;
        } else
            return false;
    }

    public function updateInfoMap($id_resort, $id_resort_language, $img, $name, $address, $lang)
    {
        $info_map = '<div id="bodyContent"><img style="height: 100px; width:200px;float:left" border="0" src="' . BASE_DIR . $img . '"/> <a href ="' . BASE_URL . $lang . '/controller/loadingDetailsResort/' . $id_resort . '"> <b>' . $name . '</b></a><br/><br/>' . $address . '</div>';
        $sql = "UPDATE resort_language SET info_map ='" . $info_map . "' WHERE 	id_resort_language =" . $id_resort_language;
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in updateInfoMap");
        }
        return $result;
    }

    public function updateNumberContinentsCountry($id, $id_city)
    {
        $city = $this->getNumberCity($id_city);
        $country = $this->getNumberCountry($this->getIdCountryByIdCity($id_city));
        $countinents = $this->getNumberContinents($country['id_continents']);
        $numberCity = $city['number'] + 1;
        $numberContinents = $countinents['number'] + 1;
        $numberCountry = $country['number'] + 1;

        $this->updateNumberCountry($id, $numberCountry);
        $this->updateNumberContinents($countinents['id'], $numberContinents);
        $this->updateNumberCity($id_city, $numberCity);
        return true;
    }

    public function getIdCountryByIdCity($id_city)
    {
        $sql = "SELECT * FROM city WHERE id =" . $id_city;
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getNumberCountry");
        }

        return mysqli_fetch_assoc($result)['id_country'];
    }

    public function getNumberCountry($id)
    {
        $sql = "SELECT * FROM country WHERE id =" . $id;
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getNumberCountry");
        }

        return mysqli_fetch_assoc($result);
    }

    public function getNumberCity($id)
    {
        $sql = "SELECT * FROM city WHERE id =" . $id;
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getNumberCountry");
        }

        return mysqli_fetch_assoc($result);
    }

    public function getNumberContinents($id)
    {
        $sql = "SELECT  *  FROM continents WHERE id =" . $id;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in getNumberContinents");
        }

        return mysqli_fetch_assoc($result);
    }

    // đang làm tới đây
    public function getResortByCountryName($id, $lang)
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

    public function httpGet($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function delete($id_resort)
    {
        $resort = $this->getDetailsResort($id_resort, 'vi');
        $id_city = $resort['id_city'];
        $city = $this->getNumberCity($id_city);
        $number_city = $city['number'] - 1;
        $id_country = $this->getIdCountryByIdCity($id_city);
        $country = $this->getNumberCountry($id_country);
        $number_country = $country['number'] - 1;
        $continents = $this->getNumberContinents($country['id_continents']);
        $id_continents = $continents['id'];
        $number_continents = $continents['number'] - 1;

        $this->updateNumberCity($id_city, $number_city);
        $this->updateNumberCountry($id_country, $number_country);
        $this->updateNumberContinents($id_continents, $number_continents);

        $sql = "DELETE FROM resort where id = {$id_resort}";
        $sql_ngonngu = "DELETE FROM resort_language WHERE id_resort = {$id_resort}";
        $sql_image = "DELETE FROM resort_image WHERE id_resort = {$id_resort}";
        $kq_slider = $this->db->query($sql);
        $kq_slider_ngonngu = $this->db->query($sql_ngonngu);
        $kq_slider_image = $this->db->query($sql_image);

        if ($kq_slider && $kq_slider_ngonngu && $kq_slider_image)
            return true;
        return false;
    }

    public function updateNumberCity($id_city, $number_city)
    {
        $sql = "UPDATE city SET number = " . $number_city . " WHERE id =" . $id_city;
        $kq = $this->db->query($sql);
        return $kq;
    }

    public function updateNumberCountry($id_country, $number_country)
    {
        $sql = "UPDATE country SET number = " . $number_country . " WHERE id =" . $id_country;
        $kq = $this->db->query($sql);
        return $kq;
    }

    public function updateNumberContinents($id_continents, $number_continents)
    {
        $sql = "UPDATE continents SET number = " . $number_continents . " WHERE id =" . $id_continents;
        $kq = $this->db->query($sql);
        return $kq;
    }

    public function deleteImage($id_image_remove)
    {
        $sql = "DELETE FROM resort_image where id_resort_image = {$id_image_remove}";
        $kq = $this->db->query($sql);
        return $kq;
    }

    public function getDetailsResort($id, $lang)
    {
        $sql = "SELECT * FROM resort, resort_language WHERE resort.id = resort_language.id_resort AND resort_language.language ='" . $lang . "' AND resort.id = " . $id;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in here");
        }
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getListImageResort($id)
    {
        $sql = "SELECT * FROM resort_image WHERE id_resort=" . $id;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die("Error in query in here");
        }
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        //remove out of memory
        mysqli_free_result($result);
        return $list;
    }

    public function update($id_resort, $resort_name_en, $resort_introduce_en, $resort_location_en, $resort_service_en, $resort_equipment_en, $resort_address_en, $list_img, $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_status, $resort_type, $resort_priority, $resort_price, $resort_address, $resort_lat, $resort_lon, $resort_country)
    {
        $idCountry = $this->getIdCountry($resort_country);
        if ($idCountry == "") {
            die("Error in getIdCountry");
        }
        if (!$this->updateResort($id_resort, $resort_status, $resort_type, $resort_priority, $resort_price, $resort_lat, $resort_lon, $idCountry)) {
            die("Error in createResort");
        }

        $this->insertImageResort($id_resort, $list_img);
        $list_image = $this->getListImageResort($id_resort);
        $main_image = $list_image[0]['image'];

        $id_resort_language_en = $this->getIdResortLanguage($id_resort, 'en');
        $this->updateDetailResort($id_resort_language_en, $resort_name_en, $resort_introduce_en, $resort_location_en, $resort_service_en, $resort_equipment_en, $resort_address_en);
        $this->updateInfoMap($id_resort, $id_resort_language_en, $main_image, $resort_name_en, $resort_address_en, 'en');

        $id_resort_language_vi = $this->getIdResortLanguage($id_resort, 'vi');
        $this->updateDetailResort($id_resort_language_vi, $resort_name, $resort_introduce, $resort_location, $resort_service, $resort_equipment, $resort_address);
        $this->updateInfoMap($id_resort, $id_resort_language_vi, $main_image, $resort_name, $resort_address, 'vi');

        return true;
    }

    public function getIdResortLanguage($id_resort, $lang)
    {
        $sql = "SELECT * FROM resort_language WHERE  id_resort =" . $id_resort . " AND language ='" . $lang . "'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getNumberCountry");
        }

        return mysqli_fetch_assoc($result)['id_resort_language'];
    }

    public function getIdCityByIdCountry($id_country, $name_city)
    {
        $sql = "SELECT * FROM city WHERE id_country ='" . $id_country . "' AND name = '" . $name_city . "'";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            die("Error in getIdCityByIdCountry");
        }

        return mysqli_fetch_assoc($result);
    }

    public function insertCity($idCountry, $city_name)
    {
        $sql = "INSERT INTO city (name,number,id_country) VALUES ('{$city_name}',0,'{$idCountry}')";
        $kq = $this->db->query($sql);
        return $kq;
    }

}//class





