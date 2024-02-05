<?php

    require_once "../include/config.php";

    class Database
    {
        public $sql;

        public function __construct()
        {
            $this->sql = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if($this->sql->connect_error) {
                die("Connection failed: " . $this->sql->connect_error);
            }
        }

        public function prepare($query)
        {
            return $this->sql->prepare($query);
        }
        public function closeConn()
        {
            mysqli_close($this->sql);
        }
    }