<?php
	$Email = $_POST['Email'];
	$PrivateName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Age = $_POST['Age'];
	$Password = $_POST['Password'];
	$Password1 = $_POST['Password1'];
	$Picture = $_FILES['Picture'];
	//$Pic_format = mime_content_type($Picture);
	//$enc_password = md5($Password);
	echo " $Email $PrivateName $LastName $Age $Password $Password1";
	
	
	/*$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}
	
	*/
	
	if($Picture['name']=="")
	{
		echo "you didnt upload pictur    ";
	}
	
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
			else  if($Password == $Password1)
					{
						$TARGET_PATH .= "images/";
	
			/*			$Email = mysql_real_escape_string($Email);
						$PrivateName = mysql_real_escape_string($PrivateName);
						$LastName = mysql_real_escape_string($LastName);
						$Age = mysql_real_escape_string($Age); */
					//	$Picture['name'] = mysql_real_escape_string($Picture['name']);
	
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
							echo "type no good";
						 //   header("Location: index.html");
							//    exit;
						}
	  
	
						require("includes/mysql_connect.php");
	
						if (file_exists($TARGET_PATH))
						{
							echo "file already exist";
						  //  header("Location: index.html");
						  //  exit;
						}
	
						if (move_uploaded_file($Picture['tmp_name'], $TARGET_PATH))
						{
	    // NOTE: This is where a lot of people make mistakes.
	    // We are *not* putting the image into the database; we are putting a reference to the file's location on the server
	   				//		 $sql = "insert into people (fname, lname, filename) values ('$fname', '$lname', '" . $image['name'] . "')";
	    			//		$result = mysql_query($sql) or die ("Could not insert data into DB: " . mysql_error());
		
							$query = mysql_query("INSERT INTO users VALUES ('$Email', '$PrivateName', '$LastName', '$Age', '$Password', '" . $Picture['name'] . "', '')");
							die("Registration complete! <a href='index.html'>Click here to login</a>");
						    exit;
						}
						else
						{
	    // A common cause of file moving failures is because of bad permissions on the directory attempting to be written to
	    // Make sure you chmod the directory to be writeable
	  //  $_SESSION['error'] = "Could not upload file.  Check read/write persmissions on the directory";
							  echo "Could not upload file.  Check read/write persmissions on the directory   <a href='index.html'>Click here to homepage</a>";
						      
						}	
					}
					else
					{
						echo "password must match";
					}	
	}
	else echo "All fields are required";
	
?>

