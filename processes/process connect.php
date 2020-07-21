<?php
	include_once("../classes/content_connect.php");
	


	$content_connectDAO = new content_connectDAO();
	$content_connect = new content_connect();

	if(isset($_POST["id"])){
		$content_connect->setId($_POST["id"]);
	}

	if(isset($_POST["connect"])){
		$content_connect->setContent($_POST["connect"]);
	}

	$error=$content_connectDAO->save($content_connect);
	if($error==null){
		header("Location:../admin/connect?status=success");
	}else{
		header("Location:../admin/connect?status=erro&error=".$error);
	}

	
?>