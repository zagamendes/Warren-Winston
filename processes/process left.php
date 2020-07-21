<?php
	
	include_once("../classes/content_index_left_side.php");

	$content_index_left_sideDAO = new content_index_left_sideDAO();
	$content_index_left_side = new content_index_left_side();

	if(isset($_POST["id_index_left_side"])){
		$content_index_left_side->setId($_POST["id_index_left_side"]);
	}

	if(isset($_POST["content_index_left_side"])){
		$content_index_left_side->setContent($_POST["content_index_left_side"]);
	}

	

	$error=$content_index_left_sideDAO->save($content_index_left_side);
	if($error==null){
		header("Location:../admin/home?status=success");
	}else{
		header("Location:../admin/home?status=erro&error=".$error);
	}
?>