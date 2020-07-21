<?php
	include_once("../classes/content_workshop_right_side.php");
	


	$content_program_left_sideDAO = new content_workshop_right_sideDAO();
	$content_program_left_side = new content_workshop_right_side();



	if(isset($_POST["id_workshop_right_side"])){
		$content_program_left_side->setId($_POST["id_workshop_right_side"]);
	}

	if(isset($_POST["content_workshop_right_side"])){
		$content_program_left_side->setContent($_POST["content_workshop_right_side"]);
	}

	$error=$content_program_left_sideDAO->save($content_program_left_side);
	if($error==null){
		header("Location:../admin/workshops?status=success");
	}else{
		header("Location:../admin/workshops?status=erro&error=".$error);
	}

	
?>