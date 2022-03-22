<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html dir="ltr" lang="ar">

<head>
	<meta charset="utf8_general_ci">
	<title>Edufun</title>
	<meta property="og:site_name" content="Edufun">
	<link rel="shortcut icon" type="image/png" href="img/icon.png">
	<meta property="og:image" content="img/icon.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="js/index.js"></script>
</head>

<body>
	<header id="header">
		<div class="header">
			<div class="logo">
				<a href="#"><img src="img/logo.png"></a>
			</div>
			<div class="log">
				<?php
				session_start();
				if (isset($_SESSION["username"])) {
				?>
					<a href="profile" class="profile"><i class="fa fa-user" aria-hidden="true"></i> <?php echo  $_SESSION["username"]; ?></a>
					<a href="logout" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
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
							<a href="index"><i class="fa fa-home" aria-hidden="true"></i> Edufun </a>
						</li>
						<li class="menu-item ">
							<a href="List"><i class="fa fa-list" aria-hidden="true"></i> List </a>
						</li>
						<li class="menu-item">
							<a href="game"><i class="fa fa-gamepad" aria-hidden="true"></i> Games </a>
						</li>
						<li class="menu-item active">
							<a href="contact"><i class="fa fa-info-circle" aria-hidden="true"></i> Contact Us</a>
						</li>
						<li class="menu-item">
							<a><button type="button" value="dark/light" onclick="myFunction()"><i class="fa fa-sun-o" style="color: #8f8f8f;"></i></button></a>
						</li>
					</ul>
				</nav>
				<div class="search">
					<input type="text" class="searchTerm" placeholder="Search">
					<button type="submit" class="searchButton">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
		</div>
	</header>
	<div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
            <h3 class="text-2xl font-bold text-center">Contact Formulier</h3>
            <form action="">
                <div class="mt-4">
                    <div class="flex">
                        <div class="mt-4">
                            <label class="block">Voornaam<label>
                                    <input type="text" placeholder="Voornaam"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="mt-4 pl-2">
                            <label class="block">Achternaam<label>
                                    <input type="password" placeholder="Achternaam"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block" for="email">Email<label>
                                <input type="text" placeholder="Email"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <!-- Wachtwoord sectie -->
                    <div class="flex">
                        <div class="mt-4">
                            <label class="block">Bericht</label>
                                <textarea name="bericht" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" id="" cols="20" placeholder="Bericht" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="flex">
                        <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Verzenden!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<script src="script.js"></script>

</body>

</html>
