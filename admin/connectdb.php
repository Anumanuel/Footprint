<?php
/* hostname, username, password, database name */
$mysqli = new mysqli("localhost", "root", "", "footprint");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} //else {
	//echo "DB Working!";
//}

?>