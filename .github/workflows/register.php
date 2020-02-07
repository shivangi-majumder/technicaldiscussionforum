<?php
ob_start();
require('config.php');
$fname=$_SESSION['fname'];
if(empty($fname))
  require('heder.php');
elseif(!empty($fname) && $fname=='Admin')
  require('Aheader.php');
else
  require('Uheader.php');
?>
<!doctype html>

<html lang="en">
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="a.css">
	<link rel="stylesheet" href="b.css">
	<link rel="stylesheet" href="c.css">
	 <link rel="stylesheet" type="text/css" href="reg.css" media="all" />
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>

  </head>
  <body>
  <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-graphs mdl-shadow--6dp mdl-color--white mdl-cell mdl-cell--12-col">
<div class="container">
			
                <div  class="form">
    		<form id="contactform"> 
    			<p class="contact"><label for="fname">First Name</label></p> 
    			<input id="fname" name="fname" placeholder="First Name" type="text"> 

			<p class="contact"><label for="lname">Last Name</label></p> 
    			<input id="lname" name="lname" placeholder="Last Name"  type="text"> 
    			 
    			<p class="contact"><label for="email">Email</label></p><br>
    			<input id="email" name="email" placeholder="example@domain.com" type="email"><br>
					<label>Phone Number: </label><br>
				<input type="number" min="5000000000" max="9999999999" name="pn" style="width: 600px"><br>
 <select class="select-style gender" name="sex">
            <option value="select">i am..</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
            </select><br><br>				
                	<p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password"  name="pass">         
            <input class="buttom" name="submit" value="Sign me up!" type="submit"> 	<br> 
            <?php
require('config.php');
if(!empty($_REQUEST['submit'])){
  $email=$_REQUEST['email'];
  $pass=md5($_REQUEST['pass']);
  $fname=$_REQUEST['fname'];
  $lname=$_REQUEST['lname'];
  $sex=$_REQUEST['sex'];
  $pn=$_REQUEST['pn'];
  
  $sql="select * from register";
  //echo "$sql";
  $result=mysql_query($sql);
  $row = mysql_fetch_array($result);
  //echo "<script> alert('$fname'); </script>";
  if($fname==""||$lname==""||$email==""||$pass==""||$pn=="")
  {
    echo "<script> alert('Values should not be null'); </script>";
  }
  else if($row['email']==$email)
      echo "<script> alert('Email ID already in use'); </script>";
   else if($row['pn']==$pn)
      echo "<script> alert('Phone Number already in use'); </script>";
  else
  {
    $sqli="INSERT INTO register VALUES('','$fname','$lname','$email','$pass','$pn','$sex',0,0,'images.jpg')";
    mysql_query($sqli);
    echo "<script> alert('Registration is successful'); </script>";
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