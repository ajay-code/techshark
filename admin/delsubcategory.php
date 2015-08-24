<?php
	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();


	$obj->connect();
	$subcatid = $_GET["id"];
	$query = "update subcategories set status='0' where subcatid='$subcatid'";
	mysqli_query($obj->con,$query);
	
	header("location:subcategories.php");
?>