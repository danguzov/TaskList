<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "Database.php";
require_once "LoginController.php";
class User extends Database
{
    public $sql;
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;

    public function __construct($firstName = '')
    {
        parent::__construct();
        $this->firstName = $firstName;
    }


    public function getFirstName($id)
    {
        $query = $this->sql->prepare("SELECT first_name FROM users WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();

        $result = $query->get_result();

        if($row = $result->fetch_assoc()) {
            $this->firstName = $row['first_name'];
            return $this->firstName;
        } else {
            return "N/A";
        }

    }

    public function getUserById($id)
    {
        $query = $this->sql->prepare("SELECT * FROM users WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();

        $result = $query->get_result();

        if($row = $result->fetch_assoc()) {
            return $row;
        }

        return null;
    }
}

