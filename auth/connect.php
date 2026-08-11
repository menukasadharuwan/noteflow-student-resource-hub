<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "noteflow";

//make database connection
$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn){
    die("database connection error " . mysqli_connect_error());
}else{
    echo "connect successfull";
}





?>