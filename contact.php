<?php
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
        <link rel="stylesheet" href="css/style.css">
        <title>Contact</title>
    </head>
    <body>
        <?php
            include('partials/header.php');
        ?>
        <div class="container">
            <section class="articles">
                <div class="column is-8 is-offset-2">
                    <section class="hero is-info is-bold is-small promo-block">
                        <div class="hero-body">
                            <div class="container">
                                <h1 class="title">
                                    <i class="fa fa-bell-o"></i> Nemo enim ipsam voluptatem quia.</h1>
                                <span class="tag is-black is-medium is-rounded">
                                    Natus error sit voluptatem
                                </span>
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
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Accumsan lacus vel facilisis volutpat est velit egestas. Sapien eget mi proin sed. Sit amet mattis vulputate enim.
                                </p>
                                <p>
                                    Commodo ullamcorper a lacus vestibulum sed arcu. Fermentum leo vel orci porta non. Proin fermentum leo vel orci porta non pulvinar. Imperdiet proin fermentum leo vel. Tortor posuere ac ut consequat semper viverra. Vestibulum lectus mauris ultrices eros.
                                </p>
                                <h3 class="has-text-centered">“Everyone should be able to do one card trick, tell two jokes, and recite three poems, in case they are ever trapped in an elevator.”</h3>
                                <p>
                                    In eu mi bibendum neque egestas congue quisque egestas diam. Enim nec dui nunc mattis enim ut tellus. Ut morbi tincidunt augue interdum velit euismod in. At in tellus integer feugiat scelerisque varius morbi enim nunc. Vitae suscipit tellus mauris a diam.
                                    Arcu non sodales neque sodales ut etiam sit amet.
                                </p>
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


