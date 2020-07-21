<?php
	include_once("../classes/content_index_right_side.php");
	


	$content_index_right_sideDAO = new content_index_right_sideDAO();
	$content_index_right_side = new content_index_right_side();



	if(isset($_POST["id_index_right_side"])){
		$content_index_right_side->setId($_POST["id_index_right_side"]);
	}

	if(isset($_POST["content_index_right_side"])){
		$content_index_right_side->setContent($_POST["content_index_right_side"]);
	}


	$error=$content_index_right_sideDAO->save($content_index_right_side);
	if($error==null){
		header("Location:../admin/home?status=success");
	}else{
		header("Location:../admin/home?status=erro&error=".$error);
	}

	
?>