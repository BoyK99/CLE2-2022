<?php
    // Start session
    session_start();
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
        <title> IDK YET </title>
    </head>
    <body>
        <?php
            include('partials/header.php');
        ?>
        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <div class="tile is-child box notification is-warning">
                    <p class="title">Third Tile</p>
                </div>
            </div>
            <div class="tile is-4 is-vertical is-parent">
                <div class="tile is-child box notification is-primary">
                    <p class="title">First Tile</p>
                </div>
                <div class="tile is-child box notification is-info">
                    <p class="title">Second Tile</p>
                </div>
            </div>
        </div>
        <?php
            include('partials/footer.php');
        ?>
    </body>
</html>







