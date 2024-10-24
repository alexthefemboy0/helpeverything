<?php
# Connects the website to the local MySQL database.

$HOST = "127.0.0.1";
$USER = "alex";
$PASS = "";
$NAME = "helpeverything";

if (!$con = mysqli_connect($HOST, $USER, $PASS, $NAME)) {
	echo "Failed to connect to MySQL database.";
	exit;
}
?>
