<?php
    if (isset($_POST['submit'])) {
        require_once "includes/database.php";

        /** @var mysqli $db */

        $email = mysqli_escape_string($db, $_POST['email']);
        $password = $_POST['password'];

        $errors = [];
        if ($email == '') {
            $errors['email'] = 'Voer een email in';
        }
        if ($password == '') {
            $errors['password'] = 'Voer een wachtwoord in';
        }


        if (empty($errors)) {
            // hash password
            $password = password_hash($password, PASSWORD_DEFAULT);

            // insert the new user into the database
            $query = "INSERT INTO users (email, password) 
                    VALUES ('$email', '$password')";

            $result = mysqli_query($db, $query)
            or die('Db Error: ' . mysqli_error($db) . ' with query: ' . $query);

            if ($result) {
                header('Location: login.php');
                exit;
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
        <title>Registreren</title>
    </head>
    <body> test
        <form action="" method="post">
            <div class="data-field">
                <label for="email">Email</label>
                <input id="email" type="text" name="email" value="<?= $email ?? '' ?>"/>
                <span class="errors"><?= $errors['email'] ?? '' ?></span>
            </div>

            <div class="data-field">
                <label for="password">Wachtwoord</label>
                <input id="password" type="password" name="password" value="<?= $password ?? '' ?>"/>
                <span class="errors"><?= $errors['password'] ?? '' ?></span>
            </div>
            <div class="data-submit">
                <input type="submit" name="submit" value="Registreren"/>
            </div>
        </form>
    </body>
</html>