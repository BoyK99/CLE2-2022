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
    $name = mysqli_escape_string($db, $_POST['name']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $phone = mysqli_escape_string($db, $_POST['reservation_date']);
    $note = mysqli_escape_string($db, $_POST['phone_number']);
    $date = mysqli_escape_string($db, $_POST['email']);

    // Form validation handling
    require_once "includes/form-validation.php";

    if (empty($errors)) {
        // Form data to the database
        $query = "INSERT INTO reservations (name, email, phone, note, reservation_date)
                          VALUES ('$name', '$email', '$phone', '$note', '$date')";
        $result = mysqli_query($db, $query) or die('Error: ' . mysqli_error($db) . ' with query ' . $query);

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
    <?php include('partials/header.php'); ?>
    <div class="container">
        <section class="section">
            <div class="columns">
                <div class="column is-three-quarters">
                    <div class="tile is-ancestor">
                        <div class="tile is-parent">
                            <div class="card tile is-child">
                                <div class="card-content">
                                    <form>
                                        <!-- Name field -->
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label for="name" class="label">Naam</label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input type="text" autocomplete="on" name="name"
                                                               placeholder="John Doe" class="input" required>
                                                    </div>
                                                    <span class="help is-danger"><?php echo $errors['name'] ?? ''; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- E-mail field -->
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label for="email" class="label">E-mail</label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input type="email" autocomplete="on" name="email"
                                                               placeholder="user@example.com" class="input" required>
                                                    </div>
                                                    <span class="help is-danger"><?php echo $errors['email'] ?? ''; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Phone field -->
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label for="phone" class="label">Telefoon</label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input type="tel" autocomplete="on" name="phone"
                                                               placeholder="0612345678" class="input" required>
                                                    </div>
                                                    <span class="help is-danger"><?php echo $errors['phone'] ?? ''; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Date field -->
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label for="name" class="label">Datum</label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input type="date" autocomplete="on" name="name" class="input"
                                                               required>
                                                    </div>
                                                    <span class="help is-danger"><?php echo $errors['reservation_date'] ?? ''; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Note field -->
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label for="note" class="label">Opdracht</label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <textarea name="note" class="textarea has-fixed-size"
                                                                  placeholder="Beschrijf hier uw opdracht"
                                                                  rows="10"></textarea>
                                                    </div>
                                                    <span class="help is-danger"><?php echo $errors['note'] ?? ''; ?></span>
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
                                                            Maak afspraak
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <? php var_dump($_SESSION); ?>

    <?php include('partials/footer.php'); ?>
</body>
</html>