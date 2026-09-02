<?php

// ========================================
// ERROR SETTINGS
// ========================================

// Do not display PHP errors as HTML.
// Otherwise JavaScript will receive:
//
// <br>
// <b>Warning</b>
//
// instead of JSON.

ini_set("display_errors", "0");
ini_set("log_errors", "1");

error_reporting(E_ALL);


// ========================================
// START OUTPUT BUFFER
// ========================================

ob_start();


// ========================================
// REQUIRE FILES
// ========================================

require_once "../auth/connect.php";
require_once "../auth/session.php";


// ========================================
// JSON HEADER
// ========================================

header("Content-Type: application/json; charset=UTF-8");


// ========================================
// JSON RESPONSE FUNCTION
// ========================================

function sendResponse(
    bool $success,
    string $message,
    array $extra = []
) {

    // Remove unwanted PHP output

    if (ob_get_length()) {
        ob_clean();
    }

    echo json_encode(
        array_merge(
            [
                "success" => $success,
                "message" => $message
            ],
            $extra
        )
    );

    exit;
}


// ========================================
// PHP ERROR HANDLER
// ========================================

set_error_handler(
    function (
        $severity,
        $message,
        $file,
        $line
    ) {

        error_log(
            "PHP ERROR: " .
            $message .
            " in " .
            $file .
            " on line " .
            $line
        );

        sendResponse(
            false,
            "Server error occurred. Check PHP error log."
        );

    }
);


// ========================================
// REQUEST METHOD
// ========================================

if (
    $_SERVER["REQUEST_METHOD"] !== "POST"
) {

    sendResponse(
        false,
        "Invalid request."
    );

}


// ========================================
// CHECK LOGIN
// ========================================

if (
    !isset($_SESSION["user_id"])
) {

    sendResponse(
        false,
        "Please login first."
    );

}


$user_id =
    (int) $_SESSION["user_id"];


// ========================================
// CHECK DATABASE CONNECTION
// ========================================

if (!$conn) {

    sendResponse(
        false,
        "Database connection failed."
    );

}


// ========================================
// CREATE SUBJECTS TABLE
// ========================================

$createSubjectsTable = "

CREATE TABLE IF NOT EXISTS subjects (

    subject_id INT AUTO_INCREMENT PRIMARY KEY,

    subject_name VARCHAR(150)
    NOT NULL UNIQUE

)

";


if (
    !mysqli_query(
        $conn,
        $createSubjectsTable
    )
) {

    sendResponse(
        false,
        "Could not create subjects table."
    );

}


// ========================================
// CREATE NOTES TABLE
// ========================================

$createNotesTable = "

CREATE TABLE IF NOT EXISTS notes (

    pdf_id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL,

    title VARCHAR(255) NOT NULL,

    subject VARCHAR(150) NOT NULL,

    description TEXT,

    tags VARCHAR(500),

    date DATETIME
    DEFAULT CURRENT_TIMESTAMP,

    image_path VARCHAR(500)
    NOT NULL

)

";


if (
    !mysqli_query(
        $conn,
        $createNotesTable
    )
) {

    sendResponse(
        false,
        "Could not create notes table."
    );

}


// ========================================
// GET FORM DATA
// ========================================

$title =
    trim($_POST["title"] ?? "");

$subject =
    trim($_POST["subject"] ?? "");

$description =
    trim($_POST["description"] ?? "");

$tags =
    trim($_POST["tags"] ?? "");


// ========================================
// VALIDATE TITLE
// ========================================

if ($title === "") {

    sendResponse(
        false,
        "Please enter a title."
    );

}


if (strlen($title) > 255) {

    sendResponse(
        false,
        "Title is too long."
    );

}


// ========================================
// VALIDATE SUBJECT
// ========================================

if ($subject === "") {

    sendResponse(
        false,
        "Please select a subject."
    );

}


if (strlen($subject) > 150) {

    sendResponse(
        false,
        "Subject name is too long."
    );

}


// ========================================
// SAVE SUBJECT
// ========================================

$subjectSql = "

INSERT IGNORE INTO subjects
(subject_name)

VALUES (?)

";


$subjectStmt =
    mysqli_prepare(
        $conn,
        $subjectSql
    );


if (!$subjectStmt) {

    sendResponse(
        false,
        "Could not prepare subject query."
    );

}


mysqli_stmt_bind_param(
    $subjectStmt,
    "s",
    $subject
);


if (
    !mysqli_stmt_execute(
        $subjectStmt
    )
) {

    mysqli_stmt_close(
        $subjectStmt
    );

    sendResponse(
        false,
        "Could not save subject."
    );

}


mysqli_stmt_close(
    $subjectStmt
);


// ========================================
// CHECK FILE
// ========================================

if (
    !isset($_FILES["noteFile"])
) {

    sendResponse(
        false,
        "Please select a PDF file."
    );

}


$file =
    $_FILES["noteFile"];


// ========================================
// CHECK UPLOAD ERROR
// ========================================

if (
    $file["error"] !== UPLOAD_ERR_OK
) {

    sendResponse(
        false,
        "File upload failed. Error code: " .
        $file["error"]
    );

}


// ========================================
// CHECK FILE SIZE
// ========================================

$maxFileSize =
    20 * 1024 * 1024;


if (
    $file["size"] > $maxFileSize
) {

    sendResponse(
        false,
        "File size cannot exceed 20MB."
    );

}


// ========================================
// CHECK EMPTY FILE
// ========================================

if ($file["size"] <= 0) {

    sendResponse(
        false,
        "The selected file is empty."
    );

}


// ========================================
// CHECK FILE EXTENSION
// ========================================

$extension =
    strtolower(
        pathinfo(
            $file["name"],
            PATHINFO_EXTENSION
        )
    );


if (
    $extension !== "pdf"
) {

    sendResponse(
        false,
        "Only PDF files are allowed."
    );

}


// ========================================
// CHECK MIME TYPE
// ========================================

$finfo =
    finfo_open(
        FILEINFO_MIME_TYPE
    );


if (!$finfo) {

    sendResponse(
        false,
        "Could not check file type."
    );

}


$mimeType =
    finfo_file(
        $finfo,
        $file["tmp_name"]
    );


finfo_close($finfo);


if (
    $mimeType !== "application/pdf"
) {

    sendResponse(
        false,
        "Invalid PDF file."
    );

}


// ========================================
// CREATE NOTES FOLDER
// ========================================

$notesFolder =
    "../NOTES/";


if (
    !is_dir($notesFolder)
) {

    if (
        !mkdir(
            $notesFolder,
            0755,
            true
        )
    ) {

        sendResponse(
            false,
            "Could not create NOTES folder."
        );

    }

}


// ========================================
// CREATE USER FOLDER
// ========================================

$userFolder =
    $notesFolder .
    $user_id .
    "/";


if (
    !is_dir($userFolder)
) {

    if (
        !mkdir(
            $userFolder,
            0755,
            true
        )
    ) {

        sendResponse(
            false,
            "Could not create user folder."
        );

    }

}


// ========================================
// CREATE UNIQUE FILE NAME
// ========================================

$fileName =
    "note_" .
    uniqid("", true) .
    "_" .
    bin2hex(
        random_bytes(5)
    ) .
    ".pdf";


// ========================================
// FULL FILE PATH
// ========================================

$filePath =
    $userFolder .
    $fileName;


// ========================================
// MOVE UPLOADED FILE
// ========================================

if (
    !move_uploaded_file(
        $file["tmp_name"],
        $filePath
    )
) {

    sendResponse(
        false,
        "Could not save PDF."
    );

}


// ========================================
// DATABASE FILE PATH
// ========================================

$dbFilePath =
    "NOTES/" .
    $user_id .
    "/" .
    $fileName;


// ========================================
// INSERT NOTE
// ========================================

$sql = "

INSERT INTO notes
(
    user_id,
    title,
    subject,
    description,
    tags,
    date,
    image_path
)

VALUES
(
    ?,
    ?,
    ?,
    ?,
    ?,
    NOW(),
    ?
)

";


$stmt =
    mysqli_prepare(
        $conn,
        $sql
    );


if (!$stmt) {

    // Delete uploaded file

    if (
        file_exists($filePath)
    ) {

        unlink($filePath);

    }


    sendResponse(
        false,
        "Database error: Could not prepare query."
    );

}


// ========================================
// BIND VALUES
// ========================================

mysqli_stmt_bind_param(
    $stmt,
    "isssss",
    $user_id,
    $title,
    $subject,
    $description,
    $tags,
    $dbFilePath
);


// ========================================
// SAVE NOTE
// ========================================

if (
    mysqli_stmt_execute($stmt)
) {

    $pdf_id =
        mysqli_insert_id($conn);


    mysqli_stmt_close($stmt);

    mysqli_close($conn);


    sendResponse(
        true,
        "Note uploaded successfully.",
        [
            "pdf_id" =>
                $pdf_id,

            "file_path" =>
                $dbFilePath,

            "subject" =>
                $subject
        ]
    );

}


// ========================================
// DATABASE INSERT FAILED
// ========================================

$error =
    mysqli_stmt_error($stmt);


mysqli_stmt_close($stmt);


// Delete uploaded file

if (
    file_exists($filePath)
) {

    unlink($filePath);

}


mysqli_close($conn);


sendResponse(
    false,
    "Could not save note. " .
    $error
);

?>