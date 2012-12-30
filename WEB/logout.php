<?php
session_start();
session_destroy();
header("Location: index.html"); 
echo "You have been logged out";

?>