<?php
session_start();
if (session_status() == PHP_SESSION_ACTIVE) { session_destroy();header('location: sign-in.php') . header('location: sign-in.php'); } 
else {
	echo "LOGOUT ERROR";
}
?>