<?php

$filename = "reservation";

include "src/header.php";
include "src/myFunc.php";

?>
<div class="hero-wrap" style="background-image: url('images/bg_3.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home</a></span>
                        <span>Reservation</span>
                    </p>
                    <h1 class="mb-4 bread">Reservation</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pb ftco-room">
    <!-- Main Content -->
    <div class="container-fluid px-0 mb-3">
        <div class="row no-gutters justify-content-center h-100 mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Griya Sarre Hotel</span>
                <h2 class="mb-4">Hotel Reservation</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <!-- Rooms Search Action -->
                <div class="col-md-4 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
                    <div class="heading-section mb-4 my-5 my-md-0">
                        <!-- Form Element sizes -->
                        <div class="card card-blue">
                            <div class="card-header">
                                <span class="subheading text-center">Check Availability</span>
                            </div>
                            <div class="card-body text-center">
                                <form method="post" id="filter-room" class="booking-form aside-stretch">
                                    <div class="row">
                                        <div class="col-md-12 d-flex py-md-4">
                                            <div class="form-group align-self-stretch d-flex">
                                                <div class="wrap align-self-stretch">
                                                    <input type="text" class="form-control checkin_date" id="check-in" placeholder="Check-in date" name="check-in" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex py-md-4">
                                            <div class="form-group align-self-stretch d-flex">
                                                <div class="wrap align-self-stretch">
                                                    <input type="text" class="form-control checkout_date" id="check-out" placeholder="Check-out date" name="check-out" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex py-md-4">
                                            <div class="form-group align-self-stretch d-flex">
                                                <div class="wrap align-self-stretch">
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                            <select name="guest" id="filter-guest" class="form-control" required>
                                                                <option selected disabled>Guest</option>
                                                                <option value="1">1 Adult</option>
                                                                <option value="2">2 Adult</option>
                                                                <option value="3">3 Adult</option>
                                                                <option value="4">4 Adult</option>
                                                                <option value="5">5 Adult</option>
                                                                <option value="6">6 Adult</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <!-- Rooms Search Result -->
                <div class="col-md-8">
                    <!-- Hasil Filter muncul disini -->
                    <table class="table">
                        <tbody id="filter-result">
                            <?php

                            require_once "src/database.php";

                            if (isset($_POST['guest'])) {
                                $guest = $_POST['guest'];
                            } else if (isset($_GET['guest'])) {
                                $guest = $_GET['guest'];
                            } else {
                                $guest = 1;
                            }

                            $filter = mysqli_query($conn, "SELECT * FROM room_type WHERE capacity>=$guest AND amount>0");

                            while ($room = mysqli_fetch_assoc($filter)) {

                            ?>
                                <tr>
                                    <td scope='row'>
                                        <div class='row no-gutters mb-2'>
                                            <div class='col-md-12 order-md-last d-flex'>
                                                <div class='room-wrap d-md-flex'>
                                                    <a href='#' class='img w-50 h-auto' style='background-image: url(/images/Rooms/<?= $room['image'] ?>)'></a>
                                                    <div class='half d-flex align-items-center'>
                                                        <div class='text p-2 text-center'>
                                                            <p class='star mb-0'><span class='ion-ios-star'></span><span class='ion-ios-star'></span><span class='ion-ios-star'></span><span class='ion-ios-star'></span><span class='ion-ios-star'></span></p>
                                                            <p class='mb-0'><span class='price mr-1'><?= rp_format($room['price']) ?></span> <span class='per'> /
                                                                    night</span></p>
                                                            <h5 class='mb-3'><a href='rooms.php'><?= $room['name'] ?></a></h5>
                                                            <p class='pt-1'><button type='button' id='book-modal-btn' class='btn-custom px-1 py-0 rounded' data-id='<?= $room['type_id'] ?>'>Book Now <span class='icon-long-arrow-right'></span></button></p>

                                                        </div>
                                                        <div class='text text-dark p-2 text-left'>
                                                            <p class='mb-0'><span class='mr-1 per'> <?= $room['size'] ?> <i class='fas fa-cube'></i> m&#178;</span></p>
                                                            <p class='mb-0'><span class='mr-1 per'> <?= $room['capacity'] ?> <i class='fas fa-user'></i> </span></p>
                                                            <p class='mb-0'><span class='mr-1 per'><i class='fas fa-wifi'> </i> <i class='fas fa-fan'></i> <i class='fas fa-utensils'></i></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                    <!-- End Hasil Filter -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
    </div>
</section>

<!-- Modal Booking -->
<form method="post" action="" id="form-book">
    <div class="modal fade" id="book-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Book a room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <!-- <div class="row">
                            <div class="col-6">
                                <div class="form-group-sm">
                                    <small class="form-text text-muted text-left">First Name</small>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group-sm">
                                    <small class="form-text text-muted text-left">Last Name</small>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group-sm">
                                    <small class="form-text text-muted text-left">Email</small>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group-sm">
                                    <small class="form-text text-muted text-left">Telephone</small>
                                    <input type="tel" class="form-control" name="telephone" placeholder="Telephone" required>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-sm">
                                    <small class="form-text text-muted text-left">Check In</small>
                                    <input type="text" class="form-control checkout_date" id="book-check-in" name="checkin" placeholder="Check in" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-sm">
                                    <small class="form-text text-muted text-left">Check Out</small>
                                    <input type="text" class="form-control checkout_date" id="book-check-out" name="checkout" placeholder="Check out" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-sm">
                                    <small class="form-text text-muted text-left">Room Type</small>
                                    <select class="form-control" name="room_type" id="select-room" required>
                                        <!-- <option selected disabled>Room Type</option> -->
                                        <?php

                                        require_once "src/database.php";

                                        $types = mysqli_query($conn, "SELECT room_type.name, room_type.type_id as id FROM room_type WHERE amount != 0");

                                        while ($type = mysqli_fetch_assoc($types)) {
                                        ?>

                                            <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>

                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-sm">
                                    <small class="form-text text-muted text-left">Guest</small>
                                    <select name="guest" class="form-control" required>
                                        <option value="1">1 Adult</option>
                                        <option value="2">2 Adult</option>
                                        <option value="3">3 Adult</option>
                                        <option value="4">4 Adult</option>
                                        <option value="5">5 Adult</option>
                                        <option value="6">6 Adult</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group-sm">
                                    <small class="form-text text-muted text-left">Notes</small>
                                    <textarea class="form-control" name="notes" rows="3" placeholder="Notes"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="bookBtn" class="btn btn-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal -->

<!-- Confirm Modal -->
<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="overflow-y: auto !important;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <!-- Result Muncul Disini -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>

                <?php
                if (isset($_SESSION['authenticated'])) {
                ?>
                    <button type="button" id="submit-book" class="btn btn-primary">Book</button>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<footer class="ftco-footer ftco-section img" style="background-image: url(images/bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Griya Sarre</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Useful Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Blog</a></li>
                        <li><a href="#" class="py-2 d-block">Rooms</a></li>
                        <li><a href="#" class="py-2 d-block">Amenities</a></li>
                        <li><a href="#" class="py-2 d-block">Gift Card</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Privacy</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Career</a></li>
                        <li><a href="#" class="py-2 d-block">About Us</a></li>
                        <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        <li><a href="#" class="py-2 d-block">Services</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
                                    View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
                                        210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template
                    is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

<script src="plugins/jquery-form/jquery.form.min.js"></script>

<script type="text/javascript">
    $(function() {
        $.fn.modal.Constructor.prototype._enforceFocus = function() {};

        $('#filter-result #book-modal-btn').on('click', function() {
            $('#book-modal').modal('show');

            $('#form-book #select-room').val($(this).data('id'));
        });

        $("#filter-guest").on('change', function() {
            var data = $('#filter-room').serializeArray();
            $.ajax({
                url: "src/act_filter.php",
                type: "post",
                data: data,
                success: function(rsp) {
                    $('#load').show();

                    $('#filter-result').replaceWith(rsp);
                    $('#load').hide();

                    $('#filter-result #book-modal-btn').on('click', function() {
                        $('#book-modal').modal('show');

                        $('#form-book #select-room').val($(this).data('id'));
                    });
                }
            });
        });

        $("#form-book").ajaxForm({
            url: "src/act_book.php",
            type: "post",
            success: function(rsp) {
                $('#book-modal').modal('hide');
                $('table.table tbody').replaceWith(rsp);
                $('#modal-confirm').modal('show');

            }
        });

        $("#submit-book").on('click', function() {

            $.ajax({
                url: "src/act_book.php?submit=y",
                type: "post",
                data: $("#form-book").serializeArray(),
                success: function(rsp) {
                    $('table.table tbody').replaceWith(rsp);
                    $("#submit-book").replaceWith("<a href='/src/user_dashboard.php' class='btn btn-primary'>Dashboard</a>");
                    $('#modal-confirm').modal('show');

                }
            });
        });
    });
</script>

</body>

</html>