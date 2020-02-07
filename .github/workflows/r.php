<?php
ob_start();
require('config.php');
if(empty($_SESSION['fname']))
{
  session_destroy();
  header('Location: forum.php');
}

?>
<!doctype html>
<html>
<head>
<title>Online Discussion Forum</title>
</head>
<body>
	<form>
<input type="text" name="reply" placeholder='Type your reply here'><br/>
<input type="submit" value="Submit" name="submit"><br/>
	<?php
		$reportid=$_REQUEST['report_id'];echo "$reportid";
		$email=$_SESSION['email'];
		if(!empty($_REQUEST['submit']))
		{
			$reply=$_REQUEST['reply'];

			if(!empty($reply))
			{
				$sql="INSERT INTO replyt VALUES('','$reply','$email','$reportid','')";
				mysql_query($sql);
			}
			header("Location: forum_log.php");
			
		}
	?>
</form>
</body>
</html>