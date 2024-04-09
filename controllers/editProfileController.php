<?php

    require_once "../class/Database.php";
    require_once "../class/User.php";
    require_once "../class/EditProfile.php";

    session_start();
    $user_id = $_SESSION['user_id']; // get first_name;

    $sql = new Database();
    $user = new User($sql);

    $last_name = $user->getLastName($user_id);
    $userData = $user->getUserData($user_id);

    $createData = new EditProfile();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['mobile_number']) &&
            isset($_POST["city"]) &&
            isset($_POST["address"]) &&
            isset($_POST["postcode"])) {
            $mobile_number = $_POST["mobile_number"];
            $city = $_POST["city"];
            $address = $_POST["address"];
            $postcode = $_POST["postcode"];

            $create = $createData->create($mobile_number, $city, $address, $postcode, $user_id);
        } else {
            echo "Please provide all required information.";
        }
    }












