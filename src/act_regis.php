<?php

include "myFunc.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registerBtn"])) {

    if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $_POST['password'])) {
        echo "
            <div class='alert alert-warning alert-dismissible fade show' onclick='hideAlert()' role='alert'>
                Password harus minimal 8 karakter, terdapat 1 huruf kapital, dan 1 angka !!
                <button type='button' class='close' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    } else {

        if ($_POST['password'] != $_POST['repassword']) {
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    Password tidak cocok !!
                    <button type='button' class='close' onclick='hideAlert()' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
        } else {
            
            $username = search_data("user", "username", "username", $_POST['username']);

            if (!mysqli_num_rows($username) == 0){
                echo "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Username telah ada !
                        <button type='button' class='close' onclick='hideAlert()' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            } else {

                require "database.php";

                // Password di enkripsi md5
                $password = hash('md5', $_POST['password']);

                $query = "INSERT INTO user(uid, username, fullname, email, telephone, password, isadmin) VALUES(NULL, '$_POST[username]', '$_POST[fullname]', '$_POST[email]', '$_POST[telephone]', '$password', 0)";

                if (mysqli_query($conn, $query)){
                    echo "
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            Registrasi Berhasil, silahkal Log In!
                            <button type='button' class='close' onclick='hideAlert()' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                }
            }
        }
    }
}
