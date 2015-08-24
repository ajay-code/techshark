<?php
	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();


	$obj->connect();
	$bid = $_GET["id"];
	$query = "update brands set status='0' where bid='$bid'";
	mysqli_query($obj->con,$query);
	
	header("location:brands.php");
?>