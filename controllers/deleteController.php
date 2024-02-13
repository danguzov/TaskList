<?php

    require_once "../class/Task.php";
    require_once "../class/TaskController.php";
    require_once "../class/Database.php";


    $sql = new Database();
    $delete_controller = new TaskController();
    $delete_controller->delete();

    header("Location:../views/content.php");

    exit();








