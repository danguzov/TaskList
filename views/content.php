<?php

    session_start();

    require_once "../class/User.php";
    require_once "../class/Database.php";
    require_once "../class/Task.php";
    require_once "../class/TaskController.php";
  //  require_once "greetings.php";

    $user_id = $_SESSION['user_id'] ?? null;

    $database = new Database();
    $sql = $database->sql;

    $task_query = $sql->prepare("SELECT * FROM tasks WHERE user_id = ?");
    $task_query->bind_param("i", $user_id);
    $task_query->execute();

    $task_result = $task_query->get_result();

    $task_controller = new TaskController();
    $tasks = $task_controller->getAllTasks();
?>
    <?php require_once "sidebar.php"; ?>
    <?php require_once "modal_element.php"; ?>

    <div class="container">
        <div>
            <div>
                <?= $task_controller->renderTasksTable($tasks) ?>
            </div>
        </div>
    </div>

    <!-- include js -->
    <script src="../assets/js/deleteTask.js"></script>
    <script src="../assets/js/updateTask.js"></script>
    <script src="../assets/js/completeTask.js"></script>














