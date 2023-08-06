<?php
session_start();

$location = 'dashboard';

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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- /. main-content  -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <?php

                    require_once "src/koneksi.php";

                    $query = array(
                        "user" => "SELECT COUNT(user.created_at) as user_registered FROM user WHERE user.isadmin = 0;",
                        "reservation" => "SELECT COUNT(reservation.created_at) FROM reservation;",
                        "confirm" => "SELECT COUNT(booking.status) FROM booking WHERE booking.status='Confirmed'",
                        "pending" => "SELECT COUNT(booking.status) FROM booking WHERE booking.status='Pending';",
                    );

                    $data = array(
                        "user" => 0,
                        "reservation" => 0,
                        "confirm" => 0,
                        "pending" => 0
                    );

                    foreach ($query as $k => $v) {
                        $result = mysqli_query($conn, $v);

                        $data[$k] = mysqli_fetch_row($result)[0];
                    }

                    ?>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $data['user'] ?></h3>

                                    <p>New User</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $data['reservation'] ?></h3>

                                    <p>Total Reservation</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="reservation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $data['confirm'] ?></h3>

                                    <p>Confirmed Reservation</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="reservation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $data['pending'] ?></h3>

                                    <p>Pending Reservation</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="reservation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    <!-- Chart -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Sales
                                    </h3>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="hotel-charts" style="position: relative; height: 300px;">
                                    </div>

                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </section>
                        <!-- /.content -->
                    </div>
                    <!-- /.container-fluid -->


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
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <?php include "src/scripts.php" ?>

        <!-- Page specific script -->
        <script type="text/javascript">
            // A point click event that uses the Renderer to draw a label next to the point
            // On subsequent clicks, move the existing label instead of creating a new one.
            Highcharts.addEvent(Highcharts.Point, 'click', function() {
                if (this.series.options.className.indexOf('popup-on-click') !== -1) {
                    const chart = this.series.chart;
                    const date = Highcharts.dateFormat('%A, %b %e, %Y', this.x);
                    const text = `<b>${date}</b><br/>${this.y} ${this.series.name}`;

                    const anchorX = this.plotX + this.series.xAxis.pos;
                    const anchorY = this.plotY + this.series.yAxis.pos;
                    const align = anchorX < chart.chartWidth - 200 ? 'left' : 'right';
                    const x = align === 'left' ? anchorX + 10 : anchorX - 10;
                    const y = anchorY - 30;
                    if (!chart.sticky) {
                        chart.sticky = chart.renderer
                            .label(text, x, y, 'callout', anchorX, anchorY)
                            .attr({
                                align,
                                fill: 'rgba(0, 0, 0, 0.75)',
                                padding: 10,
                                zIndex: 7 // Above series, below tooltip
                            })
                            .css({
                                color: 'white'
                            })
                            .on('click', function() {
                                chart.sticky = chart.sticky.destroy();
                            })
                            .add();
                    } else {
                        chart.sticky
                            .attr({
                                align,
                                text
                            })
                            .animate({
                                anchorX,
                                anchorY,
                                x,
                                y
                            }, {
                                duration: 250
                            });
                    }
                }
            });


            Highcharts.chart('hotel-charts', {

                chart: {
                    scrollablePlotArea: {
                        minWidth: 700
                    }
                },

                data: {
                    csvURL: ([1, 2, 3, 4]),
                    beforeParse: function(csv) {
                        return csv.replace(/\n\n/g, '\n');
                    }
                },

                title: {
                    text: ''
                },


                xAxis: {
                    tickInterval: 7 * 24 * 3600 * 1000, // one week
                    tickWidth: 0,
                    gridLineWidth: 1,
                    labels: {
                        align: 'left',
                        x: 3,
                        y: -3
                    }
                },

                yAxis: [{ // left y axis
                    title: {
                        text: null
                    },
                    labels: {
                        align: 'left',
                        x: 3,
                        y: 16,
                        format: '{value:.,0f}'
                    },
                    showFirstLabel: false
                }, { // right y axis
                    linkedTo: 0,
                    gridLineWidth: 0,
                    opposite: true,
                    title: {
                        text: null
                    },
                    labels: {
                        align: 'right',
                        x: -3,
                        y: 16,
                        format: '{value:.,0f}'
                    },
                    showFirstLabel: false
                }],

                legend: {
                    align: 'left',
                    verticalAlign: 'top',
                    borderWidth: 0
                },

                tooltip: {
                    shared: true,
                    crosshairs: true
                },

                plotOptions: {
                    series: {
                        cursor: 'pointer',
                        className: 'popup-on-click',
                        marker: {
                            lineWidth: 1
                        }
                    }
                },

                series: [{
                    name: 'All sessions',
                    lineWidth: 4,
                    marker: {
                        radius: 4
                    }
                }, {
                    name: 'New users'
                }]
            });


            $(function() {
                $('#room-type').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
</body>

</html>