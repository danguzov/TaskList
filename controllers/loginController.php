<?php

    require_once "../class/User.php";
    require_once "../class/Database.php";

    if(!isset($_POST['email']) || empty($_POST['email'])) {
        echo "You must enter email address";
    }

    if(!isset($_POST['password']) || empty($_POST['password'])) {
        echo "You must enter password";
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = new Database();
    $user = new User($sql);

    $user->login($email, $password);



