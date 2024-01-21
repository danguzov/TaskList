<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task List</title>
    <script src="https://kit.fontawesome.com/374a71cca5.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/index.css" rel="stylesheet">
</head>
<body>

<header>
    <div class="logo">
        <i class="fa-solid fa-igloo"></i>
    </div>
    <div class="title">
        <h1>TaskList App</h1>
    </div>
</header>

<section id="login">
    <h4>Login</h4>
    <form action="" method="POST" class="center-form">
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
    <p>Don't have an account? <a href="views/registration.php">Register here</a></p>
</section>

<?php require_once "include/scripts.php" ?>
<?php require_once "views/footer.php" ?>





