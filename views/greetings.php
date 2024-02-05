<?php



    require_once "../class/User.php";
    require_once "../class/Database.php";
    
    // postavljanje sesije i ID korisnika

    $user_id = $_SESSION['user_id'];

    //instanciranje klase Database
    $database = new Database();

    //instanciranje klase User nad prosledjenim objektom Database
    $user = new User($database, '');

    //poziv metode getFirstName za dohvatanje imena
    $user_first_name = $user->getFirstName($user_id);

    $_SESSION['user_first_name'] = $user_first_name;

    if(isset($_SESSION['registration_message'])) {
        echo $_SESSION['registration_message'];
        unset($_SESSION['registration_message']);
    } else {
        echo "Welcome, " . $user_first_name;
    }







