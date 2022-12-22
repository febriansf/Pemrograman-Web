<?php

$filename = "index";

include "src/header.php";

?>
<div class="hero">
	<section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image:url(images/bg_1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-end">
					<div class="col-md-6 ftco-animate">
						<div class="text">
							<h2>More than a hotel... an experience</h2>
							<h1 class="mb-3">Hotel for the whole family, all year round.</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image:url(images/bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-end">
					<div class="col-md-6 ftco-animate">
						<div class="text">
							<h2>Griya Sarre Hotel &amp; Resort</h2>
							<h1 class="mb-3">It feels like staying in your own home.</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-12">
				<form action="reservation.php" method="post" id="search-room" class="booking-form aside-stretch">
					<div class="row">
						<div class="col-md d-flex py-md-4">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
									<label for="#">Check-in Date</label>
									<input type="text" class="form-control checkin_date" id="check-in" placeholder="Check-in date" name="check-in">
								</div>
							</div>
						</div>
						<div class="col-md d-flex py-md-4">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
									<label for="#">Check-out Date</label>
									<input type="text" class="form-control checkout_date" id="check-out" placeholder="Check-out date" name="check-out">
								</div>
							</div>
						</div>
						<div class="col-md d-flex py-md-4">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
									<label for="#">Guests</label>
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="ion-ios-arrow-down"></span></div>
											<select name="guest" id="guest" class="form-control">
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
						<div class="col-md d-flex">
							<div class="form-group d-flex align-self-stretch">
								<button type="submit" class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block" id="avail-check" name="check" value="check"><span>Check
										Availability <small>Best Price Guaranteed!</small></span></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Welcome to Griya Sarre Hotel</span>
				<h2 class="mb-4">You'll Never Want To Leave</h2>
			</div>
		</div>
		<div class="row d-flex">
			<div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services py-4 d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-reception-bell"></span>
						</div>
					</div>
					<div class="media-body">
						<h3 class="heading mb-3">Friendly Service</h3>
					</div>
				</div>
			</div>
			<div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services active py-4 d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-serving-dish"></span>
						</div>
					</div>
					<div class="media-body">
						<h3 class="heading mb-3">Get Breakfast</h3>
					</div>
				</div>
			</div>
			<div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
				<div class="media block-6 services py-4 d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-car"></span>
						</div>
					</div>
					<div class="media-body">
						<h3 class="heading mb-3">Transfer Services</h3>
					</div>
				</div>
			</div>
			<div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services py-4 d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-spa"></span>
						</div>
					</div>
					<div class="media-body">
						<h3 class="heading mb-3">Suits &amp; SPA</h3>
					</div>
				</div>
			</div>
			<div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services py-4 d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="ion-ios-bed"></span>
						</div>
					</div>
					<div class="media-body">
						<h3 class="heading mb-3">Cozy Rooms</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-wrap-about ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-7 order-md-last d-flex">
				<div class="img img-1 mr-md-2 ftco-animate" style="background-image: url(images/about-1.jpg);">
				</div>
				<div class="img img-2 ml-md-2 ftco-animate" style="background-image: url(images/about-2.jpg);">
				</div>
			</div>
			<div class="col-md-5 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
				<div class="heading-section mb-4 my-5 my-md-0">
					<span class="subheading">About Griya Sarre Hotel</span>
					<h2 class="mb-4">Griya Sarre Hotel the Most Recommended Hotel All Over the World</h2>
				</div>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
					live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
					a large language ocean.</p>
				<p><a href="#" class="btn btn-secondary rounded">Reserve Your Room Now</a></p>
			</div>
		</div>
	</div>
</section>

<section class="testimony-section">
	<div class="container">
		<div class="row no-gutters ftco-animate justify-content-center">
			<div class="col-md-5 d-flex">
				<div class="testimony-img aside-stretch-2" style="background-image: url(images/testimony-img.jpg);">
				</div>
			</div>
			<div class="col-md-7 py-5 pl-md-5">
				<div class="py-md-5">
					<div class="heading-section ftco-animate mb-4">
						<span class="subheading">Testimony</span>
						<h2 class="mb-0">Happy Customer</h2>
					</div>
					<div class="carousel-testimony owl-carousel ftco-animate">
						<div class="item">
							<div class="testimony-wrap pb-4">
								<div class="text">
									<p class="mb-4">A small river named Duden flows by their place and supplies it
										with the necessary regelialia. It is a paradisematic country, in which
										roasted parts of sentences fly into your mouth.</p>
								</div>
								<div class="d-flex">
									<div class="user-img" style="background-image: url(images/person_1.jpg)">
									</div>
									<div class="pos ml-3">
										<p class="name">Gerald Hodson</p>
										<span class="position">Businessman</span>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap pb-4">
								<div class="text">
									<p class="mb-4">A small river named Duden flows by their place and supplies it
										with the necessary regelialia. It is a paradisematic country, in which
										roasted parts of sentences fly into your mouth.</p>
								</div>
								<div class="d-flex">
									<div class="user-img" style="background-image: url(images/person_2.jpg)">
									</div>
									<div class="pos ml-3">
										<p class="name">Gerald Hodson</p>
										<span class="position">Businessman</span>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap pb-4">
								<div class="text">
									<p class="mb-4">A small river named Duden flows by their place and supplies it
										with the necessary regelialia. It is a paradisematic country, in which
										roasted parts of sentences fly into your mouth.</p>
								</div>
								<div class="d-flex">
									<div class="user-img" style="background-image: url(images/person_3.jpg)">
									</div>
									<div class="pos ml-3">
										<p class="name">Gerald Hodson</p>
										<span class="position">Businessman</span>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap pb-4">
								<div class="text">
									<p class="mb-4">A small river named Duden flows by their place and supplies it
										with the necessary regelialia. It is a paradisematic country, in which
										roasted parts of sentences fly into your mouth.</p>
								</div>
								<div class="d-flex">
									<div class="user-img" style="background-image: url(images/person_4.jpg)">
									</div>
									<div class="pos ml-3">
										<p class="name">Gerald Hodson</p>
										<span class="position">Businessman</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pb ftco-room">
	<div class="container-fluid px-0">
		<div class="row no-gutters justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Griya Sarre Rooms</span>
				<h2 class="mb-4">Hotel Master's Rooms</h2>
			</div>
		</div>
		<div class="row no-gutters">
			<?php
			include "src/myFunc.php";
			$rooms = get_data("room_type", "*", "room_type.price");
			$i = 0;
			while ($room = mysqli_fetch_assoc($rooms)) {
				$i++;
				if ($i > 2 && $i <= 4) {
					echo print_rooms($room['name'], $room['price'], $room['image'], 'right-arrow', 1);
					$i == 5 ? $i = 0 : $i;
				} else {
					echo print_rooms($room['name'], $room['price'], $room['image'], 'left-arrow', 1);
				}
			}
			?>

		</div>
	</div>
</section>


<section class="ftco-section ftco-menu bg-light">
	<div class="container-fluid px-md-4">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Restaurant</span>
				<h2>Restaurant</h2>
			</div>
		</div>
		<div class="row">

			<?php

			$menus = get_data("makanan", "*", "makanan_harga");

			$i = 0;
			while ($menu = mysqli_fetch_assoc($menus)) {
				if ($i > 3) {
					break;
				}
				echo print_menus($menu['makanan_nama'], $menu['makanan_harga'], $menu['makanan_ket'], $menu['makanan_gambar']);
				$i++;
			}

			?>

			<div class="col-md-12 text-center ftco-animate">
				<p><a href="#" class="btn btn-primary rounded">View All Menu</a></p>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Read Blog</span>
				<h2>Recent Blog</h2>
			</div>
		</div>
		<div class="row d-flex">
			<?php

			require "src/database.php";

			$blogs = mysqli_query($conn, "SELECT post.id, post.image, post.title, user.fullname, post.created_at, post.content FROM post 
		JOIN user ON post.uid = user.uid
		WHERE post.draft = 'no'
		ORDER BY post.created_at DESC");

			while ($post = mysqli_fetch_assoc($blogs)) {
				$date = date($post['created_at']);
			?>

				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry align-self-stretch">
						<a href="javascript:void(0);" class="block-20 rounded" style="background-image: url('images/Blog/<?= $post['image'] ?>');">
						</a>
						<div class="text mt-3">
							<div class="meta mb-2">
								<div><a href="javascript:void(0);"><?= $date ?></a></div>
								<div><a href="javascript:void(0);"><?= $post['fullname'] ?></a></div>
							</div>
							<h3 class="heading"><a href="#"><?= $post['title'] ?></a>
							</h3>
							<p class="d-inline-block text-truncate" style="max-width: 200px;"><?= $post['content'] ?></p>
							<div class="meta mb-2">
								<a href="blog.php" class="btn btn-secondary rounded">More info</a>
							</div>
						</div>
					</div>
				</div>

			<?php } ?>
		</div>
</section>

<section class="instagram">
	<div class="container-fluid">
		<div class="row no-gutters justify-content-center pb-5">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Photos</span>
				<h2><span>Instagram</span></h2>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-sm-12 col-md ftco-animate">
				<a href="images/insta-1.jpg" class="insta-img image-popup" style="background-image: url(images/insta-1.jpg);">
					<div class="icon d-flex justify-content-center">
						<span class="icon-instagram align-self-center"></span>
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md ftco-animate">
				<a href="images/insta-2.jpg" class="insta-img image-popup" style="background-image: url(images/insta-2.jpg);">
					<div class="icon d-flex justify-content-center">
						<span class="icon-instagram align-self-center"></span>
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md ftco-animate">
				<a href="images/insta-3.jpg" class="insta-img image-popup" style="background-image: url(images/insta-3.jpg);">
					<div class="icon d-flex justify-content-center">
						<span class="icon-instagram align-self-center"></span>
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md ftco-animate">
				<a href="images/insta-4.jpg" class="insta-img image-popup" style="background-image: url(images/insta-4.jpg);">
					<div class="icon d-flex justify-content-center">
						<span class="icon-instagram align-self-center"></span>
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md ftco-animate">
				<a href="images/insta-5.jpg" class="insta-img image-popup" style="background-image: url(images/insta-5.jpg);">
					<div class="icon d-flex justify-content-center">
						<span class="icon-instagram align-self-center"></span>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

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
<!-- <script src="js/bootstrap-datepicker.js"></script> -->
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>


</body>

</html>