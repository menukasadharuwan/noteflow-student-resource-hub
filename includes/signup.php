<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteFlow Signup</title>
    <link rel="stylesheet" href="../css/sign up.css">
    <link rel="stylesheet" href="../css/Signup.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">





</head>
<body>
    <header>
      <div class="navbar">
        <div class="navbar-logo">
          <img src="../images/logo.png" alt="Logo" />
        </div>
        <div class="navbar-links" id="navbar-links">
          <ul>
            <li>
              <a href="../index.php">Home</a>
            </li>
            <li>
              <a href="filter.php">Notes</a>
            </li>

            <li>
              <a href="About.php">About</a>
            </li>
            <li>
              <a href="contact.php">Contact</a>
            </li>
          </ul>
          <div class="navbar-buttons">
            <a href="signup.php"><button id="signup">Sign up</button></a>
            <a href="login.php"><button id="login">Login</button></a>
          </div>
        </div>
        <div class="menu-icon">
          <img src="../images/icons/Menu.svg" alt="menu" id="menu-icon" />
        </div>
      </div>
    </header>



<div class="container">

    <div class="left">
        <h1>Organize your <span>knowledge</span>, achieve your flow.</h1>

        <p>
            Join thousands of students and educators who have
            streamlined their study routine with our structured
            information management system.
        </p>

      
    </div>

    <div class="form-box">

        <h2>Create Account</h2>

        <input type="text" placeholder="Full Name">
        <input type="text" placeholder="User Name">

        <input type="email" placeholder="Email Address">

        <div class="row">
            <input type="password" placeholder="Password">
            <input type="password" placeholder="Confirm Password">
        </div>

        <label>
            <input type="checkbox" style="width:auto;">
            I agree to the Terms & Conditions
        </label>

        <button class="submit">Create Account</button>

        <p style="text-align:center;margin-top:20px;">
            Already have an account?
            <a href="login.html">Sign In</a>
        </p>

    </div>

</div>

<footer class="footer">
      <div class="footer-top">
        <!-- Logo Section -->
        <div class="footer-col logo-col">
          <div class="footer-logo">
            <img src="../images/footer-icons/graduation.svg" alt="Logo" />
            <h3>STUDENT RESOURCE HUB</h3>
          </div>

          <p>
            A platform to access, share and discover quality study materials
            easily.
          </p>

          <div class="social-icons">
            <a href="#"
              ><img
                src="../images/footer-icons/facebook-rounded-border-svgrepo-com.svg"
                alt=""
            /></a>
            <a href="#"
              ><img
                src="../images/footer-icons/twitter-rounded-border-svgrepo-com.svg"
                alt=""
            /></a>
            <a href="#"
              ><img
                src="../images/footer-icons/instagram-svgrepo-com.svg"
                alt=""
            /></a>
            <a href="#"
              ><img src="../images/footer-icons/youtube-svgrepo-com.svg" alt=""
            /></a>
          </div>
        </div>

        <!--  Links -->
        <div class="footer-col">
          <h3>QUICK LINKS</h3>

          <a href="#">Home</a>
          <a href="#">Notes</a>
          <a href="#">About</a>
          <a href="#">Contact</a>
        </div>

        <!-- Help -->
        <div class="footer-col">
          <h3>HELP</h3>

          <a href="#">FAQs</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
          <a href="#">Disclaimer</a>
        </div>

        <!-- Contact -->
        <div class="footer-col">
          <h3>STAY CONNECTED</h3>

          <div class="contact-item">
            <img src="../images/footer-icons/letter-svgrepo-com.svg" alt="" />
            <span>support@srhub.com</span>
          </div>

          <div class="contact-item">
            <img src="../images/footer-icons/call-out-svgrepo-com.svg" alt="" />
            <span>+94 98765 43210</span>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        © 2026 Student Resource Hub. All rights reserved.
      </div>
    </footer>


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