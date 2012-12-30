<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
 <meta charset="utf-8" />
    <title>User Registration</title>
    <style type="text/css">
    	
    </style>
</head>
<body background = "19820-blue-vintage-wallpaper-background.jpg">
    <blockquote>
      <p><img src="Untitled.png" width="200" height="65">
      
    <?php
	
	$raw = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE Email='$_GET[Email]'"
	
	?>
      	<p>Private Name: <?php echo $row['Private Name']?>
      	<p>Last Name:  <?php echo $row['Last Name']?>
      	<p>Email:  <?php echo $row['Email']?>
      	<p><img src=" <?php echo $row['Picture']?>" width="200" height="65">
    
	</blockquote>
</body>
</html>
