<?php

    require_once "../class/Database.php";
    require_once "../class/User.php";
    require_once "../class/LoginController.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $sql = new Database();
    $user = new User();

    // Provera ispravnosti trenutne lozinke
    if($user->checkPassword()) {
        // Ako je trenutna lozinka ispravna, izvrši promenu lozinke
        $user->changePassword();
    }












    /*
     * Kada se bude kucao vazicu password, uraditi proveru iz baze podataka sa IF statmentom, da li se ukucani pasword
     * poklapa sa onim sto je uneseno u input polje, zatim izvrsiti upit u bazu podataka UPDATE da se pasword promeni
     * ako se naredna 2 inputa new i confirm pasword podudaraju, i isti taj upisati u bazu podataka.
     *
     * Za pocetak uraditi redirekciju na neki novi fajl kako bi se ispisala poruka o uspesnosti izvrsenog upita ili
     * o njegovoj gresci!!!
     */


