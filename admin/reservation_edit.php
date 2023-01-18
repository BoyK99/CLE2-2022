<?php
    // Start session, get form data to display in HTML
    session_start();

    // Can I even visit this page
    if (!isset($_SESSION['loggedInUser'])) {
        header("Location: login.php");
        exit;
    }

    // Database variable
    /** @var mysqli $db */

    require_once "../includes/database.php";
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
        <title>Afspraak wijzigen gelukt - Admin</title>
    </head>
    <body>
        <?php
            include('../partials/header.php');
        ?>
        <h1> Overzicht reserving</h1>
        <ul>
            <li>Naam:                   <?= $_SESSION['form-data-edit-admin']['name'] ?></li>
            <li>Email:                  <?= $_SESSION['form-data-edit-admin']['email'] ?></li>
            <li>Datum:                  <?= $_SESSION['form-data-edit-admin']['reservation_date'] ?></li>
            <li>Telefoon:               <?= $_SESSION['form-data-edit-admin']['phone'] ?></li>
            <li>Verificatie code:       <?= $_SESSION['form-data-edit-admin']['code'] ?></li>
            <li>Opdracht:               <?= $_SESSION['form-data-edit-admin']['note'] ?></li>
        </ul>
        Reservering wijzigen is gelukt!
        <br>
        <a href="index.php">Terug naar overzicht</a>
        <?php
            include('../partials/footer.php');
        ?>
    </body>
</html>
