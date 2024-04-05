<?php

require_once "../class/CompletedController.php";

    $completedController = new CompletedController();
    $completedController->markTaskAsCompleted();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = get_json_data();
        if(isset($data['task_id'])) {
            $completedController->markTaskAsCompleted($data['task_id']);
        }
    }

