<?php
    //Check if data is valid & generate error if not so
    $errors = [];
    if ($name == "") {
        $errors['name'] = 'Naam kan niet leeg zijn.';
    }
    if ($note == "") {
        $errors['note'] = 'Notitie kan niet leeg zijn.';
    }
    if ($date == "") {
        $errors['date '] = 'Datum kan nie tleeg zijn.';
    }
    // if (!is_numeric($tracks)) {
    //     $errors['tracks'] = 'Tracks need to be a number';
    // }
    // if ($tracks > 255) {
    //     $errors['tracks'] = 'The amount of tracks must be less then 255';
    // }
    // // this error message wil overwrite the previous error when tracks is empty
    // if ($tracks == "") {
    //     $errors['tracks'] = 'Tracks cannot be empty';
    // }
?>
