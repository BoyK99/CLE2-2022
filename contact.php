<?php
    include('includes/globals.php');

    function strip_crlf($string)
    {
        return str_replace("\r\n", "", $string);
    }

    if (!empty($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];


        $toEmail = "1026544@hr.nl";
        // CRLF Injection attack protection
        $name = strip_crlf($name);
        $email = strip_crlf($email);
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "The email address is invalid.";
        } else {
            // appending \r\n at the end of mailheaders for end
            $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
            if (mail($toEmail, $subject, $mailHeaders)) {
                $message = "Your contact information is received successfully.";
                $type = "success";
            }
        }
    }
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
        <form method="post" action="includes/send-email.php">
            <div class="columns is-tablet">
                <div class="column is-one-quarter--"></div>
                <div class="column custom-color">
                    <div class="field">
                        <label class="label">Naam</label>
                        <div class="control">
                            <input class="input" name="name" type="text" placeholder="Naam">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" name="email" type="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Onderwerp</label>
                        <div class="control">
                            <input class="input" name="subject" type="text" placeholder="Onderwerp">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Bericht</label>
                        <div class="control">
                            <textarea class="textarea has-fixed-size" name="message" type="password" placeholder="Bericht"></textarea>
                        </div>
                    </div>
                    <div class="field is-grouped pt-5">
                        <div class="control">
                            <button class="button submit" name="submit">Verstuur</button>
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
                                    Arcu non sodales neque sossdales ut etiam sit amet.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-one-quarter"></div>
            </div>
        </form>
        <?php
            include('partials/footer.php');
        ?>
    </body>
</html>


