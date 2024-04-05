<?php

    require_once "Database.php";
    require_once "User.php";

/**
 * u klasi uraditi logiku tj, metode za select , insert i update
 */
    class EditProfile extends Database
    {
        public $sql;

        public function __construct()
        {
            parent::__construct();

        }
        public function create($id, $mobile_number, $city, $address, $postcode)
        {
            $insert = $this->sql->prepare("INSERT INTO users(id, mobile_number, city, address, postcode) VALUES (?, ?, ?, ?, ?)");
            $insert->bind_param("issss", $id,$mobile_number, $city, $address, $postcode);
            $insert->execute();
        }

    }




