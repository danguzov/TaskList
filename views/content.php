<?php
    require_once "../include/conn.php";
    require_once "greetings.php";
    require_once "../controllers/deleteTask.php";
    require_once "../controllers/updateTask.php";


    $user_id = $_SESSION['user_id'];

    //upit za taskove iz baze podataka
    $task_query = $db->prepare("SELECT * FROM tasks WHERE user_id = ?");
    $task_query->bind_param("i", $user_id);
    $task_query->execute();

    // uzimanje rezultata iz upita
    $task_result = $task_query->get_result();
?>


<?php require_once "navbar.php" ?>

<!-- include CSS -->
<link href="../css/content.css" rel="stylesheet">
<link href="../css/icons.css" rel="stylesheet">

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
        <tr id="taskRow_<?= $task['id']; ?>">
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
                    <!-- Forma za uređivanje taska -->
                    <form method="post" action="../controllers/updateTask.php">
                        <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                        <input type="text" name="edited_task" style="height: 30px; border-radius: 3px; padding: 5px;" value="<?= $task['task'] ?>">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" onclick="cancelEdit(<?= $task['id'] ?>)">Cancel</button>
                    </form>
                </div>
            </td>

            <!-- Dodani stupci za datum i vrijeme -->
            <td class="date"><?= $task['date'] ?></td> <!-- prikazivanje datuma u tabeli -->
            <td class="time"><?= $task['time'] ?></td> <!-- prikazivanje tacnog vremena u tabeli -->
            <td class="priority"><?= $task['priority'] ?></td> <!-- prikazivanje prioriteta u tabeli -->
            <td> <!-- ikonice za edit i delete -->
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


<script src="../js/deleteTask.js"></script>
<script src="../js/updateTask.js"></script>










