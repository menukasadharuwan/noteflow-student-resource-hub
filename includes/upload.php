<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Notes</title>

    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />
    
    <link rel="stylesheet" href="../css/upload.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/footer.css" />
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
              <a href="../index.html">Home</a>
            </li>
            <li>
              <a href="filter.html">Notes</a>
            </li>

            <li>
              <a href="About.html">About</a>
            </li>
            <li>
              <a href="contact.html">Contact</a>
            </li>
          </ul>
          <div class="navbar-buttons">
            <a href="signup.html"><button id="signup">Sign up</button></a>
            <a href="login.html"><button id="login">Login</button></a>
          </div>
        </div>
        <div class="menu-icon">
          <img src="../images/icons/Menu.svg" alt="menu" id="menu-icon" />
        </div>
      </div>
    </header>

    <main>
      <!--  HERO  -->

      <section class="upload-hero">
        <div class="hero-left">
          <div class="hero-icon">
            <i class="bi bi-cloud-arrow-up-fill"></i>
          </div>

          <div class="hero-text">
            <h1>Upload Notes / Resource</h1>

            <p>Share your knowledge. Help other students learn and grow.</p>
          </div>
        </div>

        
      </section>

      <!--  CONTENT  -->

      <section class="upload-wrapper">
        <!-- LEFT -->

        <div class="upload-form-card">
          <h2>
            <i class="bi bi-file-earmark-text-fill"></i>
            NOTE DETAILS
          </h2>

          <!-- Title -->

          <div class="form-group">
            <label>
              Title
              <span>*</span>
            </label>

            <input
              type="text"
              placeholder="Enter a descriptive title for your note" id="title"
            />
          </div>

          <!-- Subject + Type -->

          <div class="row">
            <div class="form-group">
              <label>
                Subject / Category
                <span>*</span>
              </label>

              <select>
                <option>Select Subject</option>
                <option>Programming</option>
                <option>Networking</option>
                <option>Database</option>
                <option>Cyber Security</option>
              </select>
            </div>

            <div class="form-group">
              <label>
                File Type
                <span>*</span>
              </label>

              <select>
                <option>Select File Type</option>

                <option>PDF</option>

                <option>DOCX</option>

                <option>PPT</option>

                <option>ZIP</option>
              </select>
            </div>
          </div>

          <!-- Description -->

          <div class="form-group">
            <label>Description</label>

            <textarea
              rows="4"
              placeholder="Provide a short description about this note (optional)"
            ></textarea>
          </div>

          <!-- Upload -->

          <h3 class="upload-title">
            <i class="bi bi-upload"></i>

            UPLOAD FILE
          </h3>

          <div class="upload-box" id="dropArea">
            <input type="file" id="fileInput" hidden />

            <i class="bi bi-cloud-arrow-up-fill upload-icon"></i>

            <h4>Drag & Drop your file here</h4>

            <p>or</p>

            <button type="button" id="browseBtn" class="browse-btn">
              Browse File
            </button>

            <small> Maximum file size : 20MB </small>

            <div id="fileName"></div>
          </div>

          <!-- Tags -->

          <div class="form-group">
            <label>Tags (Optional)</label>

            <input
              type="text"
              placeholder="Enter tags separated by commas (e.g. os, algorithms, networking)"
            />
          </div>

          <!-- Buttons -->

          <div class="button-group">
            <button class="cancel-btn">Cancel</button>

            <button class="upload-btn">
              <i class="bi bi-cloud-arrow-up"></i>

              Upload Note
            </button>
          </div>
        </div>

        <!-- RIGHT -->

        <div class="right-column">
          <!-- Sharing -->

          <div class="info-card">
            <h2>
              <i class="bi bi-shield-check"></i>

              SHARING GUIDELINES
            </h2>

            <ul>
              <li>Upload original and high-quality content.</li>
              <li>Do not upload copyrighted or restricted materials.</li>
              <li>Ensure the content is relevant to the selected subject.</li>
              <li>Use clear titles and descriptions.</li>
              <li>Be respectful and helpful to the community.</li>
            </ul>
          </div>

          <!-- Note Upload Notice-->

          <div class="info-card">
            <h2>
              <i class="bi bi-stars"></i>

              WHY UPLOAD NOTES?
            </h2>

            <div class="feature">
              <div class="feature-icon">
                <i class="bi bi-person-check"></i>
              </div>

              <div>
                <h4>Help fellow students succeed</h4>

                <p>Share knowledge and make a difference.</p>
              </div>
            </div>

            <div class="feature">
              <div class="feature-icon">
                <i class="bi bi-award"></i>
              </div>

              <div>
                <h4>Build your reputation</h4>

                <p>Contributors are recognized in the community.</p>
              </div>
            </div>

            <div class="feature">
              <div class="feature-icon">
                <i class="bi bi-people"></i>
              </div>

              <div>
                <h4>Access anywhere</h4>

                <p>Your notes will be available to thousands of students.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

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

    <script src="../js/upload.js"></script>
  </body>
</html>
