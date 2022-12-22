<?php

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    setcookie('name', "", time() - (3600 * 999));
    header("location: ../index.php");
}

require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['cancel'])) {

        foreach ($_POST['ids'] as $id) {

            if (mysqli_query($conn, "UPDATE `booking` SET `status` = 'Request Cancell' WHERE `booking`.`id` = $id;")) {
                echo "Success";
            }
        }
    }

    if (isset($_POST['update'])) {

        $data = mysqli_query($conn, "SELECT password FROM user WHERE user.uid = $_SESSION[uid]");
        $password = mysqli_fetch_assoc($data);

        $query = "UPDATE user SET fullname = '$_POST[fullname]', email = 
        '$_POST[email]', username = '$_POST[username]', telephone = '$_POST[telephone]'";

        if (!empty($_POST['newpassword'])){     
            $oldpw = hash('md5', $_POST['oldpassword']);

            if ($oldpw != $password){
                echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                        Password Salah !
                        <button type='button' class='close' onclick='hideAlert()' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            } else {
                
                if ($_POST['newpassword'] != $_POST['repassword']){
                    echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                            Password tidak identik !
                            <button type='button' class='close' onclick='hideAlert()' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                } else {
                    
                    $newpassword = hash('md5', $_POST['newpassword']);
                    $query .= ", password = '$newpassword'";
                }
            }
        }
    }

    $query .= " WHERE user.uid = '$_SESSION[uid]'";

    if (mysqli_query($conn, $query)){
        echo "<div class='alert alert-info alert-dismissible fade show text-center' role='alert'>
                Profile berhasil di update!!
                <button type='button' class='close' onclick='hideAlert()' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                Update Profile Gagal!!
                <button type='button' class='close' onclick='hideAlert()' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    }

}


?>
