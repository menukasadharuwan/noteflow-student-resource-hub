
<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "noteflow";

/* Connect to MySQL database */
$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);

/* Check connection */
if (!$conn) {
    die("Database connection error: " . mysqli_connect_error());
}

/* Set character encoding */
mysqli_set_charset($conn, "utf8mb4");

?>
