<?php
ob_start();
require('config.php');
$fname=$_SESSION['fname'];
if(empty($fname))
{
	session_destroy();
  	header('Location: twise_forum.php');
}
elseif(!empty($fname) && $fname=='Admin')
  require('Aheader.php');
else
  require('Uheader.php');
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
</head>
<body>
<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
<div class="demo-graphs mdl-shadow--6dp mdl-color--Cyan-900 mdl-cell mdl-cell--12-col">
<font size="2">
<table class="row" width=900>
<tr>
	<td><h1><font color='black'><center>Forum</center></font></h1></td>
</tr>
<?php
	$tid=$_REQUEST['tid'];
	$email=$_SESSION['email'];
	$query="SELECT * FROM question WHERE topic_name='$tid'order by qid desc";
	$result=mysql_query($query);
	while($rows=mysql_fetch_array($result))
	{
		$qid=$rows['qid'];
		/*TO SHOW QUESTIONS*/
		echo "<form method='POST'>";
		echo "<th bgcolor='#ffcdd2' ><font size='4'>".$rows['topic_name']."</th>";
		echo "<tr>";
		echo "<td><font size='3' color='black'>Q: ".$rows['question']."</font></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><font size='2' color='black'>by- ";
			$em=$rows['email'];
			echo "<input type='hidden' value='$em' name='report_user'>";
			echo "<input type='hidden' value='$qid' name='report_id'>";
			$q="SELECT fname,lname FROM register WHERE register.email='$em'";
			$sql=mysql_query($q);
			$r=mysql_fetch_array($sql);
			echo "<font color='black'>".$r[0]." ".$r[1]."&nbsp;<input type='submit' formaction='reportq.php' value='X' title='Report Post' class='imgR' name='sub'>";
				if($em== $email)
				{
					echo "<input type='submit' formaction='delq.php' value='Del' title='Delete' class='imgRl' name='sub'>";
				};
		echo "</font></td>";
		echo "</tr>";
		echo "</form>";
		/*TO SHOW REPLIES START*/
		echo "<tr>";
		echo "<td><font size='2' color='green'>";
			$re="SELECT * FROM reply WHERE reply.qid='$qid' AND reply.report=''order by rid desc";
			$rep=mysql_query($re);
			while($reply=mysql_fetch_array($rep))
			{
				echo "<form method='POST'>";
				echo "Re: ".$reply['reply']." [ ";
				$e=$reply['email'];
				$rid=$reply['rid'];
				echo "<input type='hidden' value='$e' name='report_user'>";
				echo "<input type='hidden' value='$rid' name='report_id'>";
				$q="SELECT fname,lname FROM register WHERE email='$e'";
				$sql=mysql_query($q);
				$r=mysql_fetch_array($sql);
				echo $r[0]." ".$r[1]." ]"."&nbsp;<input type='submit' formaction='report.php' value='X' title='Report Post' class='imgR' name='sub'>";
				if($e== $email)
				{
					echo "<input type='submit' formaction='del.php' value='Del' title='Delete' class='imgRl' name='sub'>";
				}
				echo "<input type='submit' formaction='r.php' value='reply' title='reply' class='imgRl' name='sub'><br><br>";
					echo "</form>";
				//echo "<form method='POST'";
				//echo "&nbsp;<input type='submitd'  value='Del' title='Delete' class='imgRl' name='sub'>";
				//echo "</form>";
			}
		echo "</font></td>";
		echo "</tr>";
		
		echo "<form method='POST' action='reply.php'>";
		echo "<tr>";
		echo "<td><input type='text' name='reply' size='120' placeholder='Reply..'><input type='hidden' name='qid' value='$qid'></td>";
		echo "<td><input type='submit' value='Submit' name='submit' class='buttonL'></td>";
		echo "</tr>";
		echo "</form>";
	}
?>
</table>
</div>
		  </div>
		  </main>
<?php require('footer.php');?>
</body>
</html>