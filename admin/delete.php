<?php
    // Start session
    session_start();

    // Can I even visit this page
    if (!isset($_SESSION['loggedInUser'])) {
        header("Location: login.php");
        exit;
    }

    // Database variable
    /** @var mysqli $db */

    require_once "../includes/database.php";

    // Check if form submit has been clicked
    if (isset($_POST['submit'])) {
        // Get id from previous page
        $id = mysqli_escape_string($db, $_POST['id']);
        // Get all data by id
        $query = "SELECT * FROM reservations WHERE id = '$id'";
        $result = mysqli_query($db, $query) or die ('Error: ' . $query);

        $reservationView = mysqli_fetch_assoc($result);

        // Delete data
        $query = "DELETE FROM reservations WHERE id = '$id'";
        mysqli_query($db, $query) or die ('Error: ' . mysqli_error($db));

        // Close connection
        mysqli_close($db);

        // Redirect to homepage after deletion and exit script
        header("Location: index.php");
        exit;

    } else if (isset($_GET['id']) || $_GET['id'] != '') {
        // Retrieve id
        $id = mysqli_escape_string($db, $_GET['id']);

        // Get the record from the database result
        $query = "SELECT * FROM reservations WHERE id = '$id'";
        $result = mysqli_query($db, $query) or die ('Error: ' . $query);

        // Check if there is ONE result
        if (mysqli_num_rows($result) == 1) {
            $reservationView = mysqli_fetch_assoc($result);
        } else {
            // Redirect when db returns no result
            header('Location: index.php');
            exit;
        }
    } else {
        // Redirect to index.php
        header('Location: index.php');
        exit;
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://kit.fontawesome.com/335a0c3dec.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title>Verwijder afspraak</title>
    </head>
    <body>
        <?php
            include('../partials/header.php');
        ?>
            <div class="container is-max-widescreen">
                <div class="content">
                    <form action="" method="post">
                        <div class="notification ">
                            <span class="has-text-centered is-size-5">Weet je zeker dat je de volgende reservering wilt verwijderen: </span>
                            <br>
                            <ul>
                                Naam:<li><?= $reservationView['name'] ?></li>
                                <li><?= $reservationView['email'] ?></li>
                                <li><?= $reservationView['phone'] ?></li>
                                <li><?= $reservationView['note'] ?></li>
                                <li><?= $reservationView['reservation_date']?></li>
                            </ul>
                            <input class="button" type="hidden" name="id" value="<?= $reservationView['id'] ?>"/>
                            <div class="buttons are-small">
                                <input class="button is-danger" type="submit" name="submit" value="Verwijderen"/>
                                <input class="button" onclick="history.back()" value="Terug"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
            include('../partials/footer.php');
        ?>
    </body>
</html>


