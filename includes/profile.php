<?php

require_once __DIR__ . "/../auth/session.php";
require_once __DIR__ . "/../auth/connect.php";

// If user is not logged in

if (!isset($_SESSION["user_id"])) {

    header("Location: /Noteflow/auth/login.php");

    exit();

}


$userId = $_SESSION["user_id"];


// Delete note

if (
    isset($_POST["delete_note"]) &&
    isset($_POST["pdf_id"])
) {

    $pdfId =
        intval($_POST["pdf_id"]);


    $deleteQuery = mysqli_prepare(
        $conn,
        "DELETE FROM notes
         WHERE pdf_id = ?
         AND user_id = ?"
    );


    mysqli_stmt_bind_param(
        $deleteQuery,
        "ii",
        $pdfId,
        $userId
    );


    mysqli_stmt_execute(
        $deleteQuery
    );


    mysqli_stmt_close(
        $deleteQuery
    );


    header(
        "Location: profile.php"
    );

    exit();

}


// Get user's uploaded notes

$userNotes = [];


$notesQuery = mysqli_prepare(
    $conn,
    "SELECT
        pdf_id,
        title,
        subject,
        description,
        date,
        image_path
     FROM notes
     WHERE user_id = ?
     ORDER BY date DESC"
);


mysqli_stmt_bind_param(
    $notesQuery,
    "i",
    $userId
);


mysqli_stmt_execute(
    $notesQuery
);


$notesResult =
    mysqli_stmt_get_result(
        $notesQuery
    );


while (
    $row =
    mysqli_fetch_assoc(
        $notesResult
    )
) {

    $userNotes[] =
        $row;

}


mysqli_stmt_close(
    $notesQuery
);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        My Profile - NoteFlow
    </title>


    <link rel="stylesheet" href="../css/profile.css">

    <link rel="stylesheet" href="../css/navbar.css">

    <link rel="stylesheet" href="../css/footer.css">

</head>


<body>


    <!-- Navigation Bar -->

    <?php require_once "navbar.php"; ?>


    <main class="profile-page">

        <div class="profile-container">


            <!-- Profile header -->

            <div class="profile-header">

                <div class="profile-picture">

                    <img src="../images/profile.jpg" alt="Profile Picture">

                </div>


                <div class="profile-heading">

                    <span class="profile-label">
                        MY PROFILE
                    </span>

                    <h1>

                        <?php

                        echo htmlspecialchars(
                            $_SESSION["name"]
                        );

                        ?>

                    </h1>

                    <p>
                        Manage your personal account information.
                    </p>

                </div>

            </div>


            <!-- Profile information -->

            <div class="profile-content">


                <div class="section-title">

                    <h2>
                        Personal Information
                    </h2>

                    <p>
                        Your account details are shown below.
                    </p>

                </div>


                <div class="profile-details">


                    <!-- Name -->

                    <div class="info-card">

                        <div class="info-icon">
                            👤
                        </div>

                        <div class="info-content">

                            <span>
                                Full Name
                            </span>

                            <h3>

                                <?php

                                echo htmlspecialchars(
                                    $_SESSION["name"]
                                );

                                ?>

                            </h3>

                        </div>

                    </div>


                    <!-- Username -->

                    <div class="info-card">

                        <div class="info-icon">
                            @
                        </div>

                        <div class="info-content">

                            <span>
                                Username
                            </span>

                            <h3>

                                <?php

                                echo htmlspecialchars(
                                    $_SESSION["username"]
                                );

                                ?>

                            </h3>

                        </div>

                    </div>


                    <!-- Email -->

                    <div class="info-card email-card">

                        <div class="info-icon">
                            ✉
                        </div>

                        <div class="info-content">

                            <span>
                                Email Address
                            </span>

                            <h3>

                                <?php

                                echo htmlspecialchars(
                                    $_SESSION["email"]
                                );

                                ?>

                            </h3>

                        </div>

                    </div>


                </div>


                <!-- Account Actions -->

                <div class="account-actions">

                    <div>

                        <h3>
                            Account Actions
                        </h3>

                        <p>
                            You can securely sign out of your NoteFlow account.
                        </p>

                    </div>


                    <div class="profile-button">

                        <a href="edit.php" id="edit-button">
                            EDIT
                        </a>


                        <a href="/Noteflow/auth/logout.php" class="logout-btn" id="logout-btn">

                            <span>
                                ↪
                            </span>

                            Logout

                        </a>

                    </div>

                </div>


                <!-- User Uploaded Notes -->

                <div class="uploaded-notes">


                    <div class="uploaded-notes-header">

                        <div>

                            <h2>
                                My Uploaded Notes
                            </h2>

                            <p>
                                Notes you have uploaded to NoteFlow.
                            </p>

                        </div>


                        <span class="upload-count">

                            <?= count($userNotes) ?>

                        </span>

                    </div>


                    <?php if (empty($userNotes)): ?>


                    <div class="no-uploaded-notes">

                        <div class="empty-icon">
                            📄
                        </div>

                        <h3>
                            No Notes Uploaded
                        </h3>

                        <p>
                            You have not uploaded any notes yet.
                        </p>

                        <a href="upload.php" class="upload-note-btn">
                            Upload Note
                        </a>

                    </div>


                    <?php else: ?>


                    <div class="uploaded-notes-list">


                        <?php foreach ($userNotes as $note): ?>


                        <?php

                                $noteDate =
                                    strtotime(
                                        $note["date"]
                                    );


                                $filePath =
                                    "../" .
                                    ltrim(
                                        $note["image_path"],
                                        "/"
                                    );

                                ?>


                        <div class="uploaded-note-card">


                            <div class="uploaded-pdf-icon">

                                <span>
                                    PDF
                                </span>

                            </div>


                            <div class="uploaded-note-info">

                                <h3>

                                    <?= htmlspecialchars(
                                                $note["title"]
                                            ) ?>

                                </h3>


                                <div class="uploaded-note-details">

                                    <span>

                                        <?= htmlspecialchars(
                                                    $note["subject"]
                                                ) ?>

                                    </span>


                                    <span>
                                        •
                                    </span>


                                    <span>

                                        <?= date(
                                                    "d M Y",
                                                    $noteDate
                                                ) ?>

                                    </span>

                                </div>


                                <?php if (
                                            !empty(
                                                $note["description"]
                                            )
                                        ): ?>

                                <p>

                                    <?= htmlspecialchars(
                                                    $note["description"]
                                                ) ?>

                                </p>

                                <?php endif; ?>


                            </div>


                            <div class="uploaded-note-actions">


                                <!-- Download -->

                                <a href="<?= htmlspecialchars(
                                                $filePath
                                            ) ?>" class="note-download-btn" download>

                                    <span>
                                        ↓
                                    </span>

                                    Download

                                </a>


                                <!-- Delete -->

                                <form method="POST" class="delete-note-form">

                                    <input type="hidden" name="pdf_id" value="<?= (int)$note["pdf_id"] ?>">


                                    <button type="submit" name="delete_note" class="note-delete-btn">

                                        <span>
                                            🗑
                                        </span>

                                        Delete

                                    </button>

                                </form>


                            </div>


                        </div>


                        <?php endforeach; ?>


                    </div>


                    <?php endif; ?>


                </div>


            </div>

        </div>

    </main>


    <!-- Footer -->

    <?php require_once "footer.php"; ?>


    <script src="/Noteflow/js/profile.js"></script>


</body>

</html>