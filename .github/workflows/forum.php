<?php
ob_start();
require('config.php');
$fname=$_SESSION['fname'];
if(!empty($fname) && $fname=='Admin')
  require('Aheader.php');
elseif(!empty($fname) && $fname!='Admin')
  	header('Location: forum_log.php');
else
  require('heder.php');
?>
<html>
<head>
<style>
.row{
	text-decoration: bold;
	font-size: 6;
	color: gray;
}
</style>
<style>
    #view-source {
      position: fixed;
      display: block;
      margin-right: 100px;
      margin-bottom: 100px;
      z-index: 100;
    width: 100px;
	 top: 0px;
  right: 4000px;
  bottom: 100px;
    }
    </style>

</head>
<body>
 <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-graphs mdl-shadow--6dp mdl-color--Cyan-900 mdl-cell mdl-cell--12-col">
<font size="2">
<table class="row" width=900>
<tr><td><center><H1>Forum</H1></center></td></tr>
<?php
	$query="SELECT * FROM question order by qid desc";
	$result=mysql_query($query);
	while($rows=mysql_fetch_array($result))
	{
		$qid=$rows['qid'];
		echo "<form method='POST'>";
		/*TO SHOW QUESTIONS*/
		echo "<th bgcolor='#ffcdd2'><font size='4' color='white'>".$rows['topic_name']."</th>";
		echo "<tr>";
		echo "<td><font size='3' color='black'>Q: ".$rows['question']."</font></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><font size='2' color='black'>by- ";
			$e=$rows['email'];
			$q="SELECT fname,lname FROM register WHERE email='$e'";
			$sql=mysql_query($q);
			$r=mysql_fetch_array($sql);
			echo $r[0]." ".$r[1];
		echo "</font></td>";
		echo "</tr>";
		echo "</form>";
		echo "<tr>";
		echo "<td><font size='2' color='green'>";
			$re="SELECT * FROM reply WHERE qid='$qid' AND report='' order by rid desc";
			$rep=mysql_query($re);
			echo "<br />Replies:";
			while($reply=mysql_fetch_array($rep))
			{
				echo "<form method='POST'>";
				$q="SELECT fname,lname FROM register WHERE email='$e'";
				$sql=mysql_query($q);
				$r=mysql_fetch_array($sql);
				echo "<b>".$r['fname']." ".$r['lname']." - </b>".$reply['reply'];
				$e=$reply['email'];
				$rid=$reply['rid'];
				echo "</form>";
			}
				echo "</font></td>";
				echo "</tr>";
		}
?>
</table>
</font>
          </div>
		  </div>
		  </main>
<?php require('footer.php');?>
</body>
</html>