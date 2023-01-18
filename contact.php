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
    </body>
</html>


