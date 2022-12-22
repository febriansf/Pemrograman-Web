<?php

require_once 'koneksi.php';


if (isset($_GET['delete'])) {
    //print_r($_POST);

    $query = "DELETE FROM makanan WHERE makanan.makanan_id = $_POST[id]";

    mysqli_query($conn, $query);
}

// print_r($_POST);
// print_r($_FILES);

if (isset($_GET['add'])) {

    // Pindah Gambar Ke Direktori Khusus
    $filename = $_FILES['gambar']['name'];
    $filepath = "../../../images/Restaurant/" . $_FILES['gambar']['name'];

    move_uploaded_file($_FILES["gambar"]["tmp_name"], $filepath);
    // END Pindah Gambar //

    $nama = $_POST['nama'];
    $harga = intval($_POST['harga']);
    $diskon = intval(($_POST['diskon']));
    $ket = $_POST['deskripsi'];

    $query = "INSERT INTO makanan(makanan_id, makanan_nama, makanan_gambar, makanan_harga, makanan_diskon, makanan_ket) VALUES(NULL, '$nama', '$filename', $harga, $diskon, '$ket')";

    if (mysqli_query($conn, $query)) {
        print_r($_POST);
    }
}

if (isset($_GET['edit'])) {

    // print_r($_POST);
    // print_r($_FILES);

    //echo(empty($_FILES['gambar']['name']));

    $nama = $_POST['nama'];
    $harga = intval($_POST['harga']);
    $diskon = intval(($_POST['diskon']));
    $ket = $_POST['deskripsi'];

    $filename = $_FILES['gambar']['name'];

    $query = "UPDATE makanan SET makanan_nama = '$nama', makanan_harga = $harga, makanan_diskon = $diskon, makanan_ket = '$ket'";

    if (!empty($filename)) {
        // Pindah Gambar Ke Direktori Khusus
        $filepath = "../../../images/Restaurant/" . $_FILES['gambar']['name'];

        move_uploaded_file($_FILES["gambar"]["tmp_name"], $filepath);
        // END Pindah Gambar //
        
        $query .= ", makanan_gambar = '$filename'";
    }

    $query .= " WHERE makanan.makanan_id = $_POST[id]";

    if (mysqli_query($conn, $query)) {
        header('Location: ../restaurant.php');
    }
}
