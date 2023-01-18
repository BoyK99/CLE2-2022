<?php
    // Start session
    session_start();

    // Database variable
    /** @var mysqli $db */

    // Can I even visit this page?
    if (!isset($_SESSION['loggedInUser'])) {
        header("Location: ../login.php");
        exit;
    }

    // Checks the current date
    $today = strtotime(date('F jS, Y'));

    // Require database in this file
    require_once(__DIR__ . '/../includes/database.php');

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
        <link rel="stylesheet" href="../css/style.css">
        <title>Overzicht - Admin </title>
    </head>
    <body>
        <?php
            include(__DIR__ . '/../partials/header.php');
        ?>
        <div class="tile is-ancestor main-padding">
            <div class="tile is-parent">
                <article class="message tile is-child">
                    <div class="message-header">
                        Komende afspraken
                    </div>
                    <div class="message-body">
                        <div class="table__wrapper">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Naam</th>
                                        <th>Email</th>
                                        <th>Telefoon</th>
                                        <th>Datum</th>
                                        <th>Notitie</th>
                                        <th>Wijzig</th>
                                        <th>Verwijderen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reservationLists as $reservation) {
                                        if(strtotime($reservation['reservation_date']) >= $today ) { ?>
                                            <tr id="selected-row">
                                                <td><?= $reservation['name'] ?></td>
                                                <td><?= $reservation['email'] ?> </td>
                                                <td><?= $reservation['phone'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($reservation['reservation_date'])); ?></td>
                                                <td><?= $reservation['note'] ?></td>
                                                <td>
                                                    <a href="edit.php?id=<?= $reservation['id'] ?>" class="icon">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="delete.php?id=<?= $reservation['id'] ?>" class="icon">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php } }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </article>
            </div>
            <div class="tile is-4 is-vertical is-parent">
                    <article class="message tile is-child">
                        <div class="message-header">
                            !HELP?
                        </div>
                        <div class="message-body">
                            wat komt hier?
                        </div>
                    </article>
                    <article class="message tile is-child">
                        <div class="message-header">
                            !HELP?
                        </div>
                        <div class="message-body">
                            wat komt hier?
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <?php
            include(__DIR__ . '/../partials/footer.php');
        ?>
    </body>
</html>







