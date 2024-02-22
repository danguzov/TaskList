<?php

    require_once "../class/Task.php";
    require_once "../class/TaskController.php";
    require_once "../class/Database.php";

    $sql = new Database();
    $edit_controller = new TaskController();
    $edit_controller->edit();

    header("Location: ../views/content.php");
    exit();







