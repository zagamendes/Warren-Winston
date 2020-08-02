<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']);
?>
<html>

<head>
	<title>Warren Winston</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/WarrenWinston-logo-clr.png">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">

	<script type="text/javascript" src="functions.js"></script>
	<link rel="stylesheet" type="text/css" href="css/fa/css/all.css">
	<link rel="image_src" href="img/WarrenWinston-logo-clr.png">

	<meta property="og:url" content="192.168.0.22/warren/" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Warren Winston" />
	<meta property="og:description" content="A renowned leader in the global marketplace; Warren is a voice and agent who creates tools that inspire, teach and connects the world to resources and relationships that grow the bottom line by using his unique leading-edge strategies to radically add value. As a gentleman ambassador, Warren diligently focuses on helping to effect change in thousands of individuals by using his leverage to create value and equip nations for global success. Request a complimentary consultation today, and he'll explain how he can help you to grow significantly!" />
	<meta property="og:image" content="img/WarrenWinston-logo-clr.png" />

</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=">compartilhar</a>
				<a href="index">
					<img src="img/WarrenWinston-logo-wht.png" class="logo">
				</a>
				<button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>


			<div id="barra-navegacao" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li <?php if ($currentPage === "index.php") echo 'class=active'; ?>><a href="index" class="active" id="home">Home</a></li>
					<li <?php if ($currentPage === "about.php") echo 'class=active'; ?>><a href="about">About</a></li>
					<li id="programs" <?php if ($currentPage === "business.php" || $currentPage === "program.php" || $currentPage === "workshops.php") echo 'class=active'; ?>>
						<a href="#">Programs<span class="caret"></span></a>
						<ul class="menu-dropdown" id="menu-dropdown">
							<li><a href="business">Doing Business Unsual</a></li>
							<li><a href="program">The Successful Male</a></li>
							<li><a href="workshops">Workshops</a></li>
						</ul>
					</li>
					<li <?php if ($currentPage === "connect.php") echo 'class=active'; ?>><a href="connect">Connect</a></li>
				</ul>
			</div>
		</div>
	</nav>