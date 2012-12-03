<?php
	$Email = $_POST['Email'];
	$PrivateName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Age = $_POST['Age'];
	$Password = $_POST['Password'];
	$Password1 = $_POST['Password1'];
	$Picture = $_POST['Picture'];
	//$Pic_format = mime_content_type($Picture);
	
	//$enc_password = md5($Password);  
	
	echo " $Email $PrivateName $LastName $Age $Password $Password1";
	
	if($Email && $PrivateName && $LastName && $Age && $Password && $Password1 && $Picture)
	{
		if(strlen($Password)<6)
		{
			echo "your password is too short";
		}
		else 
			if($Age < 18)
			{
				echo "you must be over 18";
			}
			else 
				/*if(($Pic_format != "image/png") && ($Pic_format != "image/jpeg") && ($Pic_format != "image/gif") && ($Pic_format != "image/bmp"))
				{
					echo "you didn't upload an image as picture";
				}
				else*/ if($Password == $Password1)
					{
						$connect = mysql_connect("mysql16.joinweb.co.il:3306", "whosinco_Itai", "YcNsIe13") or die ("Couldn't connect to database");
						mysql_select_db("whosinco_users1") or die ("couldn't find database");
		
						$query = mysql_query("INSERT INTO users VALUES ('$Email', '$PrivateName', '$LastName', '$Age', '$enc_password', '$Picture', '')");
						die("Registration complete! <a href='index.html'>Click here to login</a>");
					}
					else
					{
						echo "password must match";
					}	
			
			
	}
	else echo "All fields are required";

?>

