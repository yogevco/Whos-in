<?php

session_start();

$username = $_post['username'];
$password = $_post['password'];

if ($username&&$password)
{
	$connect = mysql_connect("mysql16.joinweb.co.il:3306", "whosinco_Itai", "YcNsIe13") or die ("Couldn't connect to database");
	mysql_select_db("whosinco_users1") or die ("couldn't find database");
	
	$query = mysql_query("SELECT * FROM users WHERE Email='$username'");
	
	$numrows = mysql_num_rows($query);
	
	if($numrows != 0)
	
	{
		
		while ($row = mysql_fetch_assoc($query))
		{
			$dbusername = $row['username'];
			$dbpassword = $row['password'];			
		}
		
			if ($username==$dbusername&&$password==$dbpassword)
			{
				echo "Login successful. <a href='membersarea.php'>Click here to enter the members area</a>";
				$_SESSION['username']=$dbusername;
			
			}
			else 
				echo "Incorrect password";
				
		
		
	}
	else 
		die ("That email does not exist");
	
}
else 
	die ("Please enter an email and password");

?>