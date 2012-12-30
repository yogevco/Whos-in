<?php
//register check
session_start();

	$Email = $_SESSION['Email'];
	$PrivateName = $_SESSION['FirstName'];
	$LastName = $_SESSION['LastName'];
	$Age = $_SESSION['Age'];
	$Password = $_SESSION['Password'];
	$Password1 = $_SESSION['Password1'];
	$Picture = $_SESSION['Picture'];
	//echo "$Email $PrivateName $LastName $Age $Password $Password1";
	
	$Success = true;
	
	if($Email && $PrivateName && $LastName && $Age && $Password && $Password1 && $Picture)
	    echo "All fields are full - GREEN <br/>";
	else
		{
		    echo "All fields are full - RED <br/>";
			$Success = false;
		}
	if($Age < 18)
		{
			echo "Over 18 years old - RED <br/>";
			$Success = false;
		}
	else 
		echo "Over 18 years old - GREEN  <br/>";
	if($Password == $Password1 && strlen($Password)!= 0)
		echo "Confirmed Password - GREEN <br/>";
	else
	{ 
		echo "Confirmed Password - RED <br/>";
		$Success = false;
	}
	if(strlen($Password) < 6)
		{
			echo "Password minimum of 6 chars - RED  <br/>";
			$Success = false;
		}
	else
		echo "Password minimum of 6 chars - GREEN  <br/>"; 
	
	$TARGET_PATH .= "images/";	
	$TARGET_PATH .= $Picture['name'];
	
	function is_valid_type($Picture)
	{
					    // This is an array that holds all the valid image MIME types
		$valid_types = array("image/jpg", "image/jpeg", "image/bmp", "image/gif");
	 
		if (in_array($Picture['type'], $valid_types))
			return 1;
		return 0;
	}
	
	if (!is_valid_type($Picture))
	{
	 echo "Picture format - RED <br/>";
	 $Success = false;
	}
	else
	    echo "Picture format - GREEN <br/>";
	
	
	if($Success)
		die("Registration complete! <a href='index.html'>Click here to login</a>");
	else
		{
			die("Registration failed! <a href='index.html'>Click here to try again</a>");
			$_session_destroy();
		}
?>