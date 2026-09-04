<?php

require_once "../auth/connect.php";

$messageStatus = "";
$messageType = "";


/* Handle contact form */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");

    $email = trim($_POST["email"] ?? "");

    $subject = trim($_POST["subject"] ?? "");

    $message = trim($_POST["message"] ?? "");


    /* Validate fields */

    if (
        empty($name) ||
        empty($email) ||
        empty($subject) ||
        empty($message)
    ) {

        $messageStatus = "Please fill in all fields.";

        $messageType = "error";

    }


    /* Validate email */

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $messageStatus = "Please enter a valid email address.";

        $messageType = "error";

    }


    else {

        /* Insert message */

        $sql = "

            INSERT INTO messages
            (
                name,
                email,
                subject,
                message
            )

            VALUES
            (?, ?, ?, ?)

        ";


        $stmt = mysqli_prepare(
            $conn,
            $sql
        );


        if ($stmt) {

            mysqli_stmt_bind_param(
                $stmt,
                "ssss",
                $name,
                $email,
                $subject,
                $message
            );


            if (mysqli_stmt_execute($stmt)) {

                $messageStatus =
                    "Your message has been sent successfully!";

                $messageType = "success";


                /* Clear form values */

                $name = "";
                $email = "";
                $subject = "";
                $message = "";

            }

            else {

                $messageStatus =
                    "Something went wrong. Please try again.";

                $messageType = "error";

            }


            mysqli_stmt_close($stmt);

        }

        else {

            $messageStatus =
                "Unable to process your message.";

            $messageType = "error";

        }

    }

}

?>

<!doctype html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Contact | Student Resource Hub
    </title>


    <link rel="stylesheet" href="../css/contact.css">

    <link rel="stylesheet" href="../css/navbar.css">

    <link rel="stylesheet" href="../css/footer.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>


<body>


    <!-- Navigation bar -->

    <?php require_once "navbar.php"; ?>


    <main>

        <section class="contact-section">


            <!-- Left side -->

            <div class="contact-info">

                <h2>
                    GET IN TOUCH
                </h2>


                <p class="contact-text">

                    Have questions or suggestions?<br>

                    We'd love to hear from you.

                </p>


                <div class="info-box">

                    <div class="icon">

                        <i class="bi bi-envelope-fill"></i>

                    </div>


                    <div>

                        <h4>
                            Email
                        </h4>

                        <p>
                            info@srhub.com
                        </p>

                    </div>

                </div>


                <div class="info-box">

                    <div class="icon">

                        <i class="bi bi-telephone-fill"></i>

                    </div>


                    <div>

                        <h4>
                            Phone
                        </h4>

                        <p>
                            +94 71 987 6543
                        </p>

                    </div>

                </div>


                <div class="info-box">

                    <div class="icon">

                        <i class="bi bi-geo-alt-fill"></i>

                    </div>


                    <div>

                        <h4>
                            Address
                        </h4>

                        <p>

                            123 College Street,<br>

                            Colombo, Sri Lanka

                        </p>

                    </div>

                </div>


                <h3 class="follow-title">
                    Follow Us
                </h3>


                <div class="social-icons">

                    <a href="#">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-linkedin"></i>
                    </a>

                </div>

            </div>


            <!-- Right side -->

            <div class="contact-form">

                <h2>
                    SEND US A MESSAGE
                </h2>


                <?php if (!empty($messageStatus)): ?>

                <div class="form-message <?= $messageType ?>">

                    <?= htmlspecialchars(
                            $messageStatus
                        ) ?>

                </div>

                <?php endif; ?>


                <form method="POST" action="">


                    <!-- Name -->

                    <div class="input-box">

                        <i class="bi bi-person-fill"></i>


                        <input type="text" name="name" placeholder="Your Name" value="<?= htmlspecialchars(
                                $name ?? ""
                            ) ?>" required>

                    </div>


                    <!-- Email -->

                    <div class="input-box">

                        <i class="bi bi-envelope-fill"></i>


                        <input type="email" name="email" placeholder="Your Email" value="<?= htmlspecialchars(
                                $email ?? ""
                            ) ?>" required>

                    </div>


                    <!-- Subject -->

                    <div class="input-box">

                        <i class="bi bi-file-earmark-text-fill"></i>


                        <input type="text" name="subject" placeholder="Subject" value="<?= htmlspecialchars(
                                $subject ?? ""
                            ) ?>" required>

                    </div>


                    <!-- Message -->

                    <div class="input-box textarea">

                        <i class="bi bi-pencil-fill"></i>


                        <textarea name="message" placeholder="Your Message" required><?= htmlspecialchars(
                            $message ?? ""
                        ) ?></textarea>

                    </div>


                    <!-- Submit -->

                    <button type="submit" class="send-btn">

                        Send Message

                        <i class="bi bi-send-fill"></i>

                    </button>


                </form>

            </div>


        </section>

    </main>


    <!-- Footer -->

    <?php require_once "footer.php"; ?>


</body>

</html>