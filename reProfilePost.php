<?php
	session_start();
	$dbID = $_SESSION['ID'];
	$dbPassword = $_SESSION['Password'];	
	$dbLOGO = $_SESSION['LOGO'];
	$dbName = $_SESSION['Name'];
	$dbAdress = $_SESSION['Adress'];
	$dbEmail = $_SESSION['Email'];
	$TARGET_PATH .= "images/";
 	$TARGET_PATH .= $dbLOGO;
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Re Profile</title>
    <style type="text/css">
    	
    </style>
<link href="CSS/TabMenu.css" rel="stylesheet" type="text/css">
</head>
<body background = "19820-blue-vintage-wallpaper-background.jpg">
    <p><img src="Untitled.png" width="200" height="70">
    <div id="navbar">
    	<div id="holder">
    		<ul>
				<li><a href="reProfile.php">Profile</a></li>      
                <li><a href="reprofilePost.php" id="onlink">Post</a></li> 
                <li><a href="reProfileGallery.php">Gallery</a></li>  
        	</ul>
    	</div><!-- end of "holder" -->
    </div><!--end of "navbar" -->
      
	  <p><?php echo "<img src='".$TARGET_PATH."'>"?></p>
	  <p>Business Name:<?php echo $dbName;?></p>  
	  <p>Business Adresss:<?php echo $dbAdress;?></p>
      <p>Email:<?php echo $dbEmail;?></p>
	   
      <form action="logout.php" method ="POST">
      <button type="submit" class="btn signup-btn">
            logout
          </button>
       </form>
    
</body>
</html>