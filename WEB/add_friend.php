<?php
	session_start();
	if(isset($_SESSION['Email'])) {
	// echo "Welcome Back: " . $_SESSION['Email'];
	}
	$my_email = $_SESSION['Email'];
	$friend_email = $_POST['FEmail'];
	require("includes/mysql_connect.php");
	$query = mysql_query("SELECT * FROM users WHERE Email='$friend_email'");
	if(mysql_num_rows($query)==0)
		 header("Location: Profile.php");
	mysql_query("INSERT INTO friends_list VALUES ('$my_email', '$friend_email')");
	mysql_query("INSERT INTO friends_list VALUES ('$friend_email', '$my_email')");
	header("Location: Profile.php");
?>