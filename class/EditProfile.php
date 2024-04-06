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
        public function create($mobile_number, $city, $address, $postcode, $user_id)
        {
            $insert = $this->sql->prepare("INSERT INTO profile(mobile_number, city, address, postcode, user_id) VALUES (?, ?, ?, ?, ?)");
            $insert->bind_param("ssssi", $mobile_number, $city, $address, $postcode, $user_id);
            $insert->execute();

            header("location: ../views/profile.php");
        }
    }




