<?php
	include_once("../classes/content_about.php");

	$content_aboutDAO = new content_aboutDAO();
	$content_about = new content_about();

	if(isset($_POST["id"])){
		$content_about->setId($_POST["id"]);
	}

	if(isset($_POST["about"])){
		$content_about->setContent($_POST["about"]);
	}

	$error=$content_aboutDAO->save($content_about);
	if($error==null){
		header("Location:../admin/about?status=success");
	}else{
		header("Location:../admin/about?status=erro&error=".$error);
	}

	
?>