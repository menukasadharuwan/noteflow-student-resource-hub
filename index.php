<?php

require_once "auth/connect.php";
require_once "auth/session.php";

$recentNotes = [];

$recentQuery = mysqli_query(
    $conn,
    "SELECT
        n.pdf_id,
        n.title,
        n.subject,
        n.date,
        n.image_path,
        u.username
     FROM notes n
     LEFT JOIN users u
        ON n.user_id = u.id
     ORDER BY n.date DESC
     LIMIT 3"
);

if ($recentQuery) {
    while ($row = mysqli_fetch_assoc($recentQuery)) {
        $recentNotes[] = $row;
    }
}

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/navbar.css">

    <link rel="stylesheet" href="css/footer.css">

    <title>Note Flow</title>

</head>

<body>

    <!-- Navbar -->

    <?php require_once "includes/navbar.php"; ?>


    <!-- Hero section -->

    <div class="hero">

        <div class="hero-main">

            <!-- Hero image -->

            <div class="hero-right">

                <img src="images/heroimage.jpg" alt="Hero image" id="heroimg">

            </div>


            <!-- Hero content -->

            <div class="hero-left">

                <h1 id="learn-text">
                    Welcome to
                </h1>


                <h1 id="student-text">

                    Student

                    <span>Resource</span>

                    Hub

                </h1>


                <p>
                    Find high-quality notes, study materials and <br>
                    resources shared by students, for students.
                </p>


                <!-- Search -->

                <form class="search-bar" id="homeSearchForm">

                    <input type="text" id="homeSearchInput" placeholder="Search notes, subject..." autocomplete="off">

                    <button type="submit" class="search-btn">

                        <i class="bi bi-search"></i>

                    </button>

                </form>


                <!-- Buttons -->

                <div class="hero-buttons">

                    <a href="includes/filter.php">

                        <button type="button" class="btn note-btn">
                            Explore Notes
                        </button>

                    </a>


                    <a href="includes/upload.php">

                        <button type="button" class="btn browse-btn">
                            Upload Notes
                        </button>

                    </a>

                </div>

            </div>

        </div>

    </div>


    <!-- Categories -->

    <div class="ctg">

        <div class="ctg-title">

            <h3>
                BROWSE CATEGORIES
            </h3>

        </div>


        <div class="ctg-cards">

            <!-- Programming -->

            <a href="includes/filter.php?subject=Programming" class="category-link">

                <div class="ctg-card">

                    <div class="card-img">

                        <img src="images/card-icons/code-svgrepo-com.svg" alt="Programming">

                    </div>

                    <h3>
                        Programming <br>
                        Notes
                    </h3>

                </div>

            </a>


            <!-- Mathematics -->

            <a href="includes/filter.php?subject=Mathematics" class="category-link">

                <div class="ctg-card">

                    <div class="card-img">

                        <img src="images/card-icons/calculator-svgrepo-com.svg" alt="Mathematics">

                    </div>

                    <h3>
                        Mathematics <br>
                        Notes
                    </h3>

                </div>

            </a>


            <!-- Business -->

            <a href="includes/filter.php?subject=Business" class="category-link">

                <div class="ctg-card">

                    <div class="card-img">

                        <img src="images/card-icons/briefcase-alt-1-svgrepo-com.svg" alt="Business">

                    </div>

                    <h3>
                        Business <br>
                        Notes
                    </h3>

                </div>

            </a>


            <!-- Science -->

            <a href="includes/filter.php?subject=Science" class="category-link">

                <div class="ctg-card">

                    <div class="card-img">

                        <img src="images/card-icons/flask-svgrepo-com.svg" alt="Science">

                    </div>

                    <h3>
                        Science <br>
                        Notes
                    </h3>

                </div>

            </a>


            <!-- Language -->

            <a href="includes/filter.php?subject=Language" class="category-link">

                <div class="ctg-card">

                    <div class="card-img">

                        <img src="images/card-icons/book-open-svgrepo-com.svg" alt="Language">

                    </div>

                    <h3>
                        Language <br>
                        Notes
                    </h3>

                </div>

            </a>

        </div>

    </div>


    <!-- Recent notes -->

    <section class="recent-notes">

        <div class="recent-header">

            <h2>
                RECENTLY ADDED NOTES
            </h2>

            <a href="includes/filter.php">
                View All →
            </a>

        </div>


        <div class="recent-cards">

            <?php if (empty($recentNotes)): ?>

            <p>
                No notes available.
            </p>


            <?php else: ?>

            <?php foreach ($recentNotes as $note): ?>

            <?php

                    $username =
                        !empty($note["username"])
                        ? $note["username"]
                        : "Unknown User";

                    $noteDate =
                        strtotime($note["date"]);

                    $filePath =
                        "../" .
                        ltrim(
                            $note["image_path"],
                            "/"
                        );

                    ?>


            <div class="note-card">

                <div class="note-img">

                    <img src="images/pdf.png" alt="PDF">

                </div>


                <div class="note-content">

                    <h3>
                        <?= htmlspecialchars(
                                    $note["title"]
                                ) ?>
                    </h3>


                    <p>

                        By

                        <?= htmlspecialchars(
                                    $username
                                ) ?>

                    </p>


                    <div class="note-footer">

                        <span class="pdf">
                            PDF
                        </span>


                        <span>

                            •

                            <?= date(
                                        "d M Y",
                                        $noteDate
                                    ) ?>

                        </span>


                        <a href="<?= htmlspecialchars(
                                        $filePath
                                    ) ?>" download>

                            <button type="button">

                                <img src="images/download.svg" alt="Download">

                            </button>

                        </a>

                    </div>

                </div>

            </div>


            <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </section>


    <!-- Footer -->

    <?php require_once "includes/footer.php"; ?>


    <!-- JavaScript -->

    <script src="js/script.js"></script>

</body>

</html>