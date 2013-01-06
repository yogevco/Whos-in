<?php
	session_start();
	$dbID = $_SESSION['ID'];
	$dbPassword = $_SESSION['Password'];	
	$dbLOGO = $_SESSION['LOGO'];
	$dbName = $_SESSION['Name'];
	$dbAdress = $_SESSION['Adress'];
	$dbEmail = $_SESSION['Email'];
	$dbPost = $_SESSION['Post'];
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
    <link href="CSS/PostStyle.css" rel="stylesheet" type="text/css">
</head>

<body background = "19820-blue-vintage-wallpaper-background.jpg">
    <p><img src="Untitled.png" width="200" height="70">
    <div id="doc" class="yui-t7">
  		<div id="hd">
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
       </div>
  <div id="bd">
    <div id="yui-main">
      <div class="yui-b">
        <div class="content">
        <?php
		$Enter = "<br>";
		$Enter.= $dbName;
		$Enter.= ':';
     	require("includes/mysql_connect.php");
	  	$Temp = $_POST['Post'];
	    $dbPost .= $Enter;
		$dbPost .= $Temp;
		$Clear = $_POST['Clear'];
		if($Clear==="Clear")
		{
			$dbPost = $Enter;
		}
		$query = mysql_query("UPDATE re SET Post = '$dbPost' WHERE ID = '$dbID'");
	    $_SESSION['Post'] = $dbPost;
        echo $dbPost;
		?>
        </div>
      </div>
    </div>
    <div class="yui-b">
       <form action="reProfilePost.php" method ="POST" onSubmit="refresh">
        <span><input type="Text" name="Post"></span>
     	<button type="submit" class="btn signup-btn">
            Submit
          </button>
       </form>
       <form action="reProfilePost.php" method ="POST" onSubmit="refresh">
       <span><input type="Text" name="Clear"></span>
       <button type="submit" class="btn signup-btn">
            Clear Post!
          </button>
       </form>
      <p>&nbsp; </p>
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