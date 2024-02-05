<?php

    require_once "../class/Database.php";

    if (isset($_POST['task_id']) && isset($_POST['edited_task'])) {
        $task_id = $_POST['task_id'];
        $edited_task = $_POST['edited_task'];

        $update = $sql->prepare("UPDATE tasks SET task = ? WHERE id = ?");
        $update->bind_param("si", $edited_task, $task_id);
        $update->execute();

        header("Location: ../views/content.php");
        exit();
    }






