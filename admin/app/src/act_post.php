<?php 
require_once "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-post"])) {
    // Pindah Gambar Ke Direktori Khusus
    $filename = $_FILES['image']['name'];
    $filepath = "../../../images/Blog/" . $_FILES['image']['name'];

    move_uploaded_file($_FILES["image"]["tmp_name"], $filepath);
    // END Pindah Gambar //

    $title = $_POST['title'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $uid = $_SESSION['uid'];

    $query = "INSERT INTO post(id, uid, image, title, created_at, draft, content) VALUES (NULL, '$uid', '$filename', '$title', current_timestamp(), '$status', '$content')";

    if (mysqli_query($conn, $query)) {
        echo "Sukses";
    } else {
        echo "Error";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {

    $query = "DELETE FROM post WHERE post.id = $_POST[id]";

    if (mysqli_query($conn, $query)) {
        echo "Sukses";
    } else {
        echo "Error";
    }
}

if (isset($_GET["edit"])) {

    // print_r($_POST);
    // print_r($_FILES);

    $title = $_POST['title'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $filename = $_FILES['image']['name'];

    $query = "UPDATE post SET content = '$content', title = '$title', draft = '$status'";

    if (!empty($filename)) {
        // Pindah Gambar Ke Direktori Khusus
        $filepath = "../../../images/Blog/" . $_FILES['image']['name'];

        move_uploaded_file($_FILES["image"]["tmp_name"], $filepath);
        // END Pindah Gambar //
        
        $query .= ", image = '$filename'";
    }

    $query .= " WHERE post.id = $_POST[id]";

    if (mysqli_query($conn, $query)) {
        echo "Sukses";
        header('Location: ../post.php');
    } else {
        echo "Error";
    }
}
