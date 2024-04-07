<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "Database.php";
require_once "LoginController.php";
class User extends Database
{
    public $sql;
    public $id;
    public $user_id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $mobile_number;
    public $city;
    public $address;
    public $postcode;

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

    public function getLastName($id)
    {
        $query = $this->sql->prepare("SELECT last_name FROM users WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();

        $result = $query->get_result();

        if($row = $result->fetch_assoc()) {
            $this->lastName = $row['last_name'];
            return $this->lastName;
        } else {
            return "N/A";
        }
    }

    public function getEmail($id)
    {
        $query = $this->sql->prepare("SELECT email FROM users WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();

        $result = $query->get_result();

        if($row = $result->fetch_assoc()) {
            $this->email = $row['email'];
            return $this->email;
        } else {
            return "N/A";
        }
    }

    public function getMobileNumber($user_id)
    {
        $query = $this->sql->prepare("SELECT mobile_number FROM profile WHERE user_id = ?");
        $query->bind_param("i", $user_id);
        $query->execute();

        $result = $query->get_result();

        if($row = $result->fetch_assoc()) {
            $this->mobile_number = $row['mobile_number'];
            return $this->mobile_number;
        } else {
            return "N/A";
        }
    }

    public function getCity($user_id)
    {
        $query = $this->sql->prepare("SELECT city FROM profile WHERE user_id = ?");
        $query->bind_param("i", $user_id);
        $query->execute();

        $result = $query->get_result();

        if($row = $result->fetch_assoc()) {
            $this->city = $row['city'];
            return $this->city;
        } else {
            return "N/A";
        }
    }

    public function getAddress($user_id)
    {
        $query = $this->sql->prepare("SELECT address FROM profile WHERE user_id = ?");
        $query->bind_param("i", $user_id);
        $query->execute();

        $result = $query->get_result();

        if($row = $result->fetch_assoc()) {
            $this->address = $row['address'];
            return $this->address;
        } else {
            return "N/A";
        }
    }

    public function getPostcode($user_id)
    {
        $query = $this->sql->prepare("SELECT postcode FROM profile WHERE user_id = ?");
        $query->bind_param("i", $user_id);
        $query->execute();

        $result = $query->get_result();

        if($row = $result->fetch_assoc()) {
            $this->postcode = $row['postcode'];
            return $this->postcode;
        } else {
            return "N/A";
        }
    }

    public function checkPassword()
    {
        if (!isset($_POST['current_password'])) {
            echo "Please enter current password.";
            return;
        }

        $current_password = $_POST['current_password'];

        $user_id = $_SESSION['user_id'];

        // Get result from DB
        $current_user = $this->getUserById($user_id);
        $db_password = $current_user['password'];

        if (password_verify($current_password, $db_password)) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];
        $user_id = $_SESSION['user_id'];

        if($this->checkPassword()) {
            if($newPassword == $confirmPassword) {
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                $query = $this->sql->prepare("UPDATE users SET password = ? WHERE id = ?");
                $query->bind_param("si", $hashedPassword, $user_id);
                $query->execute();
                echo  "Password successfully changed";
                var_dump($newPassword);
                header("Location: ../views/profile.php");
            } else {
                echo "New password and Confirm password do not match.";
            }
        } else {
            echo "Current password is incorrect.";
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

