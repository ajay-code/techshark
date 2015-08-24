<?php
 	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();
	
	
	$obj->connect();
	$admin_id=$_GET['admin_id'];
	$query="delete from admins where admin_id='$admin_id'";
	//echo $query;
	if(mysqli_query($obj->con,$query)){
	header("location:admins.php");
	}
	else{
		echo "failed";
	}
?>