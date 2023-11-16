<?php require_once "header.php" ?>
<?php require_once "greetings.php"; ?>

<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['user_id'])) {
        echo '<a href="../login.php" class="btn btn-light"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>';
    }
?>

    <ul class="nav justify-content-center" style="margin: 32px;">
        <li class="nav-item">
            <a href="#" class="active">Active (12)</a>
        </li>
        <li class="nav-item">
            <a href="completed_tasks.php" class="active">Completed (0)</a>
        </li>
        <li class="nav-item">
            <a href="#" class="active">Draft (2)</a>
        </li>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                style="margin-left:auto; margin-right: 32px; width: 7rem;">+  Add task
        </button>

        <!-- Modal -->
    <form action="../controllers/taskController.php" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Task</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="../controllers/taskController.php" method="post">
                        <div class="input-group mb-3" style="padding: 10px;">
                            <input type="text" class="form-control" name="task"  placeholder="Enter here..." aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width: 5rem;">Cancel</button>
                            <button type="submit" class="btn btn-primary" style="width: 5rem;">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
    </ul>

<?php require_once "content.php" ?>
<?php require_once "footer.php" ?>



