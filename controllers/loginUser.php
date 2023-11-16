<?php

    require_once "../include/conn.php";

    if(!isset($_POST['email']) || empty($_POST['email'])) {
        die("Please enter your email address");
    }

    if(!isset($_POST['password']) || empty($_POST['password'])) {
        die("Please enter your password");
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $db->query("SELECT * FROM users WHERE email = '$email' ");

    if($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $verify_password = password_verify($password, $user['password']);

        if($verify_password == true) {
            session_start();
            $_SESSION['user_id'] = $user['id'];

            //upit za izvlacenje first_name iz baze podataka
            $nameQuery = $db->query("SELECT first_name FROM users WHERE id = {$user['id']}");
            $nameData = $nameQuery->fetch_assoc();
            $_SESSION['user_first_name'] = $nameData['first_name'];

            header("Location: ../views/navbar.php");
        } else {
            echo "Forgot password?";
        }
    } else {
        echo "User with this email address does not exist";
    }

