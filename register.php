<?php
	$Email = $_POST['Email'];
	$PrivateName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Age = $_POST['Age'];
	$Password = $_POST['Password'];
	$Password1 = $_POST['Password1'];
	$Picture = $_POST['Picture'];
	
	$enc_password = md5($Password);
	
	echo " '$Email' '$PrivateName' $LastName $Age $Password $Password1 ";
	
	if($Email && $PrivateName && $LastName && $Age && $Password && $Password1 && $Picture)
	{
		if(strlen($PrivateName)>30)
		{
			echo "your name is too long";
		}
		if(strlen($LastName)>30)
		{
			echo "your last name is too long";
		}
		if($Age < 18)
		{
			echo "you must be over 18";
		}
		else 
		{
			if($Password == $Password1)
			{
				echo "ready to access database";
			}
			else
			{
				echo "password must match";
			}
			
		}
	}
	else echo "All fields are required";

?>

