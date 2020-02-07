<?php
ob_start();
require('config.php');
$fname=$_SESSION['fname'];
if(!empty($fname) && $fname=='Admin')
require('Aheader.php');
else
header("location: home.php");
?>
<?php

$uri = $_SERVER['REQUEST_URI'];
if(strpos($uri, '?') != false) {
  header('location: '.substr($uri, 0, strpos($uri, '?')));
}?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="reg.css" media="all" />

<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-graphs mdl-shadow--6dp mdl-color--white mdl-cell mdl-cell--10-col">
		  <div class="container">
		  <div  class="form">
<h2 >Manage your Contacts</h2>
<form>
<label>User id:&nbsp</label><input type="text" name="email"><br/><br/>
<button type="submit" value="UNBLOCK" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white mdl-color--green-400">SU</BUTTON><br/><br/>
<?php
if(!empty($_REQUEST['submit']))
{
	$email=$_REQUEST['email'];
	if($email=="")
	{
		echo "<script> alert('Value should not be null'); </script>";
	}
	else
	{
		$sql="select * from register";
		$result=mysql_query($sql);
		$row = mysql_fetch_array($result);
		$flag=0;
		while($row=mysql_fetch_array($result))
    	{
			if($row['email']==$email)
			{
				$sqli="UPDATE register set block='0' where email='$email'";
				mysql_query($sqli);
				$flag=0;
				echo "<script> alert('User is Unblocked'); </script>";
			}
			else continue;
		}
		//else
		//{
		if($flag==1)
		{
			echo "<script> alert('Invalid email id'); </script>";
			$flag=1;
		}
		//}
	}
}
?>
</form>
<h3><a href = "mg_cts.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-button mdl-color--red mdl-color-text--white">Block</a></h3>
</div>
 </div>
		  </div>
		  </div>
		  </main>
<?php require('footer.php');?>
</body>
</html>