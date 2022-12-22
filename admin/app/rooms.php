<?php
session_start();

$location = 'rooms';

if (empty($_SESSION["isAdmin"])) {
    header("Location: ../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="stylesheet" href="../../css/dropify.min.css">

    <style>
        input[type=number] {
            -moz-appearance: textfield;
            /* Firefox */
        }
    </style>


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
                            <h1 class="m-0">Rooms & Suites</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Rooms</li>
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
                                    <button class="btn btn-primary" id="btn-add-new"><span class="fa fa-plus"></span> Add New</button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <!-- Tabel untuk Room Type -->
                                    <table id="room-type" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Images</th>
                                                <th>Room Name</th>
                                                <th>Size</th>
                                                <th>Rate</th>
                                                <th>Capacity</th>
                                                <th>Room's Left</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="d-flex justify-content-center">
                                                <div class="spinner-border text-primary" role="status" id="load" style="position: absolute; top: 50%; display: none;">
                                                </div>
                                            </div>

                                            <?php
                                            include "../../src/myFunc.php";

                                            $rooms = get_data("room_type", "*", "type_id");

                                            $i = 1;
                                            while ($room = mysqli_fetch_assoc($rooms)) {
                                                $img = "../../images/Rooms/" . $room['image'];
                                            ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td class="text-center">
                                                        <img src='<?= $img ?>' width='200px'>
                                                    </td>
                                                    <td><?= $room['name'] ?></td>
                                                    <td><?= $room['size'] ?> m&#178;</td>
                                                    <td><?= rp_format($room['price']) ?></td>
                                                    <td><?= $room['capacity'] ?></td>
                                                    <td><?= $room['amount'] ?></td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-edit-<?= $i ?>" class='btn btn-sm btn-primary'>
                                                            <span class='fa fa-pencil-alt'></span>
                                                        </a>
                                                        <a id="hapus-room" href="javascript:void(0);" data-id='<?= $room['room_id'] ?>' class='btn btn-sm btn-danger'>
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

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Modal Tambah -->
        <form method="post" id="add-room" enctype="multipart/form-data">
            <div class="modal fade" id="modal-add">
                <div class=" modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Room</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="form-group">
                                <input type="file" class="form-control dropify" name="gambar" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Name" required>
                                <small class="form-text text-muted text-left">Name Type</small>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="luas" placeholder="Size in m&#178;" required>
                                <small class="form-text text-muted text-left">Room size</small>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="harga" placeholder="Harga" required>
                                <small class="form-text text-muted text-left">Rate per night</small>
                            </div>
                            <div class="form-group">
                                <input type="number" max='6' min='1' class="form-control" name="kapasitas" placeholder="Capacity" required>
                                <small class="form-text text-muted text-left">Max Capacity of this room</small>
                            </div>
                            <div class="form-group">
                                <input type="number" max='6' min='1' class="form-control" name="jumlah" placeholder="Number of Rooms" required>
                                <small class="form-text text-muted text-left">Amount of this type of room</small>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>
        <!-- END Modal -->

    </div>
    <!-- ./wrapper -->

    <?php

    $rooms = get_data("room_type", "*", "type_id");
    $j = 1;
    while ($room = mysqli_fetch_assoc($rooms)) {
        $img = "../../images/Rooms/" . $room['image'];
    ?>
        <!-- Modal Edit -->
        <form action="./src/act_room.php?edit=y" id="edit-room" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="modal-edit-<?= $j ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Room</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="form-group">
                                <input type="file" name="gambar" class="dropify" data-height="200" value="<?= $room['image'] ?>" data-default-file="<?= $img ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" value="<?= $room['name'] ?>" placeholder="Nama">
                                <small class="form-text text-muted text-left">Name Type</small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="luas" value="<?= $room['size'] ?>" placeholder="Ukuran">
                                <small class="form-text text-muted text-left">Room size</small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="harga" value="<?= $room['price'] ?>" placeholder="Harga">
                                <small class="form-text text-muted text-left">Rate per night</small>
                            </div>
                            <div class="form-group">
                                <input type="number" max='6' min='1' class="form-control" name="kapasitas" value="<?= $room['capacity'] ?>" placeholder="Kapasitas" required>
                                <small class="form-text text-muted text-left">Max Capacity of this room</small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="jumlah" value="<?= $room['amount'] ?>" placeholder="Amount">
                                <small class="form-text text-muted text-left">Amount of this type of room</small>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <input type="hidden" name="id" value='<?= $room['type_id'] ?>'>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" id="save-edit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </form>
        <!-- END Modal -->
    <?php
        $j++;
    }
    ?>


    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="../../js/dropify.min.js"></script>

    <!-- jQuery Form Plugin -->
    <script src="plugins/jquery-form/jquery.form.min.js"></script>

    <script src="js/main.js"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $('#btn-add-new').on('click', function() {
                $('#modal-add').modal('show');
            });
        });
    </script>
</body>

</html>