<?php
    // Start session
    //    session_start();

    // Database variable
    /** @var mysqli $db */

    $randomCode = rand(1000, 9999);

    // Check if submitted
    if (isset($_POST['submit'])) {
        // Database check
        require_once "includes/database.php";

        // Data from form
        $name = mysqli_escape_string($db, $_POST['name']);
        $email = mysqli_escape_string($db, $_POST['email']);
        $phone = mysqli_escape_string($db, $_POST['phone']);
        $note = mysqli_escape_string($db, $_POST['note']);
        $date = mysqli_escape_string($db, $_POST['reservation_date']);

        $code = rand(1000, 9999);

        // Form validation handling
        require_once "includes/form-validation.php";

        if (empty($errors)) {
            // Form data to the database
            $query = "INSERT INTO reservations (name, email, phone, note, reservation_date, code)
                              VALUES ('$name', '$email', '$phone', '$note', '$date', $code)";
            $result = mysqli_query($db, $query) or die('Error: ' . mysqli_error($db) . ' with query ' . $query);

            $id = mysqli_insert_id($db);
            // Session with data from form
            if ($result) {
                session_start();
                $_SESSION['form-data'] = [
                    'id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'reservation_date' => $date,
                    'note' => $note,
                    'code' => $code
                ];

                header("Location: includes/send-email-reservation.php");
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
        <div class="columns is-tablet">
            <div class="column is-one-quarter "></div>
            <div class="column custom-color">
                <form method="post" action="">
                    <!-- Name field -->
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label for="name" class="label">Naam</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" value="<?php if ( isset($name) ) echo $name; ?>" autocomplete="on" name="name" placeholder="John Doe" class="input">
                                </div>
                                <span class="help is-danger errors"><?php echo $errors['name'] ?? ''; ?></span>
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
                                    <input type="email" value="<?php if ( isset($email) ) echo $email; ?>" autocomplete="on" name="email" placeholder="user@example.com" class="input">
                                </div>
                                <span class="help is-danger errors"><?php echo $errors['email'] ?? ''; ?></span>
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
                                    <input type="tel" value="<?php if ( isset($phone) ) echo $phone; ?>" autocomplete="on" name="phone" placeholder="0612345678" class="input">
                                </div>
                                <span class="help is-danger errors"><?php echo $errors['phone'] ?? ''; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Date field -->
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label for="reservation_date" class="label">Datum</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="date" value="<?php if ( isset($date) ) echo $date; ?>" onchange="checkDate()" autocomplete="on" name="reservation_date" class="input">
                                </div>
                                <span class="help is-danger errors"><?php echo $errors['reservation_date'] ?? ''; ?></span>
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
                                    <textarea name="note" value="<?php if ( isset($note) ) echo $note; ?>" class="textarea has-fixed-size" placeholder="Beschrijf hier uw opdracht" rows="10"></textarea>
                                </div>
                                <span class="help is-danger errors"><?php echo $errors['note'] ?? ''; ?></span>
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
                    <input name="code" value="<?php $randomCode ?>" type="hidden">
                </form>
            </div>
            <div class="column is-one-quarter"></div>
        </div>

        <script>
            function checkDate() {
                let selectedText = document.getElementById('date').value;
                let selectedDate = new Date(selectedText);
                let now = new Date();
                if (selectedDate < now) {
                    alert("Datum moet in de toekomst zijn!");
                }
            }
        </script>

        <style>
            body {
                margin: 0;
            }

            .field:not(:last-child) {
                margin-bottom: 0px;
            }

            .columns {
                margin: 20px !important;
            }

            /*.custom-color{*/
            /*    background: linear-gradient(25deg,  #786fa6 70%, #2c2c54 60%);*/
            /*    padding: 35px;*/
            /*    border-radius: 4px;*/
            /*}*/
        </style>

        <?php
            include('partials/footer.php');
        ?>
    </body>
</html>