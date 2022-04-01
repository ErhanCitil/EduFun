<?php
include '../../dbConnection.php';
session_start();
if (!isset($_SESSION["useruid"])) {
	header("location: ../../login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf8_general_ci">
	<title>Edufun - LeaderBoard</title>
	<meta property="og:site_name" content="Edufun">
	<link rel="shortcut icon" type="image/png" href="../../img/icon.png">
	<meta property="og:image" content="../../img/icon.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../../css/font-awesome.css">
</head>

<body>
	<header id="header">
		<div class="header">
			<div class="logo">
				<a href="#"><img src="../../img/logo.png"></a>
			</div>
			<div class="log">
				<?php
				if (isset($_SESSION["useruid"])) {
				?>
					<!-- <a href="profile" class="profile"><i class="fa fa-user" aria-hidden="true"></i> <?php echo  $_SESSION["useruid"]; ?></a> -->
					<a href="../../logout" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
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
							<a href="../../index"><i class="fa fa-home" aria-hidden="true"></i> Edufun </a>
						</li>
						<!-- <li class="menu-item ">
							<a href="List"><i class="fa fa-list" aria-hidden="true"></i> List </a>
						</li> -->
						<li class="menu-item">
							<a href="../../games.php"><i class="fa fa-gamepad" aria-hidden="true"></i> Games </a>
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
				<p><i class="fa fa-trophy" aria-hidden="true"></i> LeaderBoard </p>
			</div>

			<div class="leaderboard">
				<h1>
					Quiz Nedelands Leaderboard
				</h1>
				<ol>
					<?php
					$sql = "SELECT users.usersUid, quiz_score.score FROM users RIGHT JOIN quiz_score ON users.usersUid = quiz_score.useruid ORDER BY score DESC LIMIT 5";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {

					?>
							<li>
								<mark><?php echo  $row["usersUid"]; ?></mark>
								<small><?php echo  $row["score"]; ?></small>
							</li>
					<?php
						}
					} else {
						echo "Geen Lijst gevonden";
					} ?>
				</ol>
			</div>
		</div>
	</section>
	<script src="../../script.js"></script>

</body>

</html>