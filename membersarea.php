<?php

session_start();

if ($_SESSION['username'])
{
	echo "You are logged in as: ".$_SESSION['username'];
	echo "<p>";
	echo "<a href='logout.php'>Click here to logout</a>";
}
else 
	header ("location: index.html");

?>