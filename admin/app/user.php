<?php
session_start();

$location = 'user';

if (empty($_SESSION["isAdmin"])) {
    header("Location: ../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation | Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css" />


    <link rel="stylesheet" href="css/style.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Sidebar -->
        <?php include_once 'src/sidebar.php' ?>
        <!-- /. sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Reservation Details</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header text-right">
                                    <a href="/register.php" class="btn btn-primary" id="btn-add-new"><span class="fa fa-plus"></span> Add New</a>
                                </div>
                                <div class="card-body">
                                    <!-- Tabel untuk Restaurant -->
                                    <table id="table-user" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Telephone</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="d-flex justify-content-center">
                                                <div class="spinner-border text-primary" role="status" id="load" style="position: absolute; top: 50%; display: none;">
                                                </div>
                                            </div>

                                            <?php
                                            require_once "src/koneksi.php";

                                            $users = mysqli_query($conn, "SELECT user.uid, user.fullname, user.email, user.telephone, user.created_at FROM user WHERE isadmin=0 AND isDeleted = 0");

                                            $i = 1;
                                            while ($user = mysqli_fetch_assoc($users)) {
                                            ?>

                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $user['fullname'] ?></td>
                                                    <td><?= $user['email'] ?></td>
                                                    <td><?= $user['telephone'] ?></td>
                                                    <td><?= $user['created_at'] ?></td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-user-<?= $user['uid'] ?>" class='btn btn-sm btn-primary'>
                                                            <span class='fa fa-pencil-alt'></span>
                                                        </a>
                                                        <a id="hapus-user" href="javascript:void(0);" data-id='<?= $user['uid'] ?>' class='btn btn-sm btn-danger'>
                                                            <span class='fa fa-trash'></span>
                                                        </a>
                                                    </td>
                                                </tr>

                                            <?php
                                                $i++;
                                            }

                                            ?>

                                        </tbody>
                                    </table>
                                    <!-- /. tabel untuk User -->
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
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <div class="d-flex justify-content-center">
            <div class="spinner-border text-primary" role="status" id="load" style="position: absolute; top: 50%; display: none;">
            </div>
        </div>

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


    <!-- Modal -->
    <?php

    require_once "src/koneksi.php";
    $users = mysqli_query($conn, "SELECT user.uid, user.fullname, user.email, user.telephone, user.created_at FROM user WHERE isadmin=0");

    // Print Tabel Post
    while ($user = mysqli_fetch_assoc($users)) {

    ?>
        <!-- Modal Edit -->
        <form action='./src/user_man.php?edit=y' id="edit-user" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="modal-user-<?= $user['uid'] ?>">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="form-group">
                                <label class='text-secondary text-sm text-left w-100' id="selected-label">Full Name</label>
                                <input type="text" class="form-control" name="fullname" value="<?= $user['fullname'] ?>" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label class='text-secondary text-sm text-left w-100' id="selected-label">Email</label>
                                <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>" placeholder="Email"></input>
                            </div>
                            <div class="form-group">
                                <label class='text-secondary text-sm text-left w-100' id="selected-label">Telephone</label>
                                <input type="text" class="form-control" name="telephone" value="<?= $user['telephone'] ?>" placeholder="Telephone"></input>
                            </div>
                            <!-- <div class="form-group">
                                <label class='text-secondary text-sm text-left w-100' id="selected-label">Old Password</label>
                                <input type="password" class="form-control" name="oldpassword" placeholder="Old Password"></input>
                            </div>
                            <div class="form-group">
                                <label class='text-secondary text-sm text-left w-100' id="selected-label">New Password</label>
                                <input type="password" class="form-control" name="newpassword" placeholder="New Password"></input>
                            </div> -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="uid" value='<?= $user['uid'] ?>'>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="save-edit" name="edit" value="edit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>
        <!-- END Modal -->
    <?php
    }
    ?>
    <!-- End Modal -->


    <!-- REQUIRED SCRIPTS -->
    <?php include "src/scripts.php" ?>

    <!-- Page specific script -->
    <script type="text/javascript">
        $(function() {
            var table = $("#table-user").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });

            $('#edit-user #save-edit').on('click', function() {
                var form = $(this).closest('form');
                $('#load').show();
                form.submit();
            });

            $('#table-user').on('click', '#hapus-user', function() {
                var id = $(this).data('id');
                var row = table.row(this.closest('tr'));

                if (confirm("Yakin ingin menghapus User ini?")) {
                    $('#load').show();
                    $.ajax({
                        type: "post",
                        url: "src/user_man.php",
                        data: ({
                            delete: true,
                            id: id
                        }),
                        success: function() {
                            $('#load').hide();
                            row.remove().draw(false);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>