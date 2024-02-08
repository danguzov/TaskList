<?php

    require_once "../class/User.php";
    require_once "../class/Database.php";
    require_once "../class/LoginController.php";

    $sql = new Database();
    $user = new User($sql);

   // $user->login($email, $password);

    $user_controller = new LoginController();
    $user_controller->login($_POST);







