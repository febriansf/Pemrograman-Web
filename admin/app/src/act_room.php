<?php

require_once 'koneksi.php';


if (isset($_GET['delete'])) {
    //print_r($_POST);

    $query = "DELETE FROM room_type WHERE type_id = $_POST[id]";

    mysqli_query($conn, $query);
}

// print_r($_POST);
// print_r($_FILES);

if (isset($_GET['add'])) {

    // Pindah Gambar Ke Direktori Khusus
    $filename = $_FILES['gambar']['name'];
    $filepath = "../../../images/Rooms/" . $_FILES['gambar']['name'];

    move_uploaded_file($_FILES["gambar"]["tmp_name"], $filepath);
    // END Pindah Gambar //

    $nama = $_POST['nama'];
    $harga = intval($_POST['harga']);
    $kapasitas = intval($_POST['kapasitas']);
    $jumlah = intval($_POST['jumlah']);
    $luas = intval($_POST['luas']);

    $query = "INSERT INTO room_type(type_id, name, price, image, capacity , amount, size) VALUES(NULL, '$nama', $harga, '$filename', $kapasitas, $jumlah, $luas)";

    if (mysqli_query($conn, $query)) {
        print_r($_POST);
    }
}

if (isset($_GET['edit'])) {

    // print_r($_POST);
    // print_r($_FILES);

    $nama = $_POST['nama'];
    $harga = intval($_POST['harga']);
    $luas = intval($_POST['luas']);
    $kapasitas = intval($_POST['kapasitas']);
    $jumlah = intval($_POST['jumlah']);

    $filename = $_FILES['gambar']['name'];

    $query = "UPDATE room_type SET name = '$nama', price = $harga,  capacity = $kapasitas, amount = $jumlah, size = $luas";

    if (!empty($filename)) {
        // Pindah Gambar Ke Direktori Khusus
        $filepath = "../../../images/Rooms/" . $_FILES['gambar']['name'];

        move_uploaded_file($_FILES["gambar"]["tmp_name"], $filepath);
        // END Pindah Gambar //
        
        $query .= ", image = '$filename'";
    }

    $query .= " WHERE type_id = $_POST[id]";

    if (mysqli_query($conn, $query)) {
        header('Location: ../rooms.php');
    }
}
