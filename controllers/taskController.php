<?php

    require_once "../include/conn.php";

    session_start();

    $date = date("Y-m-d");
    $time = date("H:i:s");


    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $task = $_POST['task'];
        $user_id = $_SESSION['user_id']; // dobijanje ID iz sesije
        $priority = $_POST['priority'];

        $insert = $db->prepare("INSERT INTO tasks(user_id, task, date, time, priority) VALUES (?, ?, ?, ?, ?)");
        $insert->bind_param("issss", $user_id, $task, $date, $time, $priority);
        $insert->execute();
    }
    //osvezavanje stranice
    header("Location: ../views/content.php");

    












