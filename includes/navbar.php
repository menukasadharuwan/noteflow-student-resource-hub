
<?php
require_once __DIR__ . "/../auth/session.php";


?>



<!--Navigation Bar-->

    <header>
      <div class="navbar">
        <div class="navbar-logo"><img src="/Noteflow/images/logo.png" alt="Logo" id="logo"/></div>
        <div class="navbar-links" id="navbar-links">
          <ul>
            <li>
              <a href="../index.php"
                >Home</a
              >
            </li>
            <li>
              <a href="/Noteflow/includes/filter.php"
                >Notes</a
              >
            </li>
            
            <li>
              <a href="/Noteflow/includes/About.php"
                >About</a
              >
            </li>
            <li>
              <a href="/Noteflow/includes/contact.php"
                >Contact</a
              >
            </li>
          </ul>
          <div class="navbar-buttons">

          <?php if(isset($_SESSION["user_id"])): ?>

          <!--User is loggin in -->
          <a href="/Noteflow/includes/profile.php">
            <img src="/Noteflow/images/profile.jpg" id="user-profile">
          </a>

          <?php else: ?>

            <!-- User is not loggin -->
            <a href="/Noteflow/auth/signup.php"><button id="signup">Sign up</button></a>
            <a href="/Noteflow/auth/login.php"><button id="login">Login</button></a>

            <?php endif; ?>

          </div>
        </div>
        <div class="menu-icon">
          <img src="/Noteflow/images/icons/Menu.svg" alt="menu" id="menu-icon" />
        </div>
      </div>
    </header>

    <script src="../js/script.js"></script>