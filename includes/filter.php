<?php
require_once "../auth/connect.php";
require_once "../auth/session.php";

$searchFromUrl = isset($_GET["search"]) ? trim($_GET["search"]) : "";
$subjectFromUrl = isset($_GET["subject"]) ? trim($_GET["subject"]) : "";

$subjects = [];

$subjectQuery = mysqli_query($conn, "SELECT subject_name FROM subjects ORDER BY subject_name ASC");

if ($subjectQuery) {
    while ($row = mysqli_fetch_assoc($subjectQuery)) {
        $subjects[] = $row["subject_name"];
    }
}

$notes = [];

$sql = "SELECT n.pdf_id, n.user_id, n.title, n.subject, n.description, n.tags, n.date, n.image_path, u.username FROM notes n LEFT JOIN users u ON n.user_id = u.id ORDER BY n.date DESC";

$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $notes[] = $row;
    }
}

$totalNotes = count($notes);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Filter</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/filter.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

<!-- Navbar -->
<?php require_once "navbar.php"; ?>

<!-- Notes page -->
<section class="notes-page">

    <!-- Banner -->
    <div class="banner">
        <div class="banner-icon">
            <i class="fa-solid fa-file-lines"></i>
        </div>

        <div>
            <h1>All Notes & Resources</h1>
            <p>Discover notes shared by students across various subjects.</p>
        </div>
    </div>

    <!-- Main container -->
    <div class="main-container">

        <!-- Sidebar -->
        <aside class="sidebar">

            <h3>
                <i class="fa-solid fa-filter"></i>
                Filters
            </h3>

            <!-- Search -->
            <div class="input-group">
                <label>Search</label>

                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Search notes..." value="<?= htmlspecialchars($searchFromUrl) ?>">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>

            <!-- Subject -->
            <div class="input-group">
                <label>Subject</label>

                <select id="subjectFilter">
                    <option value="all">All Subjects</option>

                    <?php foreach ($subjects as $subject): ?>
                        <option value="<?= htmlspecialchars($subject) ?>" <?= $subjectFromUrl === $subject ? "selected" : "" ?>>
                            <?= htmlspecialchars($subject) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- File type -->
            <div class="input-group">
                <label>File Type</label>

                <select id="fileTypeFilter">
                    <option value="all">All Types</option>
                    <option value="PDF">PDF</option>
                </select>
            </div>

            <!-- Sort -->
            <div class="input-group">
                <label>Sort By</label>

                <select id="sortFilter">
                    <option value="latest">Latest</option>
                    <option value="oldest">Oldest</option>
                </select>
            </div>

            <!-- Apply filters -->
            <button class="apply-btn" id="applyFilters" type="button">
                <i class="fa-solid fa-paper-plane"></i>
                Apply Filters
            </button>

        </aside>

        <!-- Content -->
        <div class="content">

            <!-- Top bar -->
            <div class="top-bar">
                <h3>
                    Showing
                    <span id="count">0</span>
                    Results
                </h3>

                <select id="topSort">
                    <option value="latest">Latest</option>
                    <option value="oldest">Oldest</option>
                </select>
            </div>

            <!-- Notes -->
            <div id="notesContainer">

                <?php if (empty($notes)): ?>

                    <div class="no-notes">
                        <i class="fa-solid fa-file-circle-xmark"></i>
                        <h2>No Notes Available</h2>
                        <p>No students have uploaded notes yet.</p>
                    </div>

                <?php else: ?>

                    <?php foreach ($notes as $note): ?>

                        <?php
                        $username = !empty($note["username"]) ? $note["username"] : "Unknown User";
                        $description = !empty($note["description"]) ? $note["description"] : "No description available.";
                        $noteDate = strtotime($note["date"]);
                        $filePath = "../" . ltrim($note["image_path"], "/");
                        ?>

                        <!-- Note card -->
                        <div class="note-card" data-title="<?= htmlspecialchars(strtolower($note["title"])) ?>" data-subject="<?= htmlspecialchars($note["subject"]) ?>" data-type="PDF" data-date="<?= $noteDate ?>">

                            <!-- PDF image -->
                            <img class="note-image" src="../images/notes-images/pdf.png" alt="PDF Note" onerror="this.src='../images/notes-images/operating-system.png'">

                            <!-- Note information -->
                            <div class="note-info">
                                <h2><?= htmlspecialchars($note["title"]) ?></h2>

                                <small>
                                    By <?= htmlspecialchars($username) ?> • PDF • <?= date("d M Y", $noteDate) ?>
                                </small>

                                <p><?= htmlspecialchars($description) ?></p>

                                <span class="note-subject">
                                    <?= htmlspecialchars($note["subject"]) ?>
                                </span>
                            </div>

                            <!-- Download -->
                            <div class="card-actions">
                                <a href="<?= htmlspecialchars($filePath) ?>" download class="download-btn">
                                    <i class="fa-solid fa-download"></i>
                                    Download
                                </a>
                            </div>

                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

            <!-- No filter results -->
            <div id="noResults" class="no-notes" style="display: none;">
                <i class="fa-solid fa-magnifying-glass"></i>
                <h2>No Results Found</h2>
                <p>Try changing your search or filters.</p>
            </div>

            <!-- Pagination -->
            <div class="pagination" id="pagination"></div>

        </div>
    </div>
</section>

<!-- Footer -->
<?php require_once "footer.php"; ?>

<!-- JavaScript -->
<script src="../js/filter.js"></script>

</body>
</html>