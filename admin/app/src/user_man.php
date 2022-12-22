<?php 

require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_GET["edit"])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $uid = $_POST['uid'];

    $query = "UPDATE user SET fullname = '$fullname', email = '$email', telephone = '$telephone' WHERE user.uid = $uid";

    if (mysqli_query($conn, $query)) {
        echo "Sukses";
        header('Location: ../user.php');
    } else {
        echo "Error";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {

    $query = "UPDATE user SET isDeleted = 1 WHERE user.uid = $_POST[id]";

    if (mysqli_query($conn, $query)) {
        echo "Sukses";
    } else {
        echo "Error";
    }
}

?>