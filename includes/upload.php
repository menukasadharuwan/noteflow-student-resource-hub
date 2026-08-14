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
    <?php require_once "navbar.php" ?>

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

    <!--Footer-->
    <?php require_once "footer.php"; ?>

    <script src="../js/upload.js"></script>
  </body>
</html>
