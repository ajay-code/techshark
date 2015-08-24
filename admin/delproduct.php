<?php
	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();


	$obj->connect();
	$pid = $_GET["pid"];
	$query = "update products set status='0' where pid='$pid'";
	mysqli_query($obj->con,$query);

	header("location:products.php");
?>