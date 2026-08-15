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

            <div class="title-line"></div>

            <form action="#" method="POST">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Enter username"
                    >
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter name"
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter email"
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