


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteFlow Signup</title>

    <link rel="stylesheet" href="../css/Signup.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">

</head>
<body>
    
    <!--Navigation Bar-->
    <?php require_once "../includes/navbar.php" ?>



<div class="container">

    <div class="left">
        <h1>Organize your <span>knowledge</span>, achieve your flow.</h1>

        <p>
            Join thousands of students and educators who have
            streamlined their study routine with our structured
            information management system.
        </p>

      
    </div>
    <form method="post" action="session.php">
      <div class="form-box">

          <h2>Create Account</h2>

          <?php

          if (isset($_GET["error"])) {
            echo "<p id='php-error'>" . htmlspecialchars($_GET["error"]) . "</p>";
            }
          ?>

          <input type="text" placeholder="Full Name" name="name">
          <input type="text" placeholder="Username" name="username">
          <input type="hidden" name="action" value="register">

          <input type="email" placeholder="Email Address" name="email">

          <div class="row">
              <input type="password" placeholder="Password" name="password" minlength="6">
              <input type="password" placeholder="Confirm Password" name="repassword" minlength="6">
          </div>

        

          <button class="submit">Create Account</button>

          <p style="text-align:center;margin-top:20px;">
              Already have an account?
              <a href="login.php">Sign In</a>
          </p>

      </div>

    </form>

</div>

    <!--Footer-->
    <?php require_once "../includes/footer.php"; ?>


     

</body>
</html>