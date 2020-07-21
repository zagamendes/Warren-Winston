<?php
	session_start();
	

	include_once("../classes/conexao.php");

	$db = new Connection();

	$connection=$db->connect_db();

	$user=$_POST["user"];
	$password=$_POST["password"];

	$data=$connection->query("select * from user where user= '$user' and password= '$password' ");
	if($data){
		$data_user=mysqli_fetch_assoc($data);
		if(isset($data_user["user"])){
			$_SESSION["user"]=$data_user["user"];
			$_SESSION["password"]=$data_user["password"];
			header("location:../admin/admin");	
		}
		else{
			header("location:../admin/login?erro=1");
		}
	}
		
	
?>