<?php

    require_once "../include/conn.php";

    if (isset($_POST['task_id']) && isset($_POST['edited_task'])) {
        $task_id = $_POST['task_id'];
        $edited_task = $_POST['edited_task'];

        $update = $db->prepare("UPDATE tasks SET task = ? WHERE id = ?");
        $update->bind_param("si", $edited_task, $task_id);
        $update->execute();

        // Dodajte poruku ili redirekciju prema potrebi
        header("Location: ../views/content.php");
        exit();
    }






