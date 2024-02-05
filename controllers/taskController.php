<?php

    require_once "../class/Database.php";
    require_once "../class/User.php";
    require_once "../class/Task.php";

    session_start();

    $task = $_POST['task'];
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $priority = $_POST['priority'];

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $task = $_POST['task'];
        $user_id = $_SESSION['user_id']; // Get ID from session
        $priority = $_POST['priority'];
    }
    //Refresh page
    header("Location: ../views/content.php");

    //kreiranje objekta baze podataka i taskova
    $sql = new Database();
    $task = new Task($sql);

    //dodavanje zadataka u bazu podataka
    $task->setTask($task, $date, $time, $priority);


    












