<?php

/* Start session */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/* Database connection */

require_once "connect.php";


/* Handle POST requests */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $action = $_POST["action"] ?? "";


    /* Register */

    if ($action === "register") {

        $name = trim($_POST["name"] ?? "");

        $username = trim($_POST["username"] ?? "");

        $email = trim($_POST["email"] ?? "");

        $password = $_POST["password"] ?? "";

        $repassword = $_POST["repassword"] ?? "";


        /* Check required fields */

        if (
            empty($name) ||
            empty($username) ||
            empty($email) ||
            empty($password) ||
            empty($repassword)
        ) {

            header(
                "Location: signup.php?error=Please fill in all fields."
            );

            exit();

        }


        /* Check email */

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            header(
                "Location: signup.php?error=Please enter a valid email."
            );

            exit();

        }


        /* Check if email already exists */

        $sql = "SELECT id FROM users WHERE email = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "s",
            $email
        );

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();


        if ($result->num_rows > 0) {

            header(
                "Location: signup.php?error=Email already exists. Try another email."
            );

            exit();

        }


        /* Check username */

        $sql = "SELECT id FROM users WHERE username = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "s",
            $username
        );

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();


        if ($result->num_rows > 0) {

            header(
                "Location: signup.php?error=Username already exists. Try another username."
            );

            exit();

        }


        /* Check password */

        if (empty($password)) {

            header(
                "Location: signup.php?error=Password is empty. Try again."
            );

            exit();

        }


        /* Check password match */

        if ($password !== $repassword) {

            header(
                "Location: signup.php?error=Your password does not match. Try again."
            );

            exit();

        }


        /* Hash password */

        $hash_password = password_hash(
            $password,
            PASSWORD_DEFAULT
        );


        /* Insert user */

        $sql = "
            INSERT INTO users
            (
                username,
                email,
                password,
                name
            )
            VALUES
            (?, ?, ?, ?)
        ";


        $save_data = $conn->prepare($sql);

        $save_data->bind_param(
            "ssss",
            $username,
            $email,
            $hash_password,
            $name
        );


        if ($save_data->execute()) {

            $save_data->close();

            header(
                "Location: login.php"
            );

            exit();

        } else {

            $save_data->close();

            header(
                "Location: ../index.php?error=Failed to create account. Try again."
            );

            exit();

        }

    }


    /* Login */

    if ($action === "login") {

        $email = trim($_POST["email"] ?? "");

        $password = $_POST["password"] ?? "";


        /* Check email */

        if (empty($email)) {

            header(
                "Location: login.php?error=Email is empty. Enter your email."
            );

            exit();

        }


        /* Check password */

        if (empty($password)) {

            header(
                "Location: login.php?error=Password is empty. Enter password."
            );

            exit();

        }


        /* Find user */

        $sql = "
            SELECT
                id,
                username,
                email,
                password,
                name
            FROM users
            WHERE email = ?
        ";


        $connect = $conn->prepare($sql);

        $connect->bind_param(
            "s",
            $email
        );

        $connect->execute();


        $result = $connect->get_result();


        /* User found */

        if ($result->num_rows > 0) {

            $user = $result->fetch_assoc();


            /* Check password */

            if (
                password_verify(
                    $password,
                    $user["password"]
                )
            ) {

                /* Regenerate session ID */

                session_regenerate_id(true);


                /* Save user information */

                $_SESSION["user_id"] =
                    $user["id"];

                $_SESSION["username"] =
                    $user["username"];

                $_SESSION["email"] =
                    $user["email"];

                $_SESSION["name"] =
                    $user["name"];


                $connect->close();


                /* Login success */

                header(
                    "Location: ../index.php"
                );

                exit();

            } else {

                $connect->close();


                header(
                    "Location: login.php?error=Wrong password."
                );

                exit();

            }

        } else {

            $connect->close();


            header(
                "Location: login.php?error=User not found."
            );

            exit();

        }

    }

}

?>