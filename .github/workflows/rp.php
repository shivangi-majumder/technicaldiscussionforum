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

<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<style>
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


</style>
<body>
<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-graphs mdl-shadow--6dp mdl-color--white mdl-cell mdl-cell--12-col">
		  <h2 >Reported Posts</h2>
<div class="container">
	<font size="2">
	<table class="row" width=800>
		<?php
			$query="SELECT * FROM question WHERE report='x' order by qid desc";
			$result=mysql_query($query);
			while($rows=mysql_fetch_array($result))
			{
				echo "<th bgcolor='lightgreen'><font size='4'>".$rows['topic_name']."</th>";
				echo "<tr>";
				echo "<td><font size='4' color='gray'>";
				echo "<form method='POST' action='unreportq.php'>";
				echo $rows['question']." by- ";
				$eq=$rows['email'];
				$qid=$rows['qid'];
				echo "<input type='hidden' value='$eq' name='report_user'>";
				echo "<input type='hidden' value='$qid' name='report_id'>";
				echo $rows['email']."&nbsp;<input type='submit' value='X' title='UnReport Post' class='imgR'></a><br>";
				echo "</tr>";
				echo "</form>";
			}
echo "</font></td>";
		echo "</tr>";
		

		?>
<?php
	$query="SELECT * FROM question";
	$result=mysql_query($query);
	while($rows=mysql_fetch_array($result))
	{
		$qid=$rows['qid'];
		$flag=0;
		/*TO SHOW REPLYS START*/
			$re="SELECT * FROM reply WHERE qid='$qid' AND report='x' order by rid desc";
			$rep=mysql_query($re);
			while($reply=mysql_fetch_array($rep))
			{
				/*TO SHOW QUESTION  HEADING*/
				if($flag==0)
				{
					echo "<th bgcolor='lightgreen'><font size='4'>".$rows['topic_name']."</th>";
					$flag=1;
				}
				
				echo "<tr>";
				echo "<td><font size='3' color='green'>";
				echo "<form method='POST' action='unreport.php'>";
					echo "Re: ".$reply['reply']." by- ";
					$e=$reply['email'];
					$rid=$reply['rid'];
					echo "<input type='hidden' value='$e' name='report_user'>";
					echo "<input type='hidden' value='$rid' name='report_id'>";
					echo $reply['email']."&nbsp;<input type='submit' value='X' title='UnReport Post' class='imgR'></a><br>";
				echo "</form>";
			}
		echo "</font></td>";
		echo "</tr>";
		/*TO SHOW REPLYS END*/
	}	
?>

</table>
<br><br>
<a href = "add_tap.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white">Add A Topic</a>&nbsp&nbsp&nbsp&nbsp
<a href = "change_topic.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white">Change a Topic</a>
</div>      
</div>
          </div>
		  </div>
		  </main>
</body>
</html>