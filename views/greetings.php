<?php

    session_start();

    if(isset($_SESSION['user_first_name'])) {
        echo "Welcome, " . $_SESSION['user_first_name'];
    } else {
        echo "Welcome, Guest";
    }






