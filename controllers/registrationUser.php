<?php

    require_once "../include/conn.php";

    if(!isset($_POST['first_name']) || empty($_POST['first_name'])) {
        die("Please enter your first name");
    }

    if(!isset($_POST['last_name']) || empty($_POST['last_name'])) {
        die("Please enter your last name");
    }

    if(!isset($_POST['email']) || empty($_POST['email'])) {
        die("Please enter your email address");
    }

    if(!isset($_POST['password']) || empty($_POST['password'])) {
        die("Please enter your password");
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    // Upiti u bazu za SELECT i INSERT
    $result = $db->prepare("SELECT * FROM users WHERE email = ?");
    $result->bind_param("s", $email);
    $result->execute();

    // uzimanje podataka
    $fetch_result = $result->get_result();

    if($fetch_result->num_rows > 0) {
        $user = $fetch_result->fetch_assoc();
        echo "User already exist with this email address";
    } else {
        $insert = $db->prepare(" INSERT INTO users(first_name, last_name, email, password) VALUES ( ? ,?, ?, ?)");
        $insert->bind_param("ssss", $first_name, $last_name, $email, $password);
        $insert->execute();
    }
        // sesije
        $newUserID = $insert->insert_id;

        session_start();
        $_SESSION['user_id'] = $newUserID;
        $_SESSION['user_first_name'] = $first_name;

        header("Location: ../views/content.php");











    /**
     * 1.NAPRAVITI KONEKCIJU SA BAZOM
     * 2.UPIT U BAZU DA PROVERI EMAIL ADRESE AKO SE VEC PODUDARAJU DA JE MEJL VEC KORISTEN I NEKA PROBA NEKI DRUGI,
     * U SLUCAJU DA JE JEDINSVENIZVSITI UPISIVANJE U BAZU PODATAKA
     *
     * 3.HASHOVANJE LOZINKE
     * 4.KADA SE KORISNIK USPENO REGISTRUJE PREUSMERITI GA NA POCETNU STRANICU
     */