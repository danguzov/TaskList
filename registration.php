<?php require_once "views/header.php"; ?>

    <link href="css/registration.css" rel="stylesheet">

    <img src="assets/img/cover-table.webp" alt="cover" class="bg">
    <form action="controllers/registrationUser.php" method="POST">
    <div class="parent">
        <div class="centered-div">
            <h3>Sign Up</h3>
            <div class="form-floating mb-3">
                <input type="text" name="first_name" class="form-control" id="floatingInput" placeholder="Name" required>
                <label for="floatingInput">First Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="last_name" class="form-control" id="floatingInput" placeholder="Name" required>
                <label for="floatingInput">Last Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="E-mail" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <button type="submit" class="btn btn-success">Sign Up</button>
            </div>
        </div>
    </div>
    </form>


<?php require_once "views/footer.php"; ?>