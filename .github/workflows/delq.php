<?php
ob_start();
require('config.php');
$report_user=$_REQUEST['report_user'];
$report_id=$_REQUEST['report_id'];
$email=$_SESSION['email'];
	$query="DELETE from question WHERE email='$report_user' AND qid='$report_id'";
	mysql_query($query);
	header('Location: forum_log.php');
?>