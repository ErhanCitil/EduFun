<?php
include '../dbConnection.php';
session_start();
if (!isset($_SESSION["useruid"])) {
	header("location: ../login.php");
	exit();
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta charset="utf8_general_ci">
	<title>Edufun - Grammatica Nedelands</title>
	<meta property="og:site_name" content="Edufun">
	<link rel="shortcut icon" type="image/png" href="../img/icon.png">
	<meta property="og:image" content="../img/icon.png">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="math.css">
	<link rel="stylesheet" href="../css/style.css">

</head>

<body>
	<header id="header">
		<div class="header">
			<div class="logo">
				<a href="#"><img src="../img/logo.png"></a>
			</div>
			<div class="log">
				<?php
				if (isset($_SESSION["useruid"])) {
				?>
					<!-- <a href="profile" class="profile"><i class="fa fa-user" aria-hidden="true"></i> <?php echo  $_SESSION["useruid"]; ?></a> -->
					<a href="../logout" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
				<?php
				} else {
				?>
					<a href="login" class="login"><i class="fa fa-sign-in" aria-hidden="true"></i> Log in</a>
					<a href="signup" class="signup"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign up</a>
				<?php
				}
				?>

			</div>
		</div>
		<div id="menu">
			<div class="menu">
				<nav class="nav">
					<ul>
						<li class="menu-item">
							<a href="../index"><i class="fa fa-home" aria-hidden="true"></i> Edufun </a>
						</li>
						<!-- <li class="menu-item ">
							<a href="List"><i class="fa fa-list" aria-hidden="true"></i> List </a>
						</li> -->
						<li class="menu-item">
							<a href="../games.php"><i class="fa fa-gamepad" aria-hidden="true"></i> Games </a>
						</li>
						<li class="menu-item">
							<a><button type="button" value="dark/light" onclick="myFunction1()"><i class="fa fa-sun-o" style="color: #8f8f8f;"></i></button></a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<section id="games">
		<div class="games-1">
			<div class="games-text">
				<p><i class="fa fa-calculator" aria-hidden="true"></i> Rekenen </p>
			</div>
			<div class="main">
				<p class="status">Je hebt <span class="point-needed">10</span> punten nodig</p>
				<p class="question"></p>
				<form action="" class="math-form">
					<input type="text" class="math-field" autocomplete="off">
					<button class="button submit">Submit</button>
					<p><span class="mistakes-made">2</span> fouten nog</p>
				</form>

				<div class="progress">
					<div class="boxes">
						<div class="box"></div>
						<div class="box"></div>
						<div class="box"></div>
						<div class="box"></div>
						<div class="box"></div>
						<div class="box"></div>
						<div class="box"></div>
						<div class="box"></div>
						<div class="box"></div>
						<div class="box"></div>
					</div>
					<div class="progress-inner"></div>
				</div>
			</div>
			<div class="overlay">
				<div class="overlay-inner">
					<p class="end-message"></p>
					<button class="start-over">Start Over</button>
				</div>
			</div>
		</div>
	</section>
	<script src="../script.js"></script>
	<script src="math.js"></script>

</body>

</html>