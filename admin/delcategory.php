<?php
	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();


	$obj->connect();
	$catid = $_GET["id"];
	$query = "update categories set status='0' where catid='$catid'";
	mysqli_query($obj->con,$query);
	
	header("location:categories.php");
?>