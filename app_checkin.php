<?php
	$userEmail = $_POST['mEmail'];
	$userLocation = $_POST['uLocation'];
	require("includes/mysql_connect.php");
	$query = mysql_query("INSERT INTO users (Location) VALUES ($userLocation) WHERE Email=$userEmail");
	 
?>