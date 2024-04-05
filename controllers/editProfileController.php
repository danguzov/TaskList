<?php

    session_start();
    $user_id = $_SESSION['user_id'];

    require_once "../class/Database.php";
    require_once "../class/User.php";
    require_once "../class/EditProfile.php";

    $sql = new Database();
    $user = new User($sql);

    $last_name = $user->getLastName($user_id);
    $email = $user->getEmail($user_id);

    // Provjera postojanja ključeva u $_POST-u
    $mobile_number = isset($_POST['mobile_number']) ? $_POST['mobile_number'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $postcode = isset($_POST['postcode']) ? $_POST['postcode'] : '';

    $insert = new EditProfile();
    $insert->create($user_id, $mobile_number, $city, $address, $postcode);

    header("Location: ../views/profile.php");







