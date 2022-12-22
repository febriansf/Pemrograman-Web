<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['confirm'])) {

        // print_r($_POST['ids']);
        require_once "koneksi.php";
        foreach ($_POST['ids'] as $id) {

            if (mysqli_query($conn, "UPDATE `booking` SET `status` = 'Confirmed' WHERE `booking`.`id` = $id;")) {
                echo "Success";
            }
        }
    }

    if (isset($_POST['cancel'])) {

        // print_r($_POST['ids']);
        require_once "koneksi.php";
        foreach ($_POST['ids'] as $id) {

            if (mysqli_query($conn, "UPDATE `booking` SET `status` = 'Cancelled' WHERE `booking`.`id` = $id;")) {
                echo "Success";
            }
        }
    }
}
