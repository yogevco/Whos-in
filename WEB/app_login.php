<?php
$userEmail = $_POST['mEmail'];
$userPassword = $_POST['mPassword'];

if(selectFromDB() == $userPassword)
	echo "Accept";
else
	echo "Denide";
	
function selectFromDB()
{
	global $userEmail;
	require("includes/mysql_connect.php");
	$query = mysql_query("SELECT * FROM users WHERE Email='$userEmail'");
	$count = mysql_num_rows($query);
	
	if($count)
	{
		$output = mysql_result($query, 0);
		return $output;
	}
	else
		return 0;
	mysql_free_result($query);
}

?>