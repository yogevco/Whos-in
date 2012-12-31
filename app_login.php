<?php
$userEmail = $_POST['mEmail'];
$userPassword = $_POST['mPassword'];
$row;

//echo "this is our try on  app_login.php :) \t 				";
//echo "email recieved $userEmail \t 	:)						";
//echo "Password recieved $userPassword \t :)					";

	require("includes/mysql_connect.php");
	$query = mysql_query("SELECT * FROM users WHERE Email='$userEmail'");
	$count = mysql_num_rows($query);
	
//	echo "count is $count";
	
	if($count!=0)
	{
		$row = mysql_fetch_assoc($query);
		if($userPassword == $row['Password'])
			echo json_encode($row);	
		else echo "Incorrect password ";
	}
	else
		echo "Email not found ";
	mysql_free_result($query);
?>