<?php

    require_once "config.php";

    $db = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(!$db) {
        die("Connection failed: ". mysqli_connect_error());
    }

    
