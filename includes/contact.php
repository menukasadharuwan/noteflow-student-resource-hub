<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact | Student Resource Hub</title>

    <link rel="stylesheet" href="../css/contact.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/footer.css" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />
  </head>
  <body>
    
  <!--Navigation Bar-->
    <?php require_once "navbar.php" ?>

    <main>
      <section class="contact-section">
        <!-- Left Side -->
        <div class="contact-info">
          <h2>GET IN TOUCH</h2>

          <p class="contact-text">
            Have questions or suggestions?<br />
            We'd love to hear from you.
          </p>

          <div class="info-box">
            <div class="icon">
              <i class="bi bi-envelope-fill"></i>
            </div>

            <div>
              <h4>Email</h4>
              <p>info@srhub.com</p>
            </div>
          </div>

          <div class="info-box">
            <div class="icon">
              <i class="bi bi-telephone-fill"></i>
            </div>

            <div>
              <h4>Phone</h4>
              <p>+94 71 987 6543</p>
            </div>
          </div>

          <div class="info-box">
            <div class="icon">
              <i class="bi bi-geo-alt-fill"></i>
            </div>

            <div>
              <h4>Address</h4>
              <p>
                123 College Street,<br />
                Colombo, Sri Lanka
              </p>
            </div>
          </div>

          <h3 class="follow-title">Follow Us</h3>

          <div class="social-icons">
            <a href="#"><i class="bi bi-facebook"></i></a>

            <a href="#"><i class="bi bi-twitter-x"></i></a>

            <a href="#"><i class="bi bi-instagram"></i></a>

            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <!-- Right Side -->

        <div class="contact-form">
          <h2>SEND US A MESSAGE</h2>

          <form>
            <div class="input-box">
              <i class="bi bi-person-fill"></i>

              <input type="text" placeholder="Your Name" required />
            </div>

            <div class="input-box">
              <i class="bi bi-envelope-fill"></i>

              <input type="email" placeholder="Your Email" required />
            </div>

            <div class="input-box">
              <i class="bi bi-file-earmark-text-fill"></i>

              <input type="text" placeholder="Subject" required />
            </div>

            <div class="input-box textarea">
              <i class="bi bi-pencil-fill"></i>

              <textarea placeholder="Your Message" required></textarea>
            </div>

            <button class="send-btn">
              Send Message

              <i class="bi bi-send-fill"></i>
            </button>
          </form>
        </div>
      </section>
    </main>

    <!--Footer-->
    <?php require_once "footer.php"; ?>

    <!-- java script -->

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
