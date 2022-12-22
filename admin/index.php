<?php

session_start();

if (empty($_SESSION["isAdmin"])) {
        header("Location: ../login.php");
} else {
    header("Location: app/dashboard.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("location: ../index.php");
}

?>