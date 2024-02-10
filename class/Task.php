<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "Database.php";
require_once "User.php";

class Task extends Database
{
    public $sql;
    public $task;
    public $date;
    public $time;
    public $priority;


    public function __construct()
    {
        parent::__construct();
        // ... inicijalizacija property-a
    }
    public function getTasks()
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


}