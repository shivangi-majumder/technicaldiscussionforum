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
          <div class="demo-graphs mdl-shadow--6dp mdl-color--white mdl-cell mdl-cell--10-col">
<div class="container">
			
                <div  class="form">
    		<form id="contactform"> 
    			<p class="contact"><label for="fname">First Name</label></p> 
    			<input id="fname" name="fname" placeholder="First Name" required="" type="text"> 

			<p class="contact"><label for="lname">Last Name</label></p> 
    			<input id="lname" name="lname" placeholder="Last Name" required="" type="text"> 
    			 
    			<p class="contact"><label for="email">Email</label></p><br>
    			<input id="email" name="email" placeholder="example@domain.com" required="" type="email"><br>
					<label>Phone Number: </label><br>
				<input type="number" min="5000000000" max="9999999999" name="pn" style="width: 600px"><br>
 <select class="select-style gender" name="gender">
            <option value="select">i am..</option>
            <option value="m">Male</option>
            <option value="f">Female</option>
            <option value="others">Other</option>
            </select><br><br>				
                	<p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password"  name="password" required="">         
            <input class="buttom" name="submit" value="Sign me up!" type="submit"> 	<br> 
   </form> 
</div>      
</div>
          </div>
		  </div>
		  </main>
		  </body>
		  </html>