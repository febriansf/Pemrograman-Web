<?php
session_start();

$location = 'post';

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
                            <h1 class="m-0">Post</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Post</li>
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
                                    <!-- Tabel untuk Post -->
                                    <table id="post-result" class="table table-bordered table-hover" style="table-layout: fixed !important;">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Images</th>
                                                <th>Title</th>
                                                <th>Created At</th>
                                                <th>By</th>
                                                <th>Status</th>
                                                <th>Content</th>
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
                                            $posts = mysqli_query($conn, "SELECT post.id, post.image, post.title, post.created_at, post.draft, user.fullname as created_by, post.content FROM post
                                            JOIN user WHERE post.uid=user.uid;");

                                            // Print Tabel Post
                                            $i = 1;
                                            while ($post = mysqli_fetch_assoc($posts)) {
                                                $img = "../../images/Blog/" . $post['image'];
                                            ?>
                                                <tr>
                                                    <td style="width: 15px;"><?= $i ?></td>
                                                    <td>
                                                        <img src='<?= $img ?>' width='100px'>
                                                    </td>
                                                    <td class="text-truncate"><?= $post["title"] ?></td>
                                                    <td><?= $post["created_at"] ?></td>
                                                    <td><?= $post["created_by"] ?></td>
                                                    <td><?= $post["draft"] == 'no' ? 'Posted' : 'Drafted' ?></td>
                                                    <td class="text-truncate"><?= $post["content"] ?></td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-edit-<?= $post['id'] ?>" class="btn btn-sm btn-secondary">
                                                            <span class="fa fa-pencil-alt"></span>
                                                        </a>
                                                        <a id="hapus-post" href="javascript:void(0);" data-id='<?= $post['id'] ?>' class="btn btn-sm btn-danger">
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

    <!-- Modal Tambah -->
    <form method="post" id="add-post" enctype="multipart/form-data">
        <div class="modal fade" id="modal-add">
            <div class=" modal-dialog modal-xl modal-fullscreen-xl-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Menu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class='text-secondary text-sm text-left w-100' id="selected-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label class='text-secondary text-sm text-left w-100' id="selected-label">Option</label>
                                        <select class="form-control" name="status">
                                            <option value="yes">Draft</option>
                                            <option value="no">Post</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class='text-secondary text-sm text-left w-100' id="selected-label">Image</label>
                                        <input type="file" class="form-control dropify" name="image" required>
                                    </div>
                                    <div class="form-group">
                                        <label class='text-secondary text-sm text-left w-100' id="selected-label">Content</label>
                                        <textarea class="form-control" rows="20" name="content" placeholder="Content" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit-post" value="submit">Save changes</button>
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

    require_once "src/koneksi.php";
    $posts = mysqli_query($conn, "SELECT * FROM post");

    // Print Tabel Post
    while ($post = mysqli_fetch_assoc($posts)) {
        $img = "../../images/Blog/" . $post['image'];
    ?>
        <!-- Modal Edit -->
        <form action='./src/act_post.php?edit=y' id="edit-post" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="modal-edit-<?= $post['id'] ?>">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Makanan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="form-group">
                                <label class='text-secondary text-sm text-left w-100' id="selected-label">Title</label>
                                <input type="text" class="form-control" name="title" value="<?= $post['title'] ?>" placeholder="Name">
                            </div>
                            <div class="form-group">
                                        <label class='text-secondary text-sm text-left w-100' id="selected-label">Option</label>
                                        <select class="form-control" name="status">
                                            <option value="yes" <?= $post['draft'] == 'yes' ? 'selected' : '' ?>>Draft</option>
                                            <option value="no" <?= $post['draft'] == 'no' ? 'selected' : '' ?>>Post</option>
                                        </select>
                                    </div>
                            <div class="form-group">
                                <label class='text-secondary text-sm text-left w-100' id="selected-label">Image</label>
                                <input type="file" name="image" class="dropify" data-height="200" value="<?= $post['image']  ?>" data-default-file="<?= $img ?>">
                            </div>
                            <div class="form-group">
                                <label class='text-secondary text-sm text-left w-100' id="selected-label">Title</label>
                                <textarea type="text" class="form-control" rows="10" name="content" placeholder="Content"><?= $post['content'] ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id" value='<?= $post['id'] ?>'>
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

    <!-- Page specific script -->
    <script type="text/javascript">
        $(function() {
            var table = $('#post-result').DataTable({
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: false
            });

            $('.dropify').dropify({
                messages: {
                    default: 'Pilih Gambar',
                    replace: 'Ganti',
                    remove: 'Hapus',
                    error: 'error'
                }
            });

            $('#btn-add-new').on('click', function() {
                $('#modal-add').modal('show');
            });

            $('#add-post').ajaxForm({
                url: "src/act_post.php",
                type: "post",
                success: function() {
                    $('#load').show();
                    location.reload();
                }
            });

            $('#edit-post #save-edit').on('click', function() {
                var form = $(this).closest('form');
                $('#load').show();
                form.submit();
            });

            $('#post-result #hapus-post').on('click', function() {
                var id = $(this).data('id');
                var row = table.row(this.closest('tr'));

                if (confirm("Yakin ingin menghapus postingan ini?")) {
                    $('#load').show();
                    $.ajax({
                        type: "post",
                        url: "src/act_post.php",
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
            })


        });
    </script>
</body>

</html>