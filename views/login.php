<?php

session_start();

require_once '../class/User.php';
require_once '../class/Database.php';
require_once "../class/LoginController.php";

// prebaci ovaj kod u LoginController i onda zovi $login_controller->logout();

$user = new LoginController();

if (isset($_SESSION['user_id'])) {
    $user->logout();
}

require_once "../include/header.php";
?>

<header>
    <div class="logo">
        <i class="fa-solid fa-igloo"></i>

    </div>
    <div class="title">
        <h1>TaskList App</h1>
    </div>
</header>
<a href="../index.php">Back to home page</a>

<section id="login">
    <h4>Login</h4>
    <form action="../controllers/loginController.php" method="POST" class="center-form">
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
            <button type="submit" class="btn btn-primary w-100" style="background-color: #72A3EC; border: none;">Log In</button>
        </div>
    </form>
</section>

<section class="cta">
    <p>or</p>
    <div class="social-buttons">
        <button class="facebook"><i class="fa-brands fa-facebook"></i></button>
        <button class="gmail"><i class="fa-brands fa-google"></i></button>
        <button class="github"><i class="fa-brands fa-github"></i></button>
    </div>
    <p>Don't have an account? <a href="registration.php">Register here</a></p>
</section>

<?php require_once "../include/scripts.php" ?>
<?php require_once "footer.php" ?>
