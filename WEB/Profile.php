<?php
	session_start();
	if(isset($_SESSION['Email'])) {
	// echo "Welcome Back: " . $_SESSION['Email'];
	}
	$logEmail = $_SESSION['Email'];
	require("includes/mysql_connect.php");
	// $row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE Email='$Email' LIMIT 1"));
	$query = mysql_query("SELECT * FROM users WHERE Email='$logEmail'");
	$query2 = mysql_query("SELECT Business_Name FROM re");
	$query3 = mysql_query("SELECT * FROM friends_list WHERE User='$logEmail'");
	$query4 = mysql_query("SELECT * FROM users WHERE Email!='$logEmail'");
	$query5 = mysql_query("SELECT * FROM re");
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
	// $target_file = "uploads/$fileName";
	// $resized_file = "uploads/resized_$fileName";
       $wmax = 350;
       $hmax = 250;
        ak_img_resize($TARGET_PATH, $TARGET_PATH, $wmax, $hmax, $format);
		
		$business_names = array();
		$i=mysql_num_rows($query5);
		while($i!=0)
		{
			$BName = mysql_fetch_assoc($query5);
			$business_names[$BName['ID']] =  $BName['Business_Name'];
			$i--;
		}	
	//echo " $dbName $dbLast $dbAge <img src='".$TARGET_PATH."'>";
		$friends_email = array();
		$non_friends = array();
		$friends_name = array();
		$email_add = array();
		$j = 1;
		$k = 1;
		$i=mysql_num_rows($query3);
		while($i!=0)
		{
			$FMail = mysql_fetch_assoc($query3);
			$friends_email[$j] =  $FMail['Friend'];
			$i--;
			$j++;
		}
		$num_friends = $j-1;
		$i = mysql_num_rows($query4);
		while($i!=0)
		{
			$flag = 0;
			$j = $num_friends;
			$user = mysql_fetch_assoc($query4);
			while($j!=0)
			{
				if($friends_email[$j] == $user['Email'])
				{
					if($user['Location']!=0)						
						$friends_name[$j] = $user['Private_Name']." is in: ".$business_names[$user['Location']];
					else $friends_name[$j] = $user['Private_Name'];
					$flag = 1; 
				}
				$j--;
			}
			if($flag != 1)
			{
				$email_add[$k] = $user['Email'];
				$non_friends[$k] = $user['Private_Name']."  ( ".$user['Email']." )";
				$k++;
			}
			$i--;
		}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta charset="utf-8" />
    <title>User Profile</title>
	<link rel="shortcut icon" href="/images/logoIcon.ico" />
    
<link rel="stylesheet" type="text/css" href="CSS/profile_styles.css" >
</head>
<body background = "19820-blue-vintage-wallpaper-background.jpg">
<div id="doc" class="yui-t7">
  <div id="hd">
    <div id="header"><p><img src="Untitled.png" width="400" height="130"></div>
  </div>
  <div id="bd">
    <div id="yui-main">
      <div class="yui-b">
        <div class="yui-gd">
          <div class="yui-u first">
            <div class="content">
            <div style="overflow: auto; width:105%; height:650px;">
            	<p>Email: <?php echo $dbEmail;?> </p>
	  			<p>First Name:<?php echo $dbName;?></p>  
			    <p>Last Name:<?php echo $dbLast;?></p>
			    <p><img src=<?php echo "'".$TARGET_PATH."'" ?> width="350" height="280"></p>
                <p>Places we work with: <?php echo "<br>";
						$i=mysql_num_rows($query2);
						while($i!=0)
						{
							$Business = mysql_fetch_assoc($query2);
							echo $Business['Business_Name']."<br>";
							$i--;
						}
						?></p>
						<p>Friends List: <?php echo "<br>";
						$i = $num_friends;
						while($i!=0)
						{
							echo $friends_name[$i]."<br>";
							$i--;
						}
						?></p>
               
                <form action="logout.php" method ="POST">
      			<button type="submit" class="btn signup-btn">
            		logout</button></form>
                </div>
              </div>
          	</div>
          <div class="yui-u">
            <div class="content">
            	<p>Friends to add: <?php echo "<br>";
						$k--;
						while($k!=0)
						{
							echo $non_friends[$k]."<br>";
							$k--;
						}
						?></p>
                       	<form action="add_friend.php" method ="POST">
          <input type="email" id="signin-email" class="text-input email-input" name="FEmail" title="FEmail" autocomplete="on" tabindex=1>
          <label for="signin-email" class="placeholder">Friend Email to add</label>
              <button type="submit" class="submit btn primary-btn flex-table-btn js-submit" tabindex=4>
                add
              </button>
            	</form>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="ft">
    <div id="footer">
    	<font color="#FFFFFF" font size="7"><marquee bgcolor="#000080" direction="left" loop="40" width="100%" height="100%">PLACE YOUR AD HERE!</marquee></font>
    </div>
       <div id="footer2">Contact us</div>
  </div>
</div>
</body>
</html>
