<?php	 
	// Host name
	$host = "mysql16.joinweb.co.il:3306";
	 
	// Database username
	$username = "whosinco_Itai";
	 
	// Database password
	$password = "YcNsIe13";
	 
	// Name of database
	$database = "whosinco_users1";
	 
	$conn = mysql_connect($host, $username, $password) or die ("Could not connect");
	$db = mysql_select_db($database, $conn) or die ("Could not select DB");
	 
	?>