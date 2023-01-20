<?php
    // Database variable
    /** @var mysqli $db */

    // Database connection
    require_once("includes/database.php");

    // Check for id
    $id = preg_replace('#[^0-9]#i', '', $_GET['id']);

    // Check if id is right
    if(isset($_GET['id'])){
        $query = mysqli_query($db, "SELECT * FROM reservations WHERE id = '$id'");
        while($row = mysqli_fetch_assoc($query)){
            $name =     $row['name'];
            $phone =    $row['phone'];
            $email =    $row['email'];
            $date =     $row['reservation_date'];
            $note =     $row['note'];
            $code =     $row['code'];
        }

    } else {
        echo "Het werkt niet";
    }

    // Check if update button is clicked
    if(isset($_POST['update'])){
        $update_name =      $_POST['name'];
        $update_phone =     $_POST['phone'];
        $update_email =     $_POST['email'];
        $update_date =      $_POST['reservation_date'];
        $update_note =      $_POST['note'];

        // Form validator starts
        require_once "includes/form-validation.php";

        // Prepare SQL
        if(empty($errors)){
            $update_query = "UPDATE reservations SET name='$update_name', phone='$update_phone', email='$update_email', reservation_date='$update_date', note='$update_note' WHERE id='$id'";
            $result = mysqli_query($db, $update_query);
            // If succes redirect to overview.php
            if($result){
                session_start();
                $_SESSION['form-data'] = [
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'reservation_date' => $date,
                    'note' => $note,
                    'code' => $code
                ];
                header('Location: reservation_made.php');
                exit;
            } else{
                $errors['db'] = "Er is een fout opgetreden...";
            }
        }
        // Close connection to db
        mysqli_close($db);
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
        <link rel="stylesheet" href="../css/style.css">
        <title>Wijzigen afspraak</title>
    </head>
    <body>
        <?php
            include('partials/header.php');
        ?>
        <div class="">
            <div class="">
                <form action="" method="post">
                    <div class="">
                        <div class="">
                            <div>
                                <label for="name">Naam: </label>
                                <input id="name" type="text" name="name" value="<?php if(isset($update_name)){ echo $update_name; } else{ echo $name; } ?>">
                                <span class="errors"><?php echo $errors['name'] ?? ''; ?></span>
                            </div>
                            <br>
                            <div>
                                <label>Telefoonnummer: </label>
                                <input id="phone" type="tel" name="phone" value="<?php if(isset($update_phone)){ echo $update_phone; } else{ echo $phone; } ?>">
                                <span class="errors"><?php echo $errors['phone'] ?? ''; ?></span>
                            </div>
                            <br>
                            <div>
                                <label for="email">Email: </label>
                                <input id="email" type="text" name="email" value="<?php if(isset($update_email)){ echo $update_email; } else{ echo $email; } ?>">
                                <span class="errors"><?php echo $errors['email'] ?? ''; ?></span>
                            </div>
                            <br>
                            <div>
                                <label for="date">Datum: </label>
                                <input id="reservation_date" type="date" name="reservation_date" value="<?php if(isset($update_date)){ echo $update_date; } else{ echo $date; } ?>">
                                <span class="errors"><?php echo $errors['date'] ?? ''; ?></span>
                            </div>
                            <br>
                            <div>
                                <label for="note">Opdracht: </label>
                                <textarea id="note" name="note" rows="3" cols="40" ><?php if(isset($update_note)){ echo $update_note; } else{ echo $note; } ?></textarea>
                            </div>
                            <br>
                            <div>
                                <button name="update" type="submit" class="reserve">Wijzig reservering</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
            include('partials/footer.php');
        ?>
    </body>
</html>


