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
                        </div>
                    </div>
                </div>
                <div class="column is-one-quarter"></div>
            </div>
        </form>
        <?php
            include('partials/footer.php');
        ?>
        <!--        <div class="container">-->
        <!--            <section class="articles">-->
        <!--                <div class="column is-8 is-offset-2">-->
        <!--                    <section class="hero is-info is-bold is-small promo-block">-->
        <!--                        <div class="hero-body">-->
        <!--                            <div class="container">-->
        <!--                                <h1 class="title">-->
        <!--                                    <i class="fa fa-envelope"></i> Neem contact op-->
        <!--                                </h1>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </section>-->
        <!--                    <div class="card article">-->
        <!--                        <div class="card-content">-->
        <!--                            <div class="content article-body">-->
        <!--                                <form method="POST" action="form.php" id="contact-form">-->
        <!--                                    <h2>Contact us</h2>-->
        <!--                                    <p><label>First Name:</label> <input name="name" type="text" /></p>-->
        <!--                                    <p><label>Email Address:</label> <input style="cursor: pointer;" name="email" type="text" /></p>-->
        <!--                                    <p><label>Message:</label>  <textarea name="message"></textarea> </p>-->
        <!---->
        <!--                                    <p><input type="submit" value="Send" /></p>-->
        <!--                                </form>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </section>-->
        <!--        </div>-->
    </body>
</html>


