<?php	 
<<<<<<< HEAD
$connect = mysql_connect("mysql16.joinweb.co.il:3306", "whosinco_Itai", "YcNsIe13") or die ("Couldn't connect to database");
	mysql_select_db("whosinco_users1") or die ("couldn't find database");
	?>
=======
	// Host name
	$host = "***************";
	 
	// Database username
	$username = "*************";
	 
	// Database password
	$password = "********";
	 
	// Name of database
	$database = "**************";
	 
	$conn = mysql_connect($host, $username, $password) or die ("Could not connect");
	$db = mysql_select_db($database, $conn) or die ("Could not select DB");
	 
	?>
>>>>>>> b2a75201937c928597fa81a89b827e5e6bf3f49b
