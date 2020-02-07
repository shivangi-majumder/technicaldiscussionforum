<?php
ob_start();
error_reporting(0);
require('config.php');
$fname=$_SESSION['fname'];
if(!empty($fname) && $fname=='Admin')
  require('Aheader.php');
else
  header("location: home.php");
?>
<html>
<head>
<style>
.buttonL {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 0px 6px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}
.buttonL:hover {
    background-color: rgb(92,141,61);
    color: white;
}
.row{
	text-decoration: bold;
	font-size: 6;
	color: white;
}
th{
	font-size: 14px;
}
.imgR
{
	background-color: rgb(153,204,102); /* Green */
    border: none;
    border-radius: 100px;
    font-weight: bold;
    padding: 0px 2px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    background-color: white; 
    color: red; 
    border: 0px solid rgb(92,141,61);

}
.imgR:hover {
    background-color: rgb(92,141,61);
    color: red;
}
.imgRl
{
	background-color: rgb(153,204,102); /* Green */
    border: none;
    border-radius: 100px;
    font-weight: bold;
    padding: 0px 2px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    background-color: white; 
    color: #3333ff; 
    border: 0px solid rgb(92,141,61);

}
.imgR:hover {
    background-color: rgb(92,141,61);
    color: red;
}

</style>

<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="reg.css" media="all" />
</head>
<body>
<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-graphs mdl-shadow--6dp mdl-color--white mdl-cell mdl-cell--12-col">
<div class="container">
<div  class="form">
<h2 >Change Topic</h2>
<form>
<label>Current Topic Name:</label><input type="text" name="otn" style="width:500px; "><br/>
<label>NEW Topic Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="text" name="ntn" style="width:500px;"><br/>
<label>NEW Topic ID:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="nti" style="width:500px;"><br/>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<Button type="submit" value="CHANGE" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white">CHANGE</Button><br/><br/>
<?php
if(!empty($_REQUEST['submit']))
{
	$otn=$_REQUEST['otn'];
	$ntn=$_REQUEST['ntn'];
	$nti=$_REQUEST['nti'];
	if($otn==""||$ntn==""||$nti=="")
	{
		echo "<script> alert('Value(s) should not be null'); </script>";
	}
	elseif($ntn==$otn)
	{
		echo "<script> alert('Both the topics are the same'); </script>";
	}
	else
	{
		$sql="select * from topic";
		$result=mysql_query($sql);
		//$row=mysql_fetch_array($result);
		$flag=0;
		$count=0;
		while($row=mysql_fetch_array($result))
    	{
			if($row['topic_name']==$otn)
			{

				while($rows=mysql_fetch_array($result))
				{
					if($rows['topic_name']==$ntn)
					{
						$count=1;
						echo "<script> alert('Topic ID already in use'); </script>";
						break;
					}
				}
				//else
				//{
					if($count==0)
					{
						$flag=1;
						$sqli="UPDATE topic set topic_name='$ntn', topicid='$nti' where topic_name='$otn'";
						mysql_query($sqli);
						echo "<script> alert('Change Successful !'); </script>";
						$uri = $_SERVER['REQUEST_URI'];
						if(strpos($uri, '?') != false) {
						  header('location: '.substr($uri, 0, strpos($uri, '?')));
						}
					}
			}
			else continue;
		}
		if($flag==0&&$count!=1)
		{
			//if
			echo "<script> alert('Sorry. Old topic name does not match'); </script>";
			$flag=0;
		}
	}
	#header("location: change_topic.php");
}


?>
</form>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href = "add_tap.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white">Add A Topic</a>&nbsp&nbsp&nbsp&nbsp
<a href = "rp.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-button mdl-color--red-500 mdl-color-text--white">Reported Posts</a>
</div>
</div>
          </div>
		  </div>
		  </main>
		    <?php require('footer.php');?>

</body>
</html>