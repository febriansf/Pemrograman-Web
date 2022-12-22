<?php

session_start();

if (isset($_SESSION["authenticated"])) {
    if ($_SESSION["authenticated"] == "1") {
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Griya</b>Sarre</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in</p>

                <div class="alert d-none"></div>

                <form id="login-form" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="loginBtn" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1 mt-1">
                    <a href="404.php">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <span>Didn't have an account ? <a href="register.php" class="text-center">Register.</a></span>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <!-- Jquery Form -->
    <script src="plugins/jquery-form/jquery.form.min.js"></script>

    <script type="text/javascript">
        $(function() {

            hideAlert = function() {
                $('.alert').toggleClass("d-none");
            }

            $("#login-form").ajaxForm({
                url: "src/act_login.php",
                type: "post",
                success: function(response) {
                    let locHref = location.href;
                    if (response == 0) {
                        let homePageLink = locHref.substring(0, locHref.lastIndexOf('/')) + '/index.php';
                        window.location.replace(homePageLink);
                    } else if (response == 1){
                        let homePageLink = locHref.substring(0, locHref.lastIndexOf('/')) + '/admin/app/dashboard.php';
                        window.location.replace(homePageLink);
                    } else {
                        $(".alert").replaceWith(response);
                    }
                }
            });
        });
    </script>
</body>

</html>