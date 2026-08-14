<?php

require_once __DIR__ . "/../auth/session.php";

// If user is not logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: /Noteflow/auth/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile - NoteFlow</title>

    <link rel="stylesheet" href="/Noteflow/css/profile.css">
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/footer.css" />
</head>

<body>

    <!--Navigation Bar-->
    <?php require_once "navbar.php" ?>


    <main class="profile-page">

        <div class="profile-container">

            <!-- Profile header -->
            <div class="profile-header">

                <div class="profile-picture">
                    <img src="/Noteflow/images/profile.jpg" alt="Profile Picture">
                </div>

                <div class="profile-heading">
                    <span class="profile-label">MY PROFILE</span>

                    <h1>
                        <?php echo htmlspecialchars($_SESSION["name"]); ?>
                    </h1>

                    <p>Manage your personal account information.</p>
                </div>

            </div>


            <!-- Profile information -->
            <div class="profile-content">

                <div class="section-title">
                    <h2>Personal Information</h2>
                    <p>Your account details are shown below.</p>
                </div>


                <div class="profile-details">

                    <!-- Name -->
                    <div class="info-card">

                        <div class="info-icon">
                            👤
                        </div>

                        <div class="info-content">
                            <span>Full Name</span>

                            <h3>
                                <?php
                                echo htmlspecialchars($_SESSION["name"]);
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
                            <span>Username</span>

                            <h3>
                                <?php
                                echo htmlspecialchars($_SESSION["username"]);
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
                            <span>Email Address</span>

                            <h3>
                                <?php
                                echo htmlspecialchars($_SESSION["email"]);
                                ?>
                            </h3>
                        </div>

                    </div>

                </div>


                <!-- Account -->

                <div class="account-actions">

                    <div>
                        <h3>Account Actions</h3>
                        <p>You can securely sign out of your NoteFlow account.</p>
                    </div>

                    <a href="/Noteflow/auth/logout.php"
                       class="logout-btn"
                       id="logout-btn">

                        <span>↪</span>
                        Logout

                    </a>

                </div>

            </div>

        </div>

    </main>


    <!-- Footer -->
    <?php require_once "footer.php"; ?>

    <script src="/Noteflow/js/profile.js"></script>

</body>
</html>