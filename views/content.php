<?php

    session_start();

    require_once "../class/User.php";
    require_once "../class/Database.php";
    require_once "../class/Task.php";
    require_once "../class/TaskController.php";
    require_once "greetings.php";

    $user_id = $_SESSION['user_id'] ?? null;

    $database = new Database();
    $sql = $database->sql;

    //upit za taskove iz baze podataka
    $task_query = $sql->prepare("SELECT * FROM tasks WHERE user_id = ?");
    $task_query->bind_param("i", $user_id);
    $task_query->execute();

    // uzimanje rezultata iz upita
    $task_result = $task_query->get_result();

    $task_controller = new TaskController();
    $tasks = $task_controller->getAllTasks();
?>
    <?php require_once "modal_element.php"; ?>
    <?php require_once "content_nav.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?= $task_controller->renderTasksTable($tasks) ?>
            </div>
        </div>
    </div>



    <!-- include CSS -->
    <link href="../assets/css/content.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">
    <!-- include js -->
    <script src="../assets/js/deleteTask.js"></script>
    <script src="../assets/js/updateTask.js"></script>














