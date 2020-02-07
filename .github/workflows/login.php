<?php
ob_start();
?>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat login</title>
</head>
<body bgcolor="#ffcdd2">
<form id="form1" name="form1" method="post" action="login.php">
  <label>Enter nickname:
  <input type="text" name="user" id="user" maxlength="20"/>
  </label>
  <label>
  <input type="submit" name="submit" id="submit" value="Submit" />
  </label>
  <?php
// variables
$user = $_POST['user'];
//This contains the real IP address of the client. That is the most reliable value you can find from the user.
$ip = $_SERVER['REMOTE_ADDR'];
if (!empty($_REQUEST['submit']))
{
	# connect to the database
	include_once('connection.php');	
	// database query
	$time=date('h:i');
	if(!empty($user)){
	$sql = mysql_query("INSERT INTO chat VALUES ('$user','joins the chat!','$time','$ip')");	
	//mysql_close($link);
	// create cookie and redierct user to chat page
	setcookie("name",$user,time()+3600,"/");	
	header("Location:chat.html");
	}	
}	
?>
</form>
</body>
</html>
