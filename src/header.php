<?php

session_start();

$logged_in = false;
if (isset($_SESSION["authenticated"])) {
	if ($_SESSION["authenticated"] == "1") {
		$logged_in = true;
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Griya Sarre - Hotel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/jquery.timepicker.css">
	<link rel="stylesheet" href="css/jquery-ui.min.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="../index.php">Griya<span>Sarre</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>



			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item <?= $filename == "index" ? 'active' : '' ?>"><a href="../index.php" class="nav-link">Home</a></li>
					<li class="nav-item <?= $filename == "rooms" ? 'active' : '' ?>"><a href="../rooms.php" class="nav-link">Our Rooms</a></li>
					<li class="nav-item <?= $filename == "restaurant" ? 'active' : '' ?>"><a href="../restaurant.php" class="nav-link">Restaurant</a></li>
					<li class="nav-item <?= $filename == "about" ? 'active' : '' ?>"><a href="../about.php" class="nav-link">About Us</a></li>
					<li class="nav-item <?= $filename == "blog" ? 'active' : '' ?>"><a href="../blog.php" class="nav-link">Blog</a></li>
					<li class="nav-item <?= $filename == "contact" ? 'active' : '' ?>"><a href="../contact.php" class="nav-link">Contact</a></li>

					<?php

					if (!$logged_in) {

					?>
						<li class="nav-item"><a href="../login.php" class="nav-link">Log in</a></li>

					<?php } else { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle p-3" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="../images/user/avatar5.png" width="40" height="40" class="rounded-circle">
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="margin-top: -5px;">
								<p class="text-white text-center" style="background-color: #21cc7a;"><?= $_SESSION['fullname'] ?></p>
								<a class="dropdown-item" href="/src/user_dashboard.php">Dashboard</a>
								<a class="dropdown-item" href="/src/act_user.php?logout=y">Log Out</a>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->