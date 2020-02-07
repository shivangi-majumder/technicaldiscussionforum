<?php
ob_start();
session_start();
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "database";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

mysql_select_db($mysql_database);
?>