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
        <link rel="stylesheet" href="css/style.css">
        <title>Contact</title>
    </head>
    <body>
    <?php
    include('partials/header.php');
    ?>
    <div class="columns is-tablet">
        <div class="column is-one-quarter "></div>
        <div class="column custom-color">
            <form method="post" action="includes/send-email.php">
                <!-- Naam field -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label for="name" class="label">Naam</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="name" type="text" placeholder="Naam">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Email field -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label for="email" class="label">Email</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="email" type="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Onderwerp field -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label for="subject" class="label">Onderwerp</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="subject" type="text" placeholder="Onderwerp">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bericht field -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label for="message" class="label">Bericht</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea has-fixed-size" name="message" type="password"
                                          placeholder="Bericht"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- Submit button -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal"></div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <button name="submit" type="submit" value="Reserveer"
                                        class="button is-primary">
                                    Verstuur
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        <div class="column is-one-quarter"></div>
    </div>
    <?php
        include('partials/footer.php');
    ?>
    </body>


    <!--                <div class="field is-horizontal">-->
    <!--                    <div class="field-label is-normal">-->
    <!--                        <label class="label">Naam</label>-->
    <!--                    </div>-->
    <!--                    <div class="control">-->
    <!--                        <input class="input" name="name" type="text" placeholder="Naam">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="field is-horizontal">-->
    <!--                    <div class="field-label is-normal">-->
    <!--                        <label class="label">Email</label>-->
    <!--                    </div>-->
    <!--                    <div class="control">-->
    <!--                        <input class="input" name="email" type="email" placeholder="Email">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="field is-horizontal">-->
    <!--                    <div class="field-label is-normal">-->
    <!--                        <label class="field-label is-normal">Onderwerp</label>-->
    <!--                    </div>-->
    <!--                    <div class="control">-->
    <!--                        <input class="input" name="subject" type="text" placeholder="Onderwerp">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="field is-horizontal">-->
    <!--                    <div class="field-label is-normal">-->
    <!--                        <label class="field-label is-normal">Bericht</label>-->
    <!--                    </div>-->
    <!--                    <div class="control">-->
    <!--                                <textarea class="textarea has-fixed-size" name="message" type="password"-->
    <!--                                          placeholder="Bericht"></textarea>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="field is-grouped pt-5 is-horizontal">-->
    <!--                    <div class="control">-->
    <!--                        <button class="button submit" name="submit">Verstuur</button>-->
    <!--                    </div>-->
    <!--                </div>-->
</html>


