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
        $phone  = mysqli_escape_string($db, $_POST['email']);
        $note   = mysqli_escape_string($db, $_POST['phone_number']);
        $date   = mysqli_escape_string($db, $_POST['email']);

        // Form validation handling
        require_once "includes/form-validation.php";

        if (empty($errors)) {
            // Form data to the database
            $query = "INSERT INTO reservations (name, email, phone, note, date)
                          VALUES ('$name', '$email', '$phone', '$note', '$date')";
            $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);

            // Session with data from form
            if ($result) {
                session_start();
                $_SESSION['form-data'] = [
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'date' => $date,
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
                        <label for="first_name">Naam: </label>
                        <input id="first_name" type="text" name="first_name"">
                        <span class="errors"><?php echo $errors['first_name'] ?? ''; ?></span>
                    </div>
                    <br>
                    <div>
                        <label>Achternaam: </label>
                        <input type="text" name="last_name">
                        <span class="errors"><?php echo $errors['last_name'] ?? ''; ?></span>
                    </div>
                    <br>
                    <div>
                        <label>Telefoonnummer: </label>
                        <input id="phone_number" type="tel" name="phone_number"">
                        <span class="errors"><?php echo $errors['phone_number'] ?? ''; ?></span>
                    </div>
                    <br>
                    <div>
                        <label for="email">Email: </label>
                        <input id="email" type="text" name="email">
                        <span class="errors"><?php echo $errors['email'] ?? ''; ?></span>
                    </div>
                    <br>
                    <div>
                        <label for="date">Datum en tijd: </label>
                        <input id="date" type="date" name="date">
                        <input id="time" type="time" name="time">
                        <span class="errors"><?php echo $errors['date'] ?? ''; ?> <?php echo $errors['time'] ?? ''; ?></span>
                    </div>
                    <br>
                    <div>
                        <label for="location">Restaurant locatie:</label>
                        <select id="location" name="location">
                            <option value="">Kies een locatie</option>
                            <option value="Voorstraat">Voorstraat</option>
                            <option value="Amsterdamsestraatweg">Amsterdamsestraatweg</option>
                        </select>
                        <span class="errors"><?php echo $errors['location'] ?? ''; ?></span>
                    </div>
                    <br>
                    <div>
                        <label for="persons">Aantal personen: </label>
                        <input id="persons" type="number" name="persons">
                        <span class="errors"><?php echo $errors['persons'] ?? ''; ?></span>
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