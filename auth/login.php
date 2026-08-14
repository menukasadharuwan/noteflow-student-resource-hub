<?php
//check if user loggin

require_once "session.php";

if(isset($_SESSION["user_id"])){
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
<link rel="stylesheet" href="../css/log in.css">
<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/footer.css">

</head>
<body>
    
    <!--Navigation Bar-->
    <?php require_once "../includes/navbar.php" ?>

<div class="container">

    <!-- Left Side -->
    <div class="left">

        <img src="../images/logo.png" alt="Logo" class="logoimg" >

        <h1>NoteFlow</h1>

        <p>
            Join our community of students. Access, share and organize
            high-quality study materials designed to help you excel
            in your academic journey.
        </p>

    </div>

    <!-- Right Side -->
    <div class="right">

        <div class="login-box">
            <form action="session.php" method="POST">
            <h1>Welcome Back</h1>

            <p>Please enter your details to access your account.</p>
          <?php

          if (isset($_GET["error"])) {
            echo "<p id='php-error'> " . htmlspecialchars($_GET["error"]) . "</p>";
            }
          ?>
            <label>Email Address</label>
            <input type="email" placeholder="name@university.edu" name="email">
            <input type="hidden" name="action" value="login">

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password">

            <button class="loginbutton ">Log In</button>

            <div class="signup">
                Don't have an account?
                <a href="signup.html">Sign Up for free</a>
            </div>
            </form>
        </div>

    </div>

</div>


    <!--Footer-->
    <?php require_once "../includes/footer.php"; ?>


     <!-- java script-->

    <script>
      const nav_menu_icon = document.getElementById("menu-icon");
      const navbar_links = document.getElementById("navbar-links");

      nav_menu_icon.addEventListener("click", () => {
        if (navbar_links.style.display == "block") {
          navbar_links.style.display = "none";
          nav_menu_icon.src = "../images/icons/menu.svg";
        } else {
          navbar_links.style.display = "block";
          nav_menu_icon.src = "../images/icons/Cansal.svg";
          nav_menu_icon.style.width = "35px";
        }
      });

      //goto home page when click logo
      const logo_button = document.getElementById("logo");

      logo_button.addEventListener("click", () => {
        window.location.href = "../index.php";
      });
    </script>

</body>
</html>