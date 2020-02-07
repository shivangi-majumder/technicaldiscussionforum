<?php
ob_start();
require('config.php');
session_destroy();
require('heder.php');
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
.disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
.row{
	text-decoration: bold;
	font-size: 6;
	color: white;
}
th{
	font-size: 14px;
}

</style>
</head>
<body>
<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-graphs mdl-shadow--6dp mdl-color--white mdl-cell mdl-cell--12-col">
<font size="2">
<h1><font color="red"><center>Forum</center></h1></td>

<?php
	$tid=$_REQUEST['tid'];
	$query="SELECT * FROM question WHERE topic_name='$tid'order by qid desc";
	$result=mysql_query($query);
	$flag=0;
	while($rows=mysql_fetch_array($result))
	{
		$qid=$rows['qid'];
		
		/*TO SHOW QUESTIONS*/
		if($flag==0)
		{
			echo "<th bgcolor='lightgreen'><font size='4'>".$rows['topic_name']."</th>";
			$flag=1;
		}
		if($flag!=0)
		{
			echo "<form method='POST'>";
			echo "<tr>";
			echo "<td><font size='3' color='black'>Q: ".$rows['question']."</font></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><font size='2' color='black'>by- </font>";
				$e=$rows['email'];
				$q="SELECT fname,lname FROM register WHERE register.email='$e'";
				$sql=mysql_query($q);
				$r=mysql_fetch_array($sql);
				echo "<font size='2' color='black'>".$r[0]." ".$r[1]."</font>";
			echo "</font></td>";
			echo "<br/>";
			echo "</tr>";
			echo "<td><font size='2' color='green'>";
			$re="SELECT * FROM reply WHERE qid='$qid' AND report='' order by rid desc";
			$rep=mysql_query($re);
			//echo "<br />Replies:";
			while($reply=mysql_fetch_array($rep))
			{
				echo "<form method='POST'>";
				$q="SELECT fname,lname FROM register WHERE email='$e'";
				$sql=mysql_query($q);
				$r=mysql_fetch_array($sql);
				echo "<b>".$r[0]." ".$r[1]." - </b>".$reply['reply'];
				$e=$reply['email'];
				$rid=$reply['rid'];
				
				echo "</form>";
			}
				echo "</font>";
				echo "<br/>------------------------------------------------------------";
				echo "</td>";
				echo "</tr>";
		}
	}
?>
</table>
</div>
		  </div>
		  </main>
<?php require('footer.php');?>

</body>
</html>