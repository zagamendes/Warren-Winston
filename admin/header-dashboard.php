<?php
	/*session_start();
	if(!isset($_SESSION["user"])){
			header('location:../admin pages/login.php');
	}*/

	isset($_GET["error"]) ? $error = $_GET["error"] : $error = false;

	isset($_GET["status"])&&$_GET["status"]=="ok" ? $status = true : $status = false;
					
	//include_once("../parameters.php");
	$currentPage = basename($_SERVER['SCRIPT_NAME']);

	$extensions = array("jpg","gif","png","jpeg");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Warren Winston</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/bootstrap-notify.min.js"></script>
		<script src="../js/notification.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/fa/css/all.css">
		<link rel="stylesheet" type="text/css" href="../css/animate.css">
		<script src="../js/ckeditor/ckeditor.js"></script>
		

		
		<style type="text/css">
			.font-weight-bold{
				font-weight: bold;
			}
			
			.container{
				position: relative;
			}
			.navbar-default{
				background: #0079BE !important;
				margin-bottom: 0;

			}
			.navbar-default a{
				color: white !important;
			}
			.table-hover tr:hover{
				background: #C72328 !important;
				color: white;
			}
			.active a{
				background: #C72328 !important;
			}
			.navbar-nav a:hover{
				background-color:#C72328 !important;
				color: #fff;
				transition: all .3s;
			}
			nav{
				margin: 0 !important;
				position: sticky !important;
				z-index: 100;
				top: 0;

			}
			
		</style>
</head>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a href="index" class="navbar-brand font-weight-bold text-uppercase">Dashboard</a>
		<button class="navbar-toggle navigation-bar burger-button" data-toggle="collapse" data-target="#navigation-bar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span> 
		</button>
	</div>
	
	<div id="navigation-bar" class="collapse navbar-collapse">
	
		<ul class="nav navbar-nav pages-list font-weight-bold">
				
								
			<li <?php if($currentPage==="home.php")echo 'class=active';?>>
				<a href="home" class="text-uppercase font-weight-bold">home</a>
			</li>

			<li <?php if($currentPage==="about.php")echo 'class=active';?>>
				<a href="about">ABOUT</a>
			</li>
								
			<li <?php if($currentPage==="program.php")echo 'class=active';?>>
				<a href="program" class="text-uppercase font-weight-bold">Successful Male</a>
			</li>
			
			<li <?php if($currentPage==="workshops.php")echo 'class=active';?>>
				<a href="workshops" class="text-uppercase font-weight-bold">Workshops</a>
			</li>

			<li <?php if($currentPage==="testimonies.php")echo 'class=active';?>>
				<a href="testimonies" class="text-uppercase font-weight-bold">Testimonies</a>
			</li>
			
		</ul>
	
	</div>

		
		
</nav>

