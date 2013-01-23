<?php

if (!isset($_GET['c']) || !isset($_GET['m']) || !isset($_GET['p'])) 
	exit('1');

$email	= $_GET['m'];
$code 	= $_GET['c'];
$pass 	= $_GET['p'];

//send mail
$headers = "From: do-not-reply@myscreen.cu.cc\r\n" .
		'X-Mailer: PHP/' . phpversion();

$subject = "MyScreen - account activation";
$message =	"Welcome to My Screen" .
		"\n\n Your activation code is: $code" .
		"\n Please copy it to your computer in order to confirm your email." .
		"\n\n\n by the way, your password is: $pass" .
		"\n don't forget it.";
mail($email, $subject, $message, $headers);

echo '0';	//success

?>
