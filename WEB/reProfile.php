<?php
	session_start();
	if(!isset($_SESSION['ID']))
	{
		$ID = $_POST['ID'];
		$Password = $_POST['Password'];

		if ($ID&&$Password)
		{
			require("includes/mysql_connect.php");
	
			$query = mysql_query("SELECT * FROM re WHERE ID='$ID'");
	
			$numrows = mysql_num_rows($query);
	
			if($numrows != 0)
	
			{
		
			while ($row = mysql_fetch_assoc($query))
			{
				$dbID = $row['ID'];
				$dbPassword = $row['Password'];	
				$dbLOGO = $row['LOGO'];
				$dbName = $row['Business_Name'];
				$dbAdress = $row['Business_Adress'];
				$dbEmail = $row['Email'];
				$dbPost = $row['Post'];
			}
		
			if ($ID==$dbID&&$Password==$dbPassword)
			{
				
				
				//echo "Login successful. <a href='Profile.php'>Click here to enter the members area</a>";
				//$_SESSION['Email']=$dbEmail;
			
			}
			else 
				{
					echo "Incorrect Password";
					header("Location: reLogin.php");
				}
		
		
	}
	else 
		{
			die ("That ID does not exist");
			header("Location: reLogin.php");
		}
	
	}
	else 
	{
	
		die ("Please enter an Email and Password");
		header("Location: reLogin.php");
	}
	$TARGET_PATH .= "images/";
	$TARGET_PATH .= $dbLOGO;
	$_SESSION['ID'] = $dbID;
	$_SESSION['Password']	= $dbPassword;	
	$_SESSION['LOGO']	= $dbLOGO;
	$_SESSION['Name']	= $dbName;
	$_SESSION['Adress']	= $dbAdress;
	$_SESSION['Email'] = $dbEmail;
	$_SESSION['Post'] = $dbPost;
}
else
{
	$dbID = $_SESSION['ID'];
	$dbPassword = $_SESSION['Password'];	
	$dbLOGO = $_SESSION['LOGO'];
	$dbName = $_SESSION['Name'];
	$dbAdress = $_SESSION['Adress'];
	$dbEmail = $_SESSION['Email'];
	$dbPost = $_SESSION['Post'];
	$TARGET_PATH .= "images/";
 	$TARGET_PATH .= $dbLOGO;
}

?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Re Profile</title>
    <style type="text/css">
    	
    </style>
<link href="CSS/TabMenu.css" rel="stylesheet" type="text/css">
<link href="CSS/styles.css" rel="stylesheet" type="text/css">
</head>
<body background = "19820-blue-vintage-wallpaper-background.jpg">
    <p><img src="Untitled.png" width="200" height="70">
    <div id="doc" class="yui-t7">
 	 <div id="hd">
    	<div id="navbar">
    		<div id="holder">
    			<ul>
					<li><a href="reProfile.php" id="onlink">Profile</a></li>      
              	  	<li><a href="reProfilePost.php">Post</a></li> 
                	<li><a href="reProfileGallery.php">Gallery</a></li>  
        		</ul>
    		</div><!-- end of "holder" -->
   		 </div><!--end of "navbar" -->
      
	  <p><?php echo "<img src='".$TARGET_PATH."'>"?></p>
	  <p>Business Name:<?php echo $dbName;?></p>  
	  <p>Business Adresss:<?php echo $dbAdress;?></p>
      <p>Email:<?php echo $dbEmail;?></p>
	    </div>
  <div id="bd">
    <div id="yui-main">
      <div class="yui-b">
        
      </div>
    </div>
    <div class="yui-b">
      
    </div>
  </div>
   <div id="ft">
      <form action="logout.php" method ="POST">
      <button type="submit" class="btn signup-btn">
            logout
          </button>
       </form>
         </div>
</div>
    
</body>
</html>