<?php
    include(__DIR__ . '/../includes/globals.php');

    // Check if logged in
    if(isset($_SESSION['loggedInUser'])) {
         $login = true;
    } else {
         $login = false;
    }
?>
<head>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-burger" id="burger" >
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div class="navbar-menu" id="nav-links">
        <div class="navbar-start">
            <a class="navbar-item" href="<?= $base_url ?>index.php">
                Home
            </a>
        </div>
        <div class="navbar-end">
            <a class="navbar-item" href="<?= $base_url ?>contact.php">
                Contact
            </a>
            <?php

                if($login == true) {
                    echo '<a class="navbar-item" href="'.$base_url.'admin/index.php"> Afspraken </a>';
                    echo '<a class="navbar-item" href="'.$base_url.'admin/logout.php"> Log uit </a>';
                } else {
                    echo '<a class="navbar-item" href="login.php"> Log in </a>';
                }
            ?>
        </div>
    </div>
</nav>

<script src="<?= $base_url ?>js/script.js"></script>