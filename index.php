<?php include "include/header.php"  ?>

<link rel="stylesheet" type="text/css" href="assets/css/index.css">

<?php require_once "views/navbar.php" ?>

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Task List App</h1>
            <p class="col-lg-10 fs-4">"Experience seamless task management with our intuitive <em>Task List App</em>. Easily input, edit, delete, and check off tasks to stay organized and productive. Streamline your workflow and never miss a deadline again."</p>
        </div>

        <div class="col-md-10 mx-auto col-lg-5">
            <h4>Welcome Back</h4>
            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="controllers/loginController.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" required>
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
                <hr class="my-4">
                <small class="text-body-secondary">Log In and continue with your tasks</small>
            </form>
        </div>
    </div>
</div>

<?php  require_once "views/footer.php"?>


