<?php

session_start();

$Email = $_POST['Email'];
$Password = $_POST['Password'];

if ($Email&&$Password)
{
	$connect = mysql_connect("mysql16.joinweb.co.il:3306", "whosinco_Itai", "YcNsIe13") or die ("Couldn't connect to database");
	mysql_select_db("whosinco_users1") or die ("couldn't find database");
	
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