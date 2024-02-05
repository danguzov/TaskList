<?php

    session_start();

    require_once "../class/User.php";
    require_once "../class/Database.php";
    require_once "greetings.php";


    $user_id = $_SESSION['user_id'];
    /*
     * Obavezno ubuduce kada se koriste klase, objekat treba da se instancira, sto ja nisam uradio, to su ove dve linije koda ispod komentara
     */
    $database = new Database();
    $sql = $database->sql;
    //upit za taskove iz baze podataka
    $task_query = $sql->prepare("SELECT * FROM tasks WHERE user_id = ?");
    $task_query->bind_param("i", $user_id);
    $task_query->execute();

    // uzimanje rezultata iz upita
    $task_result = $task_query->get_result();


?>

<?php require_once "navbar.php" ?>

<!-- include CSS -->
<link href="../assets/css/content.css" rel="stylesheet">
<link href="../assets/css/icons.css" rel="stylesheet">

<table class="table" style="padding: 24px;">
    <thead class="table-heading">
    <tr>
        <th style="background-color: #72A3EC; color: white; height: 3rem; padding: 2rem;">#</th>
        <th style="background-color: #72A3EC; color: white; height: 3rem; padding: 2rem;">Tasks</th>
        <th style="background-color: #72A3EC; color: white; height: 3rem; padding: 2rem;">Date Created</th>
        <th style="background-color: #72A3EC; color: white; height: 3rem; padding: 2rem;">Time Created</th>
        <th style="background-color: #72A3EC; color: white; height: 3rem; padding: 2rem;">Priority</th>
        <th style="background-color: #72A3EC; color: white; height: 3rem; padding: 2rem;">Action</th>
    </tr>
    </thead>
    <tbody>


    <?php foreach ($task_result as $task) : ?>
        <tr id="taskRow_<?= $task['id']; ?>"> // <!-- za cekiranje boxova da li su taskovi izvrseni -->
            <form id="taskForm" action="completed_tasks.php" method="POST">
            <th>
                <input type="checkbox" name="completed_task" id="checkbox_<?= $task['id']?>" onchange="finishTask(<?= $task['id']?>)">
                <label for="checkbox_<?= $task['id']?>"></label>
            </th>
            </form>

            <td> <!-- prikazivanje taskova u tabeli -->
                <span id="task_<?= $task['id'] ?>">
                    <?= $task['task'] ?>
                </span>

                <div id="editTask_<?= $task['id'] ?>" style="display: none;">
                    <!-- Hidden form for editing tasks -->
                    <form method="post" action="../controllers/updateTask.php">
                        <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                        <input type="text" name="edited_task" style="height: 30px; border-radius: 3px; padding: 5px;" value="<?= $task['task'] ?>">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" onclick="cancelEdit(<?= $task['id'] ?>)">Cancel</button>
                    </form>
                </div>
            </td>

            <!-- Added columns for date and time -->
            <td class="date"><?= $task['date'] ?></td>          <!-- displaying date in a table -->
            <td class="time"><?= $task['time'] ?></td>          <!-- displaying time in a table -->
            <td class="priority"><?= $task['priority'] ?></td>  <!-- displaying priority in a table -->

            <!-- Icons for edit and delete task -->
            <td>
                <a href="javascript:void(0);" onclick="showEditForm(<?= $task['id'] ?>)" class="edit-icon" title="Edit Task">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <a href="javascript:void(0);" onclick="confirmDelete(<?= $task['id'] ?>)" class="delete-icon" title="Delete Task">
                    <i class="fa-regular fa-trash-can"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<script src="../assets/js/deleteTask.js"></script>
<script src="../assets/js/updateTask.js"></script>
<?php
var_dump($_SESSION);










