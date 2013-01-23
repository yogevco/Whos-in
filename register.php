<?php
	session_start();
	
	$Email = $_POST['Email'];
	$PrivateName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Age = $_POST['Age'];
	$Password = $_POST['Password'];
	$Password1 = $_POST['Password1'];
	$Picture = $_FILES['Picture'];
	
	$_SESSION['Email'] = $Email;
	$_SESSION['FirstName'] = $PrivateName;
	$_SESSION['LastName'] = $LastName;
	$_SESSION['Age'] = $Age;
	$_SESSION['Password'] = $Password;
	$_SESSION['Password1'] = $Password1;
	$_SESSION['Picture'] = $Picture;

	//$enc_password = md5($Password);
	//echo " $Email $PrivateName $LastName $Age $Password $Password1";	
	
	if($Email && $PrivateName && $LastName && $Age && $Password && $Password1 && $Picture)
		if(strlen($Password)>=6)
			if($Age >= 18)
			   if($Password == $Password1)
					{
						$TARGET_PATH .= "images/";	
						$TARGET_PATH .= $PrivateName;
						$TEMP_PATH = $TARGET_PATH;
						$TEMP_PATH2 = $TARGET_PATH;
						$TEMP_PATH2 .= $Picture['name'];
						
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
	
						$counter = 0;
						while (file_exists($TEMP_PATH2))
						{
							$counter = $counter + 1;
							$TEMP_PATH2 = $TEMP_PATH;
							$TEMP_PATH2 .= $counter;
							$TEMP_PATH2 .= $Picture['name'];
							//echo "file name already exist in our data base, please change file";
						  //  header("Location: index.html");
						  //  exit;
						}
	
						$TARGET_PATH = $TEMP_PATH2;
						if (move_uploaded_file($Picture['tmp_name'], $TARGET_PATH))
						{
	    // NOTE: This is where a lot of people make mistakes.
	    // We are *not* putting the image into the database; we are putting a reference to the file's location on the server
	   				//		 $sql = "insert into people (fname, lname, filename) values ('$fname', '$lname', '" . $image['name'] . "')";
	    			//		$result = mysql_query($sql) or die ("Could not insert data into DB: " . mysql_error());
		
							$query = mysql_query("INSERT INTO users VALUES ('$Email', '$PrivateName', '$LastName', '$Age', '$Password', '" . $TARGET_PATH . "', '0', 'no')");
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
	 header("Location: check_reg.php");
//	 header("Location: index.html");
	
?>

