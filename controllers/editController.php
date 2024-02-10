<?php

    require_once "../class/Task.php";
    require_once "../class/TaskController.php";
    require_once "../class/Database.php";

    $sql = new Database();
    $update_controller = new TaskController();
    $update_controller->edit($edited_task);

    header("Location: ../views/content.php");
    exit();







