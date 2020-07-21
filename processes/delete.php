<?php
	include_once("../classes/conexao.php");
	$db = new Connection();
	$connection=$db->connect_db();
	$id=$_GET["id"];
	$page=$_GET["page"];
	$table=$_GET["table"];
	$photo=$_GET["photo"];
	$error=$connection->query("delete from $table where id=$id");
	
	if($error){
		$db->close_db($connection);
		unlink("../img/".$photo);

		header("location:../admin/".$page."?status=success");	
	}else{
		$error = $connection->error;
		$db->close_db($connection);
		header("location:../admin/".$page."?status=erro&error=".$error);
	}
	
?>