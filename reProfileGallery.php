<?php
	session_start();
	$dbID = $_SESSION['ID'];
	$dbPassword = $_SESSION['Password'];	
	$dbLOGO = $_SESSION['LOGO'];
	$dbName = $_SESSION['Name'];
	$dbAdress = $_SESSION['Adress'];
	$dbEmail = $_SESSION['Email'];
	require("includes/ak_php_ing_lib_1.0.php");
	
	$TARGET_PATH .= "images/";
 	$TARGET_PATH .= $dbLOGO;
/*	$TPI = $TARGET_PATH;
	$kab = explode(".", $TPI);
	$format = end($kab);
    $wmax = 300;
    $hmax = 200;
    ak_img_resize($TARGET_PATH, $TARGET_PATH, $wmax, $hmax, $format);  */
	
	if($_SESSION['Slide_show'] == "off")
	{
		$curr = 1;
		$_SESSION['curr'] = $curr;	
	}
	else{
	 		$curr = $_SESSION['curr'] + 8;
		}
		// get image files from directory
	$count = 1;
	$count = get_images($count, $dbID);
	$curr = run($count, $curr);
		
	function get_images($count, $dbID)
	{		
		require("includes/mysql_connect.php");
		$query = mysql_query("SELECT * FROM users WHERE Location = '$dbID'"); // change to * later
		$numrows = mysql_num_rows($query);
		
		while ($row = mysql_fetch_assoc($query))
		{
		  $dbPicture = $row['Picture'];
		  $TP = $dbPicture;
		  $kab = explode(".", $dbPicture);
		  $format = end($kab);
		
		  
	//	$target_file = "uploads/$fileName";
	//	$resized_file = "uploads/resized_$fileName";
        $wmax = 300;
        $hmax = 200;
        ak_img_resize($TP, $TP, $wmax, $hmax, $format);
			$_SESSION[$count] = $TP;
		//	$_SESSION[$count] = $row['Picture'];
			$count = $count + 1;
		}
			return $count;
	}
		
		
	function run($count, $curr)
	{
		$last = $count;
		if($curr >= $last)
			$curr = 1;

		if(($last>8)&&(($last-$curr)<7))
			$curr=$last-8;
		$j=$last;	
		if($last<8)
		{ 
			$j=$last;
			while ($j!=8)
			{
				$_SESSION[$j]=NULL;
				$j = $j + 1;
			}
		}
	// echo "curr is: $curr last is: $last j is: $j ";
		return $curr;
	}
			
	//	echo "curr is: $curr last is: $last ";
	$_SESSION['Slide_show'] = "on";
	$_SESSION['curr'] = $curr;
	 
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Business Gallery</title>
    <link rel="shortcut icon" href="/images/logoIcon.ico" />
    <style type="text/css">
    	
    </style>
<link href="CSS/TabMenu.css" rel="stylesheet" type="text/css">
<link href="CSS/Gallery.css" rel="stylesheet" type="text/css">
<link href="CSS/styles.css" rel="stylesheet" type="text/css">
</head>
<body background = "19820-blue-vintage-wallpaper-background.jpg">
    <p><img src="Untitled.png" width="200" height="70">
    <div id="doc" class="yui-t7">
  <div id="hd">
    <div id="navbar">
    	<div id="holder">
    		<ul>
				<li><a href="reProfile.php">Profile</a></li>      
                <li><a href="reprofilePost.php">Post</a></li> 
                <li><a href="reProfileGallery.php" id="onlink">Gallery</a></li>  
        	</ul>
    	</div><!-- end of "holder" -->
    </div><!--end of "navbar" -->
    
    <p><?php echo "<img src='".$TARGET_PATH."'>"?></p>
    
    </div>
  <div id="bd">
    <div id="yui-main">
      <div class="yui-b">
        <div class="content">
    <div id="gallerywrapper">
 		 <ul class="gallerydisplay">
			<li>        
   				<?php
				$temp=4;
				$loc=0;
				while($temp!=0)
				{
					if($_SESSION[$curr+$loc]==NULL)
					{
						echo "<img src='".$TARGET_PATH."'>";
					}
					else
					{
						echo "<img src='".$_SESSION[$curr+$loc]."'>";
					}
					$temp--;
					$loc++;
				}	
				?>     
			</li>
    	</ul>
    </div>
   </div>
      </div>
    </div>
    <div class="yui-b">
      <div id="secondary">
    <div id="gallerywrapper">
<ul class="gallerydisplay">
			<li>        
   				<?php
				$temp=4;
				$loc=4;
				while($temp!=0)
				{
					if($_SESSION[$curr+$loc]==NULL)
					{
						echo "<img src='".$TARGET_PATH."'>";
					}
					else
					{
					echo "<img src='".$_SESSION[$curr+$loc]."'>";
					}
					$temp--;
					$loc++;
				}	
				?>     
			</li>
    	</ul>
    </div>
 </div>
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

<meta http-equiv="refresh" content="10">
</body>
</html>