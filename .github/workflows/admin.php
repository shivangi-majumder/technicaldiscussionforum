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
          <font color="white"><H3>Welcome Administrator</h3>
</font>
<p><font color="white">
<b>You can:</b><br /> <br/>
<li>  See reportd posts<br/>
<li>  Unreport a post<br/>
<li>  Block or unblock a user<br/><br/>
<li>  Add contacts for contact us<br/><br/>
<li>  Add or delete a topic to be discussed on<br/><br/>
</font></p>
          </div>
		  </div>
		  </main>
      <?php require('footer.php');?>
		  </body>
		  </html>
