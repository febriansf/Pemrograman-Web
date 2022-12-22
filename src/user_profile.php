<?php

session_start();

if (empty($_SESSION["authenticated"])) {
    header("Location: ../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/app/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css" />
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link text-center">
                <span class="brand-text font-weight-light">User Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link p-0 mt-3">
                                <div class="user-panel pb-3 d-flex">
                                    <div class="image">
                                        <img src="/admin/app/dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
                                    </div>
                                    <div class="info">
                                        <?= $_SESSION['fullname'] ?>
                                        <i class="text-right fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </a>
                            <ul class="nav nav-treeview text-sm">
                                <li class="nav-item">
                                    <a href="/src/act_user.php?logout=y" class="nav-link">
                                        <i class="nav-icon fas fa-sign-out-alt fa-sm"></i>
                                        <p> Log out</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/index.php" class="nav-link">
                                        <i class="nav-icon fas fa-door-open fa-sm"></i>
                                        <p> Landing Page</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="user_dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>Booking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">My Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- ISI KONTEN -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- Card Header -->
                                <div class="card-header text-right">
                                    <div class='alert d-none'>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php

                                    require_once "database.php";

                                    $query = mysqli_query($conn, "SELECT * FROM user WHERE user.uid = $_SESSION[uid]");

                                    $user = mysqli_fetch_assoc($query);

                                    ?>
                                    <form class="form-horizontal" method="post" id="update-profile">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Full Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="fullname" value="<?= $user['fullname'] ?>" placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Telephone</label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" name="telephone" value="<?= $user['telephone'] ?>" placeholder="Telephone">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" placeholder="username">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Old Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="oldpassword" placeholder="Old Password"></input>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password"></input>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Retype Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Retype Password"></input>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" required> I agree to the <a href="#">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" name="update" value="update" class="btn btn-danger">Save Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/jszip/jszip.min.js"></script>
    <script src="/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/app/dist/js/adminlte.min.js"></script>

    <script src="/plugins/jquery-form/jquery.form.min.js"></script>

    <script type="text/javascript">
        $(function() {
            var table = $('#user-booking').DataTable({
                "columnDefs": [{
                    targets: 0,
                    visible: false,
                    searchable: false,
                    ordering: false,
                }],
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "autoWidth": false,
                "responsive": true,
            });

            var selectedId;
            $('#user-booking tbody').on('click', 'tr', function() {
                var row = table.row(this).data();

                if (row[7] == 'Pending') {
                    $(this).toggleClass('active');
                }

                var data = table.rows('.active').data();

                var id = new Array();
                for (var i = 0; i < data.length; i++) {
                    if (data[i][7] == 'Pending') {
                        id.push(data[i][0]);
                    }
                }

                selectedId = id;

                $('.selected-count').replaceWith("<span class='selected-count'>" + id.length + "</span>");

                if (id.length == 0) {
                    $('#cancel-booking').attr('disabled', "disabled");
                } else {
                    $('.selected-count').replaceWith("<span class='selected-count'>" + id.length + "</span>");
                    $('#cancel-booking').removeAttr('disabled');
                }
                console.log(id.length);

            });

            $('#cancel-booking').click(function() {
                $('#modal-cancel').modal('show');
            });

            $('#modal-cancel').on('click', '#submit', function() {
                $('#load').show();
                $('#modal-cancel').modal('hide');
                $.ajax({
                    url: "user_act.php",
                    type: "post",
                    data: ({
                        cancel: "y",
                        ids: selectedId
                    }),
                    success: function() {
                        location.reload();
                        $('#load').hide();
                    }
                })
            });

            $('#update-profile #newpassword').on('input', function() {
                if ($(this).val().length > 0) {
                    $(this).attr('required', 'required');
                    $('#update-profile #repassword').attr('required', 'required');
                } else {
                    $(this).removeAttr('required');
                    $('#update-profile #repassword').removeAttr('required');
                }
            });

            $('#update-profile').ajaxForm({
                url: "/src/act_user.php",
                type: "post",
                success: function(rsp) {
                    $('#load').show();
                    $('.alert').replaceWith(rsp);
                    location.reload();
                }
            })
        })
    </script>
</body>

</html>