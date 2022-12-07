<?php
    // Start session
//    session_start();

    // Database variable
    /** @var mysqli $db */

    // Check if submitted
    if (isset($_POST['submit'])) {
        // Database check
        require_once "includes/database.php";

        // Data from form
        $name   = mysqli_escape_string($db, $_POST['name']);
        $email  = mysqli_escape_string($db, $_POST['email']);
        $phone  = mysqli_escape_string($db, $_POST['reservation_date']);
        $note   = mysqli_escape_string($db, $_POST['phone_number']);
        $date   = mysqli_escape_string($db, $_POST['email']);

        // Form validation handling
        require_once "includes/form-validation.php";

        if (empty($errors)) {
            // Form data to the database
            $query = "INSERT INTO reservations (name, email, phone, note, reservation_date)
                          VALUES ('$name', '$email', '$phone', '$note', '$date')";
            $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);

            // Session with data from form
            if ($result) {
                session_start();
                $_SESSION['form-data'] = [
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'reservation_date' => $date,
                    'note' => $note
                ];

                header("Location: reservation_made.php");
                exit;
            } else {
                $errors['db'] = 'Something went wrong in your database query: ' . mysqli_error($db);
            }

            // Close connection
            mysqli_close($db);
        }
    }
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
        <title>Maak afspraak</title>
    </head>
    <body>
        <?php
            include('partials/header.php');
        ?>
        <form action="" method="post">
            <div>
                <div class="reserve-form-inner">
                    <div>
                        <label for="name">Naam: </label>
                        <input id="name" type="text" name="name"">
                        <span class="errors"><?php echo $errors['name'] ?? ''; ?></span>
                    </div>
                    <br>
                    <div>
                        <label for="email">Email: </label>
                        <input id="email" type="text" name="email">
                        <span class="errors"><?php echo $errors['email'] ?? ''; ?></span>
                    </div>
                    <br>
                    <div>
                        <label for="phone">Telefoonnummer: </label
                        <input id="phone" type="tel" name="phone">
                        <span class="errors"><?php echo $errors['phone'] ?? ''; ?></span>
                    </div>
                    <br>
                    <div>
                        <label for="date">Date: </label>
                        <input id="date" type="text" name="date">
                        <span class="errors"><?php echo $errors['reservation_date'] ?? ''; ?></span>
                    </div>
                    <br>
                    <div>
                        <label for="note">Notitie: </label>
                        <textarea id="note" name="note" rows="3" cols="40"></textarea>
                    </div>
                    <br>
                    <div>
                        <button name="submit" type="submit" value="Reserveer" class="reserve">Reserveer</button>
                    </div>
                </div>
            </div>
        </form>
        <?php
            include('partials/footer.php');
        ?>
    </body>
</html>