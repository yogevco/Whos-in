<?php
session_start();
if(isset($_SESSION['Email'])) {
//  echo "Welcome Back: " . $_SESSION['Email'];
}
	$logEmail =  $_SESSION['Email'];
	require("includes/mysql_connect.php");
//	$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE Email='$Email' LIMIT 1"));
	$query = mysql_query("SELECT * FROM users WHERE Email='$logEmail'");
	$numrows = mysql_num_rows($query);
		while ($row = mysql_fetch_assoc($query))
		{
			$dbName = $row['Private_Name'];
			$dbLast = $row['Last_Name'];			
			$dbAge = $row['Age'];
			$dbPicture = $row['Picture'];
			$dbEmail = $row['Email'];
		}
		//$TARGET_PATH .= "images/";
		$TARGET_PATH .= $dbPicture;
		$kab = explode(".", $dbPicture);
		$format = end($kab);
		
		require("includes/ak_php_ing_lib_1.0.php");
	//	$target_file = "uploads/$fileName";
	//	$resized_file = "uploads/resized_$fileName";
        $wmax = 350;
        $hmax = 250;
        ak_img_resize($TARGET_PATH, $TARGET_PATH, $wmax, $hmax, $format);
		//echo " $dbName $dbLast $dbAge <img src='".$TARGET_PATH."'>";

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
      
	  <p>Email: <?php echo $dbEmail;?> </p>
	  <p>First Name:<?php echo $dbName;?></p>  
	  <p>Last Name:<?php echo $dbLast;?></p>
      <p><img src=<?php echo "'".$TARGET_PATH."'" ?> width="350" height="280"></p>
      <form action="logout.php" method ="POST">
      <button type="submit" class="btn signup-btn">
            logout
          </button>
       </form>
    
</body>
</html>