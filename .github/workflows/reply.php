<?php
ob_start();
require('config.php');
if(empty($_SESSION['fname']))
{
  session_destroy();
  header('Location: forum.php');
}
$rid=$_REQUEST['rid'];
$reply=$_REQUEST['reply'];
$email=$_SESSION['email'];
if(empty($reply))
	$flag=0;
else
{
	$query="INSERT INTO reply VALUES('','$reply','$email','$rid','')";
	mysql_query($query);
	$flag=1;
}
header("Location: forum_log.php");
?>