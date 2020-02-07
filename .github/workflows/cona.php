<?php
ob_start();
require('config.php');
$fname=$_SESSION['fname'];
if(!empty($fname) && $fname=='Admin')
  require('Aheader.php');
else
  header("location: home.php");
?>

<html>
<head> 
<link rel="stylesheet" type="text/css" href="reg.css" media="all" />

<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-graphs mdl-shadow--6dp mdl-color--white mdl-cell mdl-cell--12-col">
<div class="container">
			
                <div  class="form">
<h4>Add a Contact</h4>
<form>
<label>Name</label><input type="text" name="uname" style="width:500px;"><br/><br/>
<label>Email</label><input type="text" name="uemail" style="width:500px;"><br/><br/>
<label>Phone Number: </label><input type="number" min="5000000000" max="9999999999" name="pn" style="width: 600px"><br>
<Button type="submit" value="ADD" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-button mdl-color--green-500 mdl-color-text--white">ADD</BUTTON><br/><br/>
<?php
if(!empty($_REQUEST['submit']))
{
	$uname=$_REQUEST['uname'];
	$uemail=$_REQUEST['uemail'];
	$pn=$_REQUEST['pn'];

	if($uname==""||$uemail==""||$pn=="")
	{
		echo "<script> alert('Value(s) should not be null'); </script>";
	}
	else
	{

		$sql="select * from contact";
		$result=mysql_query($sql);
		$flag=0;
		while($row=mysql_fetch_array($result))
    	{
			if($row['email']==$uemail)
			{
				$flag=1;
				echo "<script> alert('User already there'); </script>";
			}
		}
		if($flag!=1)
		{		
			$sqli="INSERT INTO contact VALUES('$uname','$uemail','$pn')";
			mysql_query($sqli);
			echo "<script> alert('Contact added'); </script>";
		}
	}
}

?>
</form>
</div>      
</div>
          </div>
		  </div>
		  </main>
<?php require('footer.php');?>
</body>
</html>