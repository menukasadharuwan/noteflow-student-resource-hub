<?php
require_once "../auth/session.php";
require_once "../auth/connect.php";

// Create subjects table
$createSubjectsTable = "CREATE TABLE IF NOT EXISTS subjects (subject_id INT AUTO_INCREMENT PRIMARY KEY, subject_name VARCHAR(150) NOT NULL UNIQUE)";
mysqli_query($conn, $createSubjectsTable);

// Add default subjects
$defaultSubjects = ["Programming", "Networking", "Database", "Cyber Security"];

foreach ($defaultSubjects as $subject) {
    $stmt = mysqli_prepare($conn, "INSERT IGNORE INTO subjects (subject_name) VALUES (?)");
    mysqli_stmt_bind_param($stmt, "s", $subject);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Get subjects
$subjects = [];

$result = mysqli_query($conn, "SELECT subject_id, subject_name FROM subjects ORDER BY subject_name ASC");

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $subjects[] = $row;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Notes</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../css/upload.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>

<!-- Navigation -->
<?php require_once "navbar.php"; ?>

<main>

    <!-- Hero -->
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

    <!-- Upload Content -->
    <section class="upload-wrapper">

        <!-- Left -->
        <div class="upload-form-card">

            <h2><i class="bi bi-file-earmark-text-fill"></i> NOTE DETAILS</h2>

            <!-- Title -->
            <div class="form-group">
                <label>Title <span>*</span></label>
                <input type="text" id="title" placeholder="Enter a descriptive title for your note">
            </div>

            <!-- Subject and File Type -->
            <div class="row">

                <div class="form-group">
                    <label>Subject / Category <span>*</span></label>

                    <select id="subject">
                        <option value="">Select Subject</option>

                        <?php foreach ($subjects as $subject): ?>
                            <option value="<?= htmlspecialchars($subject["subject_name"]) ?>">
                                <?= htmlspecialchars($subject["subject_name"]) ?>
                            </option>
                        <?php endforeach; ?>

                        <option value="add_new">+ Add New Subject</option>
                    </select>

                    <input type="text" id="newSubject" placeholder="Enter new subject" style="display: none; margin-top: 10px;">
                </div>

                <div class="form-group">
                    <label>File Type <span>*</span></label>

                    <select id="fileType">
                        <option value="">Select File Type</option>
                        <option value="PDF">PDF</option>
                    </select>
                </div>

            </div>

            <!-- Description -->
            <div class="form-group">
                <label>Description</label>
                <textarea id="description" rows="4" placeholder="Provide a short description about this note (optional)"></textarea>
            </div>

            <!-- Upload -->
            <h3 class="upload-title"><i class="bi bi-upload"></i> UPLOAD FILE</h3>

            <div class="upload-box" id="dropArea">
                <input type="file" id="fileInput" hidden accept=".pdf,application/pdf">

                <i class="bi bi-cloud-arrow-up-fill upload-icon"></i>

                <h4>Drag & Drop your PDF here</h4>
                <p>or</p>

                <button type="button" id="browseBtn" class="browse-btn">Browse File</button>

                <small>Maximum file size : 20MB</small>

                <div id="fileName"></div>
            </div>

            <!-- Tags -->
            <div class="form-group">
                <label>Tags (Optional)</label>
                <input type="text" id="tags" placeholder="Enter tags separated by commas">
            </div>

            <!-- Buttons -->
            <div class="button-group">
                <button type="button" class="cancel-btn" id="cancelBtn">Cancel</button>

                <button type="button" class="upload-btn" id="uploadBtn">
                    <i class="bi bi-cloud-arrow-up"></i>
                    Upload Note
                </button>
            </div>

        </div>

        <!-- Right -->
        <div class="right-column">

            <!-- Sharing Guidelines -->
            <div class="info-card">
                <h2><i class="bi bi-shield-check"></i> SHARING GUIDELINES</h2>

                <ul>
                    <li>Upload original and high-quality content.</li>
                    <li>Do not upload copyrighted or restricted materials.</li>
                    <li>Ensure the content is relevant to the selected subject.</li>
                    <li>Use clear titles and descriptions.</li>
                    <li>Be respectful and helpful to the community.</li>
                </ul>
            </div>

            <!-- Why Upload -->
            <div class="info-card">
                <h2><i class="bi bi-stars"></i> WHY UPLOAD NOTES?</h2>

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
                        <p>Your notes will be available to students.</p>
                    </div>
                </div>

            </div>
        </div>

    </section>
</main>

<!-- Upload JavaScript -->
<script src="../js/upload.js"></script>

<!-- Footer -->
<?php require_once "footer.php"; ?>

</body>
</html>