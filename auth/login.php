<?php
// Check if user logged in
require_once "session.php";

if (isset($_SESSION["user_id"])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteFlow Login</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/log in.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>

<!-- Navigation Bar -->
<?php require_once "../includes/navbar.php"; ?>

<div class="container">

    <!-- Left Side -->
    <div class="left">
        <img src="../images/logo.png" alt="Logo" class="logoimg">
        <h1>NoteFlow</h1>
        <p>Join our community of students. Access, share and organize high-quality study materials designed to help you excel in your academic journey.</p>
    </div>

    <!-- Right Side -->
    <div class="right">
        <div class="login-box">
            <form action="session.php" method="POST">
                <h1>Welcome Back</h1>
                <p>Please enter your details to access your account.</p>

                <?php
                // Display login error
                if (isset($_GET["error"])) {
                    echo '<div class="login-error"><i class="bi bi-exclamation-triangle-fill"></i><span>' . htmlspecialchars($_GET["error"]) . '</span></div>';
                }
                ?>

                <label>Email Address</label>
                <input type="email" placeholder="name@university.edu" name="email">

                <input type="hidden" name="action" value="login">

                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password">

                <button type="submit" class="loginbutton">Log In</button>

                <div class="signup">
                    Don't have an account?
                    <a href="/noteflow-student-resource-hub/auth/signup.php">Sign Up for free</a>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- Footer -->
<?php require_once "../includes/footer.php"; ?>

</body>
</html>