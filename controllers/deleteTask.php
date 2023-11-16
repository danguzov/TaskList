<?php

    require_once "../include/conn.php";

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_GET['task_id'])) {
        $task_id = $_GET['task_id'];

        $delete = $db->prepare("DELETE FROM tasks WHERE id = ?");
        $delete->bind_param("i", $task_id);
        $delete->execute();


        header("Location:../views/content.php");
        exit();

    }







