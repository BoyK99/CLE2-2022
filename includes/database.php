<?php 
    // General settings
    $host       = "localhost";
    $user       = "root";
    $password   = "";
    $database   = "reservering2022";

    try {
        //New DB connection
        $db = new mysqli($host, $user, $password, $database );

    } catch (Exception $e) {
        //Set error
        $error = "Oops, try to fix your error please: " .
            $e->getMessage() . " on line " . $e->getLine() . " of " .
            $e->getFile();
    }
?> 