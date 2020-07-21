<?php
	include_once("../classes/testimony.php");

	$testimony = new testimony();
	$testimonyDAO = new TestimonyDAO();

	$page = $_POST["page"];

	

	if(isset($_POST["update"])){

		if(empty($_FILES["photo"]["name"])&& $_POST["id"]==0){
			header("location:../admin/testimony?status=erro&error=Photo is Required!");
			die();

		}else if(empty($_FILES["photo"]["name"])) {
			$testimony->setChangedPicture(false);
			
		}else{
			$testimony->setChangedPicture(true);
			$testimony->setOldPhoto($_POST["oldPhoto"]);
			$newName = $_FILES["photo"]["name"];
			$testimony->setPhoto($newName);

			move_uploaded_file($_FILES["photo"]["tmp_name"], "../img/".$newName);
		}

		$testimony->setId($_POST["id"]);
			

	}else{
		$newName = $_FILES["photo"]["name"];
		$testimony->setPhoto($newName);

		move_uploaded_file($_FILES["photo"]["tmp_name"], "../img/".$newName);

	}
	
	$testimony->setName($_POST["name"]);

	$testimony->setOccupation($_POST["occupation"]);

	$testimony->setTestimony($_POST["testimony"]);


	$erro=$testimonyDAO->save($testimony);

		

	if($erro==null){

		header("location:../admin/".$page."?status=success");
	}else{
		header("location:../admin/".$page."?status=erro&error=".$erro);
	}
	
?>