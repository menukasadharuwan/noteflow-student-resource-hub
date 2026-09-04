<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "noteflow";


/* Connect to MySQL */

$conn = mysqli_connect(
    $host,
    $user,
    $password
);


if (!$conn) {

    die(
        "Database connection error: " .
        mysqli_connect_error()
    );

}


/* Create database */

$sql = "CREATE DATABASE IF NOT EXISTS `$database`";

if (!mysqli_query($conn, $sql)) {

    die(
        "Database creation error: " .
        mysqli_error($conn)
    );

}


/* Select database */

mysqli_select_db(
    $conn,
    $database
);


/* Set character encoding */

mysqli_set_charset(
    $conn,
    "utf8mb4"
);


/* Create users table */

$sql = "

CREATE TABLE IF NOT EXISTS users (

    id INT AUTO_INCREMENT PRIMARY KEY,

    username VARCHAR(100) NOT NULL UNIQUE,

    name VARCHAR(100) NOT NULL,

    email VARCHAR(150) NOT NULL UNIQUE,

    password VARCHAR(255) NOT NULL

)

";

if (!mysqli_query($conn, $sql)) {

    die(
        "Users table error: " .
        mysqli_error($conn)
    );

}


/* Create subjects table */

$sql = "

CREATE TABLE IF NOT EXISTS subjects (

    subject_id INT AUTO_INCREMENT PRIMARY KEY,

    subject_name VARCHAR(100) NOT NULL UNIQUE

)

";

if (!mysqli_query($conn, $sql)) {

    die(
        "Subjects table error: " .
        mysqli_error($conn)
    );

}


/* Insert default subjects */

$subjects = [

    "Programming",
    "Mathematics",
    "Business",
    "Science",
    "Language"

];


foreach ($subjects as $subject) {

    $stmt = mysqli_prepare(
        $conn,
        "INSERT IGNORE INTO subjects (subject_name)
         VALUES (?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $subject
    );

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

}


/* Create notes table */

$sql = "

CREATE TABLE IF NOT EXISTS notes (

    pdf_id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL,

    title VARCHAR(255) NOT NULL,

    subject VARCHAR(100) NOT NULL,

    description TEXT,

    tags VARCHAR(255),

    date DATETIME DEFAULT CURRENT_TIMESTAMP,

    image_path VARCHAR(500) NOT NULL,

    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE

)

";

if (!mysqli_query($conn, $sql)) {

    die(
        "Notes table error: " .
        mysqli_error($conn)
    );

}


/* Create messages table */

$sql = "

CREATE TABLE IF NOT EXISTS messages (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL,

    email VARCHAR(150) NOT NULL,

    subject VARCHAR(255) NOT NULL,

    message TEXT NOT NULL,

    created_at DATETIME DEFAULT CURRENT_TIMESTAMP

)

";

if (!mysqli_query($conn, $sql)) {

    die(
        "Messages table error: " .
        mysqli_error($conn)
    );

}

?>