<?php
    // Start session
    session_start();
    include('includes/globals.php');
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://kit.fontawesome.com/335a0c3dec.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        <link rel="favicon" href="favicon.png">
        <link rel="stylesheet" href="css/style.css">
        <title>Hoofdpagina</title>
    </head>
    <body>
        <?php
            include('partials/header.php');
        ?>
        <div class="container">
            <section class="articles">
                <div class="column is-8 is-offset-2">
                    <section class="hero is-info is-bold is-small">
                        <div class="hero-body">
                            <div class="container">
                                <h1 class="title">
                                    <i class="fa fa-calendar-o"></i> Maak een afspraak.</h1>
                            </div>
                        </div>
                    </section>
                    <div class="card article">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-center">
                                    <img src="https://res.cloudinary.com/ameo/image/upload/v1639144778/typocat_svbspx.png" class="author-image" alt="Placeholder image">
                                </div>
                                <div class="media-content has-text-centered">
                                    <p class="title article-title">Cras tincidunt lobortis feugiat vivamus.</p>
                                    <p class="subtitle is-6 article-subtitle">
                                        <a href="#">@angela</a> on October 7, 202X
                                    </p>
                                </div>
                            </div>
                            <div class="content article-body">
                                <input class="button is-small" onclick="location.href='reservation.php';" value="Maak een afspraak"/>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php
            include('partials/footer.php');
        ?>
    </body>
</html>