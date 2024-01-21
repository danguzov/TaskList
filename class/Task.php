<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "Database.php";
require_once "User.php";

class Task
{
    public $task;
    public $date;
    public $time;
    public $priority;

    public function __construct($task, $date, $time, $priority)
    {
        $this->task = $task;
        $this->date = $date;
        $this->time = $time;
        $this->priority = $priority;

        parent::__construct();
    }

    public function getTask()
    {
        return $this->task;

        $task_query = $sql->prepare("SELECT * FROM tasks WHERE user_id = ? ORDER BY date DESC, time DESC");
        $task_query->bind_param("i", $user_id);
        $task_query->execute();

        // get results
        $task_result = $task_query->get_result();
    }

    public function setTask($new_task)
    {
        $this->task = $new_task;
    }

    public function delete($deleted_task)
    {
        if(isset($_GET['task_id'])) {
            $task_id = $_GET['task_id'];

            $delete = $sql->prepare("DELETE FROM tasks WHERE id = ?");
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

            $update = $sql->prepare("UPDATE tasks SET task = ? WHERE id = ?");
            $update->bind_param("si", $edited_task, $task_id);
            $update->execute();

            header("Location: ../views/content.php");
            exit();
        }
    }
}