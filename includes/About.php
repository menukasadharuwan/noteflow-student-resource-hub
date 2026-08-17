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
    <?php require_once "navbar.php" ?>

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

    <!-- Footer -->
    <?php require_once "footer.php"; ?>



  </body>
</html>
