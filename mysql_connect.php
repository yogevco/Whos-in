<?php	 
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
