<?php
ob_start();
require('config.php');
$fname=$_SESSION['fname'];
$email=$_SESSION['email'];
if(!empty($fname) && $fname=='Admin')
  require('Aheader.php');
elseif(!empty($fname))
  require('Uheader.php');
else
  {
    session_destroy();
    header('location:home.php');
  }
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
        <font color="white">
        <h3><center>FEEDBACK</center></h3>
           <form>
          <textarea rows="4" cols="60000000000" style="width:65%;" name="fb" placeholder="Please send us your feedback.."></textarea><br>
          <input class="buttom" name="submit" value="Submit" type="submit"><br><br>

          <?php
          if(!empty($_REQUEST['submit']))
          {
            $fb=$_REQUEST['fb'];
            if(!empty($fb))
            {
              $sql="INSERT INTO feedback VALUES('','$fb','$email')";
              mysql_query($sql);
              echo "<script> alert('Thank You for your feedback!')</script>";
            }
          }
        ?>
</form>         
</font>
          </div>
      </div>
      </main>
	  <?php require('footer.php');?>
      </body>
      </html>