<?php require_once __DIR__ . "/../auth/session.php";  ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NoteFlow Change Details</title>

    <link rel="stylesheet" href="../css/edit.css">
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/footer.css" />
</head>

<body>

<?php require_once("navbar.php") ?>

    <div class="edit-page">

        <div class="details-form">

            <h2>Change Details</h2>

            <?php

          if (isset($_GET["error"])) {
            echo "<p id='php-error'>" . htmlspecialchars($_GET["error"]) . "</p>";
            }
          ?>
          
            <div class="title-line"></div>

            <form action="change_details.php" method="POST">

                <div class="form-group">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Enter name"
                            value="<?php echo htmlspecialchars($_SESSION["name"]) ?>"
                        >
                    </div>
                    <label for="username">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Enter username"
                        value="<?php echo htmlspecialchars($_SESSION["username"]) ?>"
                    >
                    <input type="hidden" name="action" value="edit">
                </div>


                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter email"
                        value="<?php echo htmlspecialchars($_SESSION["email"]) ?>"
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter password"
                    >
                </div>

                <button type="submit">
                    Save Changes
                </button>

            </form>

        </div>

    </div>


    <?php require_once "footer.php"; ?>

    
</body>
</html>