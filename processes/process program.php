<?php
	include_once("../classes/content_program_right_side.php");
	


	$content_program_right_sideDAO = new content_program_right_sideDAO();
	$content_program_right_side = new content_program_right_side();



	if(isset($_POST["id_program_right_side"])){
		$content_program_right_side->setId($_POST["id_program_right_side"]);
	}

	if(isset($_POST["content_program_right_side"])){
		$content_program_right_side->setContent($_POST["content_program_right_side"]);
	}

	$error=$content_program_right_sideDAO->save($content_program_right_side);
	if($error==null){
		header("Location:../admin/program?status=success");
	}else{
		header("Location:../admin/program?status=erro&error=".$error);
	}

	
?>