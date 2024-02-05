<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "Database.php";
require_once "User.php";

class Task
{
    public $sql;
    public $task;
    public $date;
    public $time;
    public $priority;

    public function __construct(Database $sql)
    {
        $this->sql = $sql;
    }

    public function getTask($task)
    {
        //dobijanje korisnickog ID iz sesije
        $user_id = $_SESSION['user_id'];

        $task_query = $this->sql->prepare("SELECT * FROM tasks WHERE user_id = ? ORDER BY date DESC, time DESC");
        $task_query->bind_param("i", $user_id);
        $task_query->execute();

        // get results
        $task_result = $task_query->get_result();
        // vracanje stvarnih vrednosti iz baze podataka
        return $task_result->fetch_all(MYSQLI_ASSOC);
    }

    public function setTask($user_id, $task, $date, $time, $priority)
    {
        $insert = $this->sql->prepare("INSERT INTO tasks(id, task, date, time, priority) VALUES (?, ?, ?, ?, ?)");
        $insert->bind_param("isss", $user_id, $task, $date, $time, $priority);
        $insert->execute();
    }

    public function delete($deleted_task)
    {
        if(isset($_GET['task_id'])) {
            $task_id = $_GET['task_id'];

            $delete = $this->sql->prepare("DELETE FROM tasks WHERE id = ?");
            $delete->bind_param("i", $task_id);
            $delete->execute();


            header("Location:../views/content.php");
            exit();
        }
    }

    public function edit($edited_task)
    {
        if (isset($_POST['task_id']) && isset($_POST['edited_task'])) {
            $task_id = $_POST['task_id'];
            $edited_task = $_POST['edited_task'];

            $update = $this->sql->prepare("UPDATE tasks SET task = ? WHERE id = ?");
            $update->bind_param("si", $edited_task, $task_id);
            $update->execute();

            header("Location: ../views/content.php");
            exit();
        }
    }
}