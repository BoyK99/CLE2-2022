<?php 
    $host       = "localhost";
    $database   = "reservering2022";
    $user       = "root";
    $password   = "";

    $db = mysqli_connect($host, $user, $password, $database)
    or die("Error: " . mysqli_connect_error());;
 ?> 