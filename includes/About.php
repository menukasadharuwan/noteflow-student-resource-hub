<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />

    <link rel="stylesheet" href="../css/About.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <title>Document</title>
  </head>

  <body>
    <!--Navigation Bar-->
    <header>
      <div class="navbar">
        <div class="navbar-logo">
          <img src="../images/logo.png" alt="Logo" id="logo"/>
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

    <section class="about-section">
      <div class="about-container">
        <!-- Left Side -->

        <div class="about-left">
          <span class="about-tag">ABOUT US</span>

          <h1>
            Empowering Students.<br />
            <span>Building Futures.</span>
          </h1>

          <div class="title-line"></div>

          <p class="about-text">
            Student Resource Hub (SRH) is a platform created to help students
            access, share and discover quality study materials easily. We
            believe that knowledge grows when it is shared.
          </p>

          <div class="feature-list">
            <div class="feature-item">
              <div class="feature-icon">
                <i class="bi bi-book-fill"></i>
              </div>

              <div>
                <h3>Quality Resources</h3>

                <p>Access high-quality notes, tutorials and study materials.</p>
              </div>
            </div>

            <div class="feature-item">
              <div class="feature-icon">
                <i class="bi bi-people-fill"></i>
              </div>

              <div>
                <h3>Community Driven</h3>

                <p>Learn and share knowledge with other students.</p>
              </div>
            </div>

            <div class="feature-item">
              <div class="feature-icon">
                <i class="bi bi-shield-check"></i>
              </div>

              <div>
                <h3>Safe & Reliable</h3>

                <p>Verified notes and trusted educational resources.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Side -->

        <div class="about-right">
          <h2>Why Students Choose SRH?</h2>

          <div class="cards">
            <div class="card">
              <div class="card-icon">
                <i class="bi bi-file-earmark-text-fill"></i>
              </div>

              <h3>Wide Collection</h3>

              <p>Explore notes, books and resources from many subjects.</p>
            </div>

            <div class="card">
              <div class="card-icon">
                <i class="bi bi-clock-fill"></i>
              </div>

              <h3>Save Time</h3>

              <p>
                Find quality resources quickly without searching everywhere.
              </p>
            </div>

            <div class="card">
              <div class="card-icon">
                <i class="bi bi-star-fill"></i>
              </div>

              <h3>Student First</h3>

              <p>Built for students, making learning easier.</p>
            </div>

            <div class="card">
              <div class="card-icon">
                <i class="bi bi-download"></i>
              </div>

              <h3>Easy Access</h3>

              <p>Download study materials anytime from anywhere.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--Mission Section -->

    <section class="mission-section">
      <div class="mission-container">
        <div class="mission-left">
          <span class="about-tag"> OUR MISSION </span>

          <h2>Making Quality Education Accessible To All</h2>

          <div class="title-line"></div>

          <p>
            Our mission is to provide free, high-quality learning resources for
            every student. We believe education should be accessible, simple and
            collaborative.
          </p>
        </div>

        <div class="mission-right">
          <div class="mission-box">
            <div class="mission-icon">
              <i class="bi bi-bullseye"></i>
            </div>

            <div>
              <h3>Our Vision</h3>

              <p>Create a world where every student can learn and succeed.</p>
            </div>
          </div>

          <div class="mission-box">
            <div class="mission-icon">
              <i class="bi bi-heart-fill"></i>
            </div>

            <div>
              <h3>Our Values</h3>

              <p>Integrity, collaboration and passion for education.</p>
            </div>
          </div>

          <div class="mission-box">
            <div class="mission-icon">
              <i class="bi bi-star-fill"></i>
            </div>

            <div>
              <h3>Our Goal</h3>

              <p>Become the most trusted student resource platform.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

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

          <a href="../index.html">Home</a>
          <a href="filter.html">Notes</a>
          <a href="About.html">About</a>
          <a href="contact.html">Contact</a>
        </div>

        <!-- Help -->
        <div class="footer-col">
          <h3>HELP</h3>

          <a href="#">FAQs</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
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
