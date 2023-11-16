<?php

    require_once "../include/conn.php";

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $task = $_POST['task'];
        $user_id = $_SESSION['user_id']; // dobijanje ID iz sesije

        $insert = $db->prepare("INSERT INTO tasks(user_id, task) VALUES (?, ?)");
        $insert->bind_param("is", $user_id, $task);
        $insert->execute();
    }
    //osvezavanje stranice
    header("Location: ../views/content.php");

    












