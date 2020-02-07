<?php
ob_start();
require('config.php');
$report_user=$_REQUEST['report_user'];
$report_id=$_REQUEST['report_id'];
$query="UPDATE reply SET report='' WHERE email='$report_user' AND rid='$report_id'";
mysql_query($query);
header('Location: rp.php');
?>