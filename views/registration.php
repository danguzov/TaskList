<?php
    session_start();
    require_once "../include/header.php";
    require_once "../class/Database.php";
    require_once "../class/User.php";

    $sql = new Database();
    $user = new User($sql);

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user->create($firstName, $lastName, $email, $password);
    }
?>

    <link href="../assets/css/registration.css" rel="stylesheet">

    <?php require_once "navbar.php" ?>

    <form action="../controllers/registrationController.php" method="POST">
        <section id="signup" style="max-width: 400px; margin: 0 auto; border-radius: 10px;">

            <h4>Sign Up</h4>

            <form action="" method="POST" class="center-form">
                <div class="form-floating mb-3">
                    <input type="text" name="first_name" class="form-control" id="floatingFirstName" placeholder="First name" style="width: 100%;" required>
                    <label for="floatingFirstName">First Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="last_name" class="form-control" id="floatingLastName" placeholder="Last name" style="width: 100%;" required>
                    <label for="floatingLastName">Last Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="E-mail" style="width: 100%;" required>
                    <label for="floatingEmail">Email address</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" style="width: 100%;" required>
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-floating mb-3">
                    <button type="submit" class="btn btn-success" style="width: 100%;">Sign Up</button>
                </div>
            </form>
            <p>Already have an account? <a href="../index.php">Back to Log in</a>
        </section>
    </form>

<?php require_once "footer.php"; ?>


