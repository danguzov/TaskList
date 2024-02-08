<?php
    
    require_once "../class/User.php";
    require_once "../class/Database.php";
    require_once "../class/RegistrationController.php";


    if(!isset($_POST['first_name']) || empty($_POST['first_name'])) {
    echo "You must enter first name here";
    }

    if(!isset($_POST['last_name']) || empty($_POST['last_name'])) {
    echo "You must enter last name here";
    }

    if(!isset($_POST['email']) || empty($_POST['email'])) {
        echo "You must enter email address";
    }

    if(!isset($_POST['password']) || empty($_POST['password'])) {
        echo "You must enter password";
    }


    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userInstance = new User();
    $newUser = new RegistrationController($userInstance);
    $newUser->create($firstName, $lastName, $email, $password);


    header("Location: ../views/content.php");
