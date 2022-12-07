<?php
    // Start, stop and relocate
    session_start();
    session_destroy();
    header('Location: ../login.php');
    exit;
?>