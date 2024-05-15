<?php
    require_once "../../class/Task.php";
    require_once "../../class/TaskController.php";
    require_once "../../class/Database.php";
    require_once "../../include/helpers.php";

    $sql = new Database();
    $task_controller = new TaskController();
    $is_success = $task_controller->delete();


    if ($is_success) {
        json_response(['deleted' => true]);
    } else {
        json_response(['deleted' => false]);
    }





