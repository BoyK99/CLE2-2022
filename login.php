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
        <title>Login</title>
    </head>
    <body>
        <!-- Header partial -->
        <?php
            include('partials/header.php');
        ?>

        <!-- Login partial -->
        <?php
            include('partials/login.php');
        ?>

        <!-- Footer partial -->
        <?php
            include('partials/footer.php');
        ?>
    </body>
</html>