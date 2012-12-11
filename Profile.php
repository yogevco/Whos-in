<?php
session_start();
if(isset($_SESSION['Email'])) {
  echo "Your session is running " . $_SESSION['Email'];
}
	$logEmail =  $_SESSION['Email'];
	mysql_connect("mysql16.joinweb.co.il:3306", "whosinco_Itai", "YcNsIe13") or die ("Couldn't connect to database");
	mysql_select_db("whosinco_users1") or die ("couldn't find database");
//	$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE Email='$Email' LIMIT 1"));
	$query = mysql_query("SELECT * FROM users WHERE Email='$logEmail'");
	$numrows = mysql_num_rows($query);
		while ($row = mysql_fetch_assoc($query))
		{
			$dbName = $row['Private_Name'];
			$dbLast = $row['Last_Name'];	
			$dbEmail = $row['Email'];
			$dbPic = $row['Picture'];		
		}
		
?>
      
      
<html>
<head>
    <meta charset="utf-8" />
    <title>User Registration</title>
    <style type="text/css">
    	
    </style>
</head>
<body background = "19820-blue-vintage-wallpaper-background.jpg">
    <p><img src="Untitled.png" width="400" height="130">
      
	  <p>Email: <?php echo "$dbEmail";?> </p>
	  <p>First Name:<?php echo "$dbName";?> </p>
	  <p>Last Name:<?php echo "$dbLast";?> </p>
	  <p>Pic:<?php $dbPic ?> </p>
    
    
        
    
</body>
</html>