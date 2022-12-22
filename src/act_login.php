<?php 

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["loginBtn"])) {
    
    require_once "database.php";

    $password = hash('md5', $_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM user WHERE user.username = '$_POST[username]' AND user.password = '$password'");

    if (mysqli_num_rows($query) != 0) {

        $data = mysqli_fetch_assoc($query);

        if ($data['isadmin'] == 1) { 
            // $_SESSION["username"] = $_POST["username"];
            $_SESSION["uid"] = $data["uid"];
            $_SESSION["fullname"] = $data['fullname'];
            $_SESSION["isAdmin"] = 1;

            echo "1";
        } else {
            // $_SESSION["username"] = $_POST["username"];
            $_SESSION["fullname"] = $data['fullname'];
            $_SESSION["uid"] = $data['uid'];
            $_SESSION["authenticated"] = 1;

            echo "0";
        } 

        // Fitur remember me
        if (isset($_POST['remember'])) {
            setcookie('name', $_SESSION['fullname'], time() + (3600 * 24));
            setcookie('uid', $_SESSION['uid'], time() + (3600 * 24));

        }
    } else {
        echo "
        <div class='alert alert-danger alert-dismissible fade show' onclick='hideAlert()' role='alert'>
            Username atau Password salah!
            <button type='button' class='close' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
}
