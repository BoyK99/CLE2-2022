<?php
    //Check if data is valid & generate error if not valid
    $errors = [];

    if ($name == "") {
        $errors['name'] = 'Vul uw naam in';
    }
    if ($email == "") {
        $errors['email'] = 'Vul uw e-mailadres in';
    }
    if (strlen($phone) < 10 or strlen($phone) > 15) {
        $errors['phone'] = 'Uw telefoonnummer moet tussen 10 en 15 tekens lang zijn';
    }
    if ($phone == "") {
        $errors['phone'] = 'Vul uw telefoonnummer in';
    }
    if ($date == "") {
        $errors['reservation_date'] = 'Kies een datum';
    }
    if ($note == "") {
        $errors['note'] = 'Vul uw opdracht beschrijving in';
    }
?>
