<?php

require_once "../auth/connect.php";
require_once __DIR__ . "/../auth/session.php"; 



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_SESSION["user_id"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    //check email and username alredy exits
    $chk_email = "SELECT id FROM users WHERE email ='$email' ";
    $chk_username = "SELECT id FROM users WHERE username ='$username' ";

    $email_result = $conn->query($chk_email);
    $username_result = $conn->query($chk_username);

    //check email exits
    if($email_result->num_rows > 0){
        header("Location: edit.php?error=Email alredy exits!");
        exit();
    }

    //check username exits
    if($username_result->num_rows > 0){
        header("Location: edit.php?error=Username alredy exits!");
        exit();
    }




    $sql = "UPDATE users SET username = ?, name = ?, email = ?, password = ?  WHERE id = ?";

    $stmt = $conn->prepare($sql);



    $stmt->bind_param("ssssi", $username, $name, $email, $password, $id);

    if ($stmt->execute()) {

        //update session
        $_SESSION["name"] = $name;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;

        $message = "Profile updated successfully!";
       // echo "done";
    } else {
        $message = "Update failed!";
    }
}

?>