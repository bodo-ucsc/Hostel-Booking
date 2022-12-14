<?php
	include("connect.php");
	$id = $_GET['user_id'];
	$q = "delete from grocerytb where user_id = $id ";
	mysqli_query($con,$q);
	
?>