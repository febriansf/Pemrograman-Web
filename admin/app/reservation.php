<?php
session_start();

$location = 'reservation';

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
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Reservation</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- /. main-content  -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- Card Header -->
                                <div class="card-header text-right">
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <!-- Tabel untuk Room Type -->
                                    <table id="reservation" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Room Type</th>
                                                <th>Status</th>
                                                <th>Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            include "../../src/myFunc.php";
                                            require_once "src/koneksi.php";

                                            $reservation = mysqli_query($conn, "SELECT reservation.id as id, user.fullname, user.email, reservation.check_in, reservation.check_out, room_type.name as room_type, booking.status, booking.notes 
                                            FROM reservation
                                            JOIN user ON user.uid = reservation.uid
                                            JOIN room_type ON room_type.type_id = reservation.room_id
                                            JOIN booking ON booking.id = reservation.id");

                                            $i = 1;
                                            while ($result = mysqli_fetch_assoc($reservation)) {
                                            ?>
                                                <tr>
                                                    <td><?= $result['id'] ?></td>
                                                    <td><?= $i ?></td>
                                                    <td><?= $result['fullname'] ?></td>
                                                    <td><?= $result['email'] ?></td>
                                                    <td><?= $result['check_in'] ?></td>
                                                    <td><?= $result['check_out'] ?></td>
                                                    <td><?= $result['room_type'] ?></td>
                                                    <td><?= $result['status'] ?></td>
                                                    <td><?= $result['notes'] ?></td>
                                                    <!-- <td class="text-center">
                                                        <a href="javascript:void(0);" class='btn btn-sm btn-primary'>
                                                            <span class='fa fa-pencil-alt'></span>
                                                        </a>
                                                        <a id="hapus-room" href="javascript:void(0);" data-id='' class='btn btn-sm btn-danger'>
                                                            <span class='fa fa-trash'></span>
                                                        </a>
                                                    </td> -->
                                                </tr>

                                            <?php
                                                $i++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <label class='text-secondary text-sm hidden d-none' id="selected-label"><span class="selected-count">0</span> Row's Selected</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="text-secondary font-weight-bold">With selected:</label>
                            <button type="button" id="confirm-booking" class="btn btn-outline-success btn-sm" disabled>Confirm
                            </button>
                            <button type="button" id="cancel-booking" class="btn btn-outline-danger btn-sm" disabled>Cancel
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <div class="d-flex justify-content-center">
            <div class="spinner-border text-primary" role="status" id="load" style="position: absolute; top: 50%; display: none;">
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin mengkonfirmasi ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" id="submit" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Modal -->
        <div class="modal fade" id="modal-cancel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cancel Reservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin membatalkan reservasi ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" id="submit" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

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
    <?php include "src/scripts.php" ?>

    <!-- Page specific script -->
    <script>
        $(function() {
            var table = $('#reservation').DataTable({
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
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });



            var selectedId;
            $('#reservation tbody').on('click', 'tr', function() {
                $(this).toggleClass('active');

                var data = table.rows('.active').data();

                var id = new Array();
                for (var i = 0; i < data.length; i++) {
                    id.push(data[i][0]);
                }

                selectedId = id;

                $('.selected-count').replaceWith("<span class='selected-count'>" + id.length + "</span>");

                if (id.length == 0) {
                    $('#selected-label').toggleClass("d-none");
                    $('#confirm-booking').attr('disabled', "disabled");
                    $('#cancel-booking').attr('disabled', "disabled");
                } else {
                    $('#selected-label').removeClass("d-none");
                    $('.selected-count').replaceWith("<span class='selected-count'>" + id.length + "</span>");
                    $('#confirm-booking').removeAttr('disabled');
                    $('#cancel-booking').removeAttr('disabled');
                }
                // console.log(id.length);

            });

            $('#confirm-booking').click(function() {
                $('#modal-confirm').modal('show');
            });

            $('#cancel-booking').click(function() {
                $('#modal-cancel').modal('show');
            });

            $('#modal-confirm').on('click', '#submit', function() {
                $('#load').show();
                $('#modal-confirm').modal('hide');
                $.ajax({
                    url: "src/act_confirm.php",
                    type: "post",
                    data: ({
                        confirm: "y",
                        ids: selectedId
                    }),
                    success: function() {
                        location.reload();
                        $('#load').hide();
                    }
                })
            });

            $('#modal-cancel').on('click', '#submit', function() {
                $('#load').show();
                $('#modal-cancel').modal('hide');
                $.ajax({
                    url: "src/act_confirm.php",
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
        });
    </script>
</body>

</html>