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
          <div class="demo-graphs mdl-shadow--6dp mdl-color--Cyan-900 mdl-cell mdl-cell--12-col mdl-color--teal-A700">
            <h2><font color="white">Technical Forum</font></h2>
          <p><font color="white">Indian education system has always been struggling with too many students chasing a handful of superior quality teachers.<br>The social and economic disparities add to this woe, forcing innumerable deserving students to compromise with their educational dreams.<br><br>This forum wants to make quality education personalised and accessible to all. Although we know that technology cannot replace teachers, we also know that a teacher proficient in using technology can change the face of education.<br><br> In this forum we can register to discuss the question, users who are not logged in cannot see the question and answer. But they can chat as a ghost user to those who are online. Chat is also an special features in our forum as the ghost user also can chat to those who are online. Logged in user can can ask the question on any programming languages. User can also report post and answer whichever they think is not suitable for the forum. Those reported post will be reviewed by the admin and he may block the user if he wants. Blocked users will not be able to log in anymore.<br><br>Users can delete their own questions and answer and also can change their own profile picture, name, phone number, email, and passward. Logged in users can also chat as "ghost users" with any random name. We can also search languages in the forum to see a particular topic.
</font></p>
          </div>
		  </div>
		  </main>
      <?php require('footer.php');?>
		  </body>
		  </html>