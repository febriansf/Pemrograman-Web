<?php
session_start();

$location = 'restaurant';

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

    <!-- Custom Style -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="../../css/dropify.min.css">

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
                            <h1 class="m-0">Restaurant Menus</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Restaurant</li>
                            </ol>
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
                                    <button class="btn btn-primary" id="btn-add-new"><span class="fa fa-plus"></span> Add New</button>
                                </div>
                                <div class="card-body">
                                    <!-- Tabel untuk Restaurant -->
                                    <table id="restaurant" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Images</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Harga</th>
                                                <th>Diskon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="d-flex justify-content-center">
                                                <div class="spinner-border text-primary" role="status" id="load" style="position: absolute; top: 50%; display: none;">
                                                </div>
                                            </div>

                                            <?php
                                            include "../../src/myFunc.php";

                                            // get_data(table_name, select_option, sort_by, sort_option)
                                            $menus = get_data("makanan", "*", "makanan_id");

                                            // Print Tabel Restaurant
                                            $i = 1;
                                            while ($menu = mysqli_fetch_assoc($menus)) {
                                                $img = "../../images/Restaurant/" . $menu['makanan_gambar'];
                                            ?>
                                                <tr>
                                                    <td style="width: 20px;"><?= $i ?></td>
                                                    <td>
                                                        <img src='<?= $img ?>' width='150px'>
                                                    </td>
                                                    <td><?= $menu["makanan_nama"] ?></td>
                                                    <td><?= $menu["makanan_ket"] ?></td>
                                                    <td><?= rp_format($menu["makanan_harga"]) ?></td>
                                                    <td><?= rp_format($menu["makanan_diskon"]) ?></td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-edit-<?= $i ?>" class="btn btn-sm btn-secondary">
                                                            <span class="fa fa-pencil-alt"></span>
                                                        </a>
                                                        <a id="hapus-menu" href="javascript:void(0);" data-id='<?= $menu['makanan_id'] ?>' class="btn btn-sm btn-danger">
                                                            <span class="fa fa-trash"></span>
                                                        </a>
                                                    </td>
                                                </tr>

                                            <?php
                                                $i++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    <!-- /. tabel untuk makanan -->
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
        <form method="post" id="add-menu" enctype="multipart/form-data">
            <div class="modal fade" id="modal-add">
                <div class=" modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Menu</h4>
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
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="harga" placeholder="Harga" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="diskon" placeholder="Diskon" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" required>
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

    <?php

    $menus = get_data("makanan", "*", "makanan_id");
    $j = 1;
    while ($menu = mysqli_fetch_assoc($menus)) {
        $img = "../../images/Restaurant/" . $menu['makanan_gambar'];
    ?>
        <!-- Modal Edit -->
        <form action="./src/act_food.php?edit=y" id="edit-menu" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="modal-edit-<?= $j ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Makanan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="form-group">
                                <input type="file" name="gambar" class="dropify" data-height="200" value="<?= $menu['makanan_gambar']  ?>" data-default-file="<?= $img ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" value="<?= $menu['makanan_nama'] ?>" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="harga" value="<?= $menu['makanan_harga'] ?>" placeholder="Harga">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="diskon" value="<?= $menu['makanan_diskon'] ?>" placeholder="Diskon">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="deskripsi" value="<?= $menu['makanan_ket'] ?>" placeholder="Deskripsi">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id" value='<?= $menu['makanan_id'] ?>'>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" id="save-edit" class="btn btn-primary">Save changes</button>
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
        $j++;
    }
    ?>


    </div>
    <!-- ./wrapper -->

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
    <script type="text/javascript">
        $(function() {


            $('#btn-add-new').on('click', function() {
                $('#modal-add').modal('show');
            });
        });
    </script>
</body>

</html>