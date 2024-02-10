<?php

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once "../class/Database.php";
    require_once "../class/User.php";
    require_once "../class/Task.php";
    require_once "../class/TaskController.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $task_name = $_POST['task']; //
        $priority = $_POST['priority'];
        $user_id = $_SESSION['user_id']; // Get ID from session

        $task = new Task();
        $new_task = new TaskController();

        $date = date("Y-m-d");
        $time = date("H:i:s");
        $new_task->create($user_id, $task_name, $date, $time, $priority);
    }


    header("Location: ../views/content.php");
    exit();





    












