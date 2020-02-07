<?php
ob_start();
require('config.php');
$name=$_SESSION['fname'];
?>
<html>
<head>
<title>Chat by user</title>
<style type="text/css">
/*<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->*/
</style>

</head>
<body bgcolor="#ffcdd2">
<iframe src="messages.php"
   height="85%" width="100%" frameborder="0" scrolling="yes" title="All Messages"></iframe>
<br>
<br>
<form name="form1" method="post">
  <center>
    <label>
    <input name="message" type="text" id="message" size="30">
    </label>

    <input type="submit" name="submit" value="Enter">
    <?PHP
		//$name = $_COOKIE["name"];
		$message = $_POST["message"];
		$ip = $_SERVER['REMOTE_ADDR'];

		if(!empty($_REQUEST['submit']))
		{
		   # checks that the user message is present
			if(empty($message) )
			{
				exit('You must type a message!');
			}
			include_once('config.php');

			$time=date('h:i:s');
			$sql = mysql_query("INSERT INTO chat VALUES('$name', '$message','$time','$ip')");

			// if message was sent then redirect user to the chat messages else display error
			/*if (mysql_affected_rows() == 1)
			{
				// PHP redirection
				header("Location:chat.html");	
			}
			else
				{
					echo "Sorry, your message could not be sent!";
				}*/
			//mysql_close($link);
		}
		?>
  </center>
</form>
</body>
</html>
