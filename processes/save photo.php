<?php
	include_once("../classes/photo.php");
	


	$photoDAO = new photoDAO();
	$photo = new photo();
	
	$page = $_POST["page"];

	//ADDING A NEW PICTURE FROM DASHBOARD PAGE
	if(isset($_POST["home"])){

		$photo->setTitle($_POST["title"]);
		$photo->setDescription($_POST["description"]);
		$photo->setPhoto($_FILES["photo"]["name"]);
		$photo->setTable($_POST["table"]);

	//CHANGING A PICTURE FROM INDEX/HOME SLIDESHOW
	}else if(isset($_POST["slideshow"])){

		if(!empty($_FILES["photo"]["name"])){
			$photo->setPhoto($_FILES["photo"]["name"]);
		}
		$photo->setId($_POST["id"]);
		$photo->setTitle($_POST["title"]);
		$photo->setDescription($_POST["description"]);
		$photo->setTable($_POST["table"]);
		$photo->setOldPhoto($_POST["oldphoto"]);
	}
	//CHANGING ANY PICTURE FROM ANY PAGE
	else{
		$photo->setPhoto($_FILES["photo"]["name"]);
	
		$photo->setTable($_POST["table"]);
		
		$photo->setId($_POST["id"]);

		$photo->setOldPhoto($_POST["oldphoto"]);



	}


	
	
	

	$error=$photoDAO->save($photo);
	if($error==null){
		move_uploaded_file($_FILES["photo"]["tmp_name"],"../img/".$_FILES["photo"]["name"]);

		header("Location:../admin/".$page."?status=success");
	}else{
		header("Location:../admin/".$page."status=erro&error=".$error);
	}
	

?>