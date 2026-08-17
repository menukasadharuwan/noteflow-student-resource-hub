<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "noteflow";

// Connect to database
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database connection error: " . mysqli_connect_error());
}

// Check if table exists
$check = mysqli_query($conn, "SHOW TABLES LIKE 'users'");

if (mysqli_num_rows($check) > 0) {

    //echo "Users table already exists.";

} else {

    // check table does not exist
    $sql = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Users table created successfully.";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
}



?>