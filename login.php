<?php

session_start();

$Email = $_POST['Email'];
$Password = $_POST['Password'];

if ($Email&&$Password)
{
	require("includes/mysql_connect.php");
	
	$query = mysql_query("SELECT * FROM users WHERE Email='$Email'");
	
	$numrows = mysql_num_rows($query);
	
	if($numrows != 0)
	
	{
		
		while ($row = mysql_fetch_assoc($query))
		{
			$dbEmail = $row['Email'];
			$dbPassword = $row['Password'];			
		}
		
			if ($Email==$dbEmail&&$Password==$dbPassword)
			{
				echo "Login successful. <a href='Profile.php'>Click here to enter the members area</a>";
				$_SESSION['Email']=$dbEmail;
			
			}
			else 
				echo "Incorrect Password";
				
		
		
	}
	else 
		die ("That Email does not exist");
	
}
else 
	die ("Please enter an Email and Password");

?>