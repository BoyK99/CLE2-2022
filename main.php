<?php
    // Start session
    session_start();

    // Database variable
    /** @var mysqli $db */

    // Can I even visit this page?
    if (!isset($_SESSION['loggedInUser'])) {
        header("Location: login.php");
        exit;
    }

    // Require database in this file
    require_once "includes/database.php";

    // Get the result set from the database with a SQL query
    $query = "SELECT * FROM reservations";
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);

    // Loop through the result to create a custom array
    $reservationLists = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $reservationLists[] = $row;
    }

    // Close db connection
    mysqli_close($db);
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://kit.fontawesome.com/335a0c3dec.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title> Overzicht </title>
    </head>
    <body>
        <?php
            include('partials/header.php');
        ?>
        <!--        <div class="tile is-ancestor">-->
            <div class="tile is-parent">
                <article class="message tile is-child">
                    <div class="message-header">
                        Komende afspraken
                    </div>
                    <div class="message-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Naam</th>
                                    <th>Email</th>
                                    <th>Datum</th>
                                    <th>Notitie</th>
                                    <th>Gedaan</th>
                                    <th>Verwijderen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservationLists as $reservation) { ?>
                                    <tr id="selected-row">
                                        <td><?= $reservation['name'] ?></td>
                                        <td><?= $reservation['email'] ?> </td>
                                        <td><?= $reservation['date'] ?> </td>
                                        <td><?= $reservation['note'] ?></td>
                                        <td>TODO: markeer als gedaan</td>
                                        <td>
                                            <a href="admin/delete.php?id=<?= $reservation['id'] ?>">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </article>
                <article class="message tile is-child">
                    <div class="message-header">
                        Komende afspraken
                    </div>
                    <div class="message-body">
                    </div>
                </article>
                <article class="message tile is-child">
                    <div class="message-header">
                        Komende afspraken
                    </div>
                    <div class="message-body">
                    </div>
                </article>
            </div>
        </div>
        <?php
            include('partials/footer.php');
        ?>
    </body>
</html>







