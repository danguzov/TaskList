<?php

    require_once "../class/Task.php";
    require_once "../class/TaskController.php";
    require_once "../class/Database.php";

    $sql = new Database();
    $edit_controller = new TaskController();
    $edit_controller->edit($edited_task);

    header("Location: ../views/content.php");
    exit();







