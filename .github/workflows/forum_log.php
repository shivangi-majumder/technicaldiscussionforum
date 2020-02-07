<?php
ob_start();
require('config.php');
$fname=$_SESSION['fname'];
if(empty($fname))
{
	session_destroy();
  	header('Location: forum.php');
}
elseif(!empty($fname) && $fname=='Admin')
  require('Aheader.php');
else
  require('Uheader.php');
?>
<html>
<head>
  <style>
  .tb2 {
	background-color : #B3E5FC
;
	border: 1px solid red;
	width: 230px;
}
</style>
<style>
.row{
	text-decoration: bold;
	font-size: 6;
	color: gray;
}
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
.select-style {
    width: 150px;
    height: 40px;
    font-weight: bold;
    color: rgb(92,116,61);
}
</style>
</head>
<body>
<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-graphs mdl-shadow--6dp mdl-color--white mdl-cell mdl-cell--12-col">
<font size="2">
<table class="row" width=900>
<tr><td><center><H3><b><u>Forum</u></b></H3></center></td></tr>
<tr><td><H4><b> ASK A QUESTION: </b></H4></td></tr>
<tr><td><form method="POST">
<select name="topic" class="select-style">
<?php
	$query="SELECT topic_name FROM topic";
	$result=mysql_query($query);
	while($rows=mysql_fetch_array($result))
	{
		echo "<option>".$rows['topic_name']."</option>";
	}
?>
</select>
<br><br>
<div class="mui-textfield">
<textarea rows="2" cols="60000000000" style="width:100%;" name="ques" placeholder="Type Your Question here.." class="tb2"></textarea>
</div>
<br><br>
<input type="submit" value="Submit" name="submitq" class="buttonL"><br/><br/></form></td></tr>
<?php
	if(!empty($_REQUEST['submitq']))
	{
		$email=$_SESSION['email'];
		$topic=$_REQUEST['topic'];
		$ques=$_REQUEST['ques'];
		if($ques=="")
			echo "Question is Blank.";
		else
		{
			$query="INSERT INTO question VALUES('','$ques','$email','$topic','')";
			mysql_query($query);
			echo "<script> alert('Question Submitted'); </script>";
		}
	}

?>
<?php
	$email=$_SESSION['email'];
	$query="SELECT * FROM question WHERE report='' order by qid desc";
	$result=mysql_query($query);
	while($rows=mysql_fetch_array($result))
	{
		$qid=$rows['qid'];
		//echo "<form method='POST'>";
		/*TO SHOW QUESTIONS*/
		echo "<form method='POST'>";
		echo "<th bgcolor='lightgreen'><font size='4'>".$rows['topic_name']."</th>";
		echo "<tr>";
		echo "<td><font size='3'>Q: ".$rows['question']."</font></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><font size='2'>by- ";
			$em=$rows['email'];
			echo "<input type='hidden' value='$em' name='report_user'>";
			echo "<input type='hidden' value='$qid' name='report_id'>";
			$q="SELECT fname,lname FROM register WHERE email='$em'";
			$sql=mysql_query($q);
			$r=mysql_fetch_array($sql);
			echo $r[0]." ".$r[1]."&nbsp;<input type='submit' formaction='reportq.php' value='X' title='Report Post' class='imgR' name='sub'>";
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
			$re="SELECT * FROM reply WHERE qid='$qid' AND report='' order by rid desc";
			$rep=mysql_query($re);
			while($reply=mysql_fetch_array($rep))
			{
				echo "<form method='POST'>";
				//echo "Re: ".$reply['reply']." [ ";
				$e=$reply['email'];
				$rid=$reply['rid'];
				echo "<input type='hidden' value='$e' name='report_user'>";
				echo "<input type='hidden' value='$rid' name='report_id'>";
				$q="SELECT fname,lname FROM register WHERE email='$e'";
				$sql=mysql_query($q);
				$r=mysql_fetch_array($sql);
				echo "<b>".$r[0]." ".$r[1]." - </b>".$reply['reply']."&nbsp;<input type='submit' formaction='report.php' value='X' title='Report Post' class='imgR' name='sub'>";
				if($e== $email)
				{
					echo "<input type='submit' formaction='del.php' value='Del' title='Delete' class='imgRl' name='sub'>";
				}
				//if($e!=$email)
				//	echo "<input type='submit' name='reply_t' formaction='r.php' value='Reply' title='reply' class='imgRl' name='sub'><input type='hidden' name='rid' value='$rid'><br><br>";
			
					echo "</form>";
				//echo "<form method='POST'";
				//echo "&nbsp;<input type='submitd'  value='Del' title='Delete' class='imgRl' name='sub'>";
				//echo "</form>";
			}
		echo "</font></td>";
		echo "</tr>";
		
		echo "<form method='POST' action='reply.php'>";
		echo "<tr>";
		echo "<td><input type='text' name='reply' size='80' placeholder='Reply..'><input type='hidden' name='qid' value='$qid'></td>";
		echo "<td><input type='submit' value='Submit' name='submit' class='buttonL'></td>";
		echo "</tr>";
		echo "</form>";
		}
?></table>
         </div>
		  </div>
		  </main>
<?php require('footer.php');?>
</body>
</html>