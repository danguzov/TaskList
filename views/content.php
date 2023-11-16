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

<?php require_once "header.php" ?>
<?php require_once "navbar.php" ?>
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
    <script src="../js/completedTasks.js"></script>

    <?php foreach ($task_result as $task) : ?>
        <tr id="taskRow_<?= $task['id']; ?>">
            <th><a href="completed_tasks.php" class="btn btn-success">Finsih</a></th>
            <td>
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
            <td class="date"></td>
            <td class="time"></td>
            <td>
                <select>
                    <option>---</option>
                    <option class="low">Low</option>
                    <option class="medium">Medium</option>
                    <option class="high">High</option>
                </select>
            </td>
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


<script src="../js/deleteTask.js"></script>
<script src="../js/updateTask.js"></script>

<?php  require_once "footer.php" ?>








