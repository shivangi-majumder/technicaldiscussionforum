<?php
// MySQL database connection file
$SERVER = "localhost"; // MySQL SERVER
$USER = "root"; 		// MySQL USER
$PASSWORD = "";		// MySQL PASSWORD

$link = mysql_connect($SERVER,$USER,$PASSWORD);
$db = mysql_select_db("website");

?>