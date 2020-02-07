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
<h4>Add a Question</h4>
<form>
<label>Topic id: &nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="text" name="topicid" style="width:500px;"><br/><br/>
<label>Topic Name:</label><input type="text" name="topic_name" style="width:500px;"><br/><br/>
<Button type="submit" value="ADD" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-button mdl-color--green-500 mdl-color-text--white">ADD</BUTTON><br/><br/>
<?php
if(!empty($_REQUEST['submit']))
{
	$topicid=$_REQUEST['topicid'];
	$topic_name=$_REQUEST['topic_name'];

	if($topicid==""||$topic_name=="")
	{
		echo "<script> alert('Value(s) should not be null'); </script>";
	}
	else
	{

		$sql="select * from topic";
		$result=mysql_query($sql);
		//$row = mysql_fetch_array($result);
		$flag=0;
		while($row=mysql_fetch_array($result))
    	{
			if($row['topicid']==$topicid||$row['topic_name']==$topic_name)
			{
				$flag=1;
				echo "<script> alert('Topic ID or Name already in use'); </script>";
			}
		}
		if($flag!=1)
		{		
			$sqli="INSERT INTO topic VALUES('$topicid','$topic_name')";
			mysql_query($sqli);
			//echo "<script> alert('Topic added'); </script>";
			$uri = $_SERVER['REQUEST_URI'];
			if(strpos($uri, '?') != false) {
			  header('location: '.substr($uri, 0, strpos($uri, '?')));
}
		}
	}
}

?>
</form>
<a href = "change_topic.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white">Change a Topic</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href = "rp.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-button mdl-color--red-500 mdl-color-text--white">Reported Posts</a></h4>
</div>      
</div>
          </div>
		  </div>
		  </main>
		    <?php require('footer.php');?>

</body>
</html>
