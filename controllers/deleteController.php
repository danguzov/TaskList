<?php
    require_once "../class/Task.php";
    require_once "../class/TaskController.php";
    require_once "../class/Database.php";

    $sql = new Database();
    $delete_controller = new TaskController();
    $is_success = $delete_controller->delete();


if ($is_success) {
    json_response(['deleted' => true]);
} else {
    json_response(['deleted' => false]);
}





