<?php
    // Start session
    session_start();

    // Check if logged in
    if(isset($_SESSION['loggedInUser'])) {
        $login = true;
    } else {
        $login = false;
    }

    // ------------------ //

    /** @var mysqli $db */
    require_once "includes/database.php";

    // Login form check
    if (isset($_POST['submit'])) {
        $email = mysqli_escape_string($db, $_POST['email']);
        $password = $_POST['password'];

        $errors = [];
        if($email == '') {
            $errors['email'] = 'Voer een gebruikersnaam in.';
        }
        if($password == '') {
            $errors['password'] = 'Voer een wachtwoord in.';
        }

        if(empty($errors))
        {
            //Get record from database based on first name
            $query = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);
                if (password_verify($password, $user['password'])) {
                    $login = true;

                    $_SESSION['loggedInUser'] = [
                        'email' => $user['email'],
                        'id' => $user['id']
                    ];
                } else {
                    //Error invalid login data
                    $errors['loginFailed'] = 'De combinatie van email en wachtwoord is niet bekend';
                }
            } else {
                //Error invalid login data
                $errors['loginFailed'] = 'De combinatie van email en wachtwoord is niet bekend';
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
        <title>Login</title>
    </head>
    <body>
        <?php
            include('partials/header.php');
        ?>
        <?php if ($login) { ?>
            <p>Je bent ingelogd!</p>
            <p><a href="logout.php">Uitloggen</a> / <a href="secure.php">Naar maandoverzicht</a></p>
        <?php } 
        else { ?>
            
            <section class="hero is-primary is-fullheight">
                <div class="hero-body">
                    <div class="container">
                        <div class="columns is-centered">
                            <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                                <form action="" method="post" class="box">
                                    <!-- Email field -->
                                    <div class="field">
                                        <label for="email" class="label">Email</label>
                                        <div class="control has-icons-left">
                                            <input value="<?= $email ?? '' ?>" name="email" id="email" type="email" placeholder="email" class="input" required>
                                            <span class="icon is-small is-left">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <p class="help is-danger"><?= $errors['email'] ?? '' ?></p>
                                        </div>
                                    </div>
                                    <!-- Password field -->
                                    <div class="field">
                                        <label for="password" class="label">Wachtwoord</label>
                                        <div class="control has-icons-left">
                                            <input id="password" name="password" type="password" placeholder="*******" class="input" required>
                                            <span class="icon is-small is-left">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <p class="help is-danger"><?= $errors['password'] ?? '' ?></p>
                                        </div>
                                    </div>
                                    <div class="field is-grouped">
                                        <p class="control">
                                            <input class="button is-success" type="submit" name="submit" value="Login"/>
                                            <p class="help is-danger"><?= $errors['loginFailed'] ?? '' ?></p>
                                        </p>
                                        <!-- Deze gaat nog weg -->
                                        <p class="control">
                                            <a href="register.php" class="button is-light">
                                                Register
                                            </a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- kan dit gebruikt worden?-->
            <!-- <?php include('partials/login.php'); ?> -->
        <?php } ?>
        
        <?php
            include('partials/footer.php');
        ?>
    </body>
</html>