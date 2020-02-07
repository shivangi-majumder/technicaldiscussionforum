<?php
ob_start();
require('config.php');
$fname=$_SESSION['fname'];
if(!empty($fname) && $fname=='Admin')
  require('Aheader.php');
else
  {
    session_destroy();
    header('location:home.php');
  }
?>
<?php

$uri = $_SERVER['REQUEST_URI'];
if(strpos($uri, '?') != false) {
  header('location: '.substr($uri, 0, strpos($uri, '?')));
}
?>
<!doctype html>

<html lang="en">
  <head>
  
	
	<link rel="stylesheet" type="text/css" href="reg.css" media="all" />

<link rel="stylesheet" href="style.css" type="text/css" />


</style>

  </head>
  <body>
  <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
        <div class="demo-graphs mdl-shadow--6dp mdl-color--Cyan-900 mdl-cell mdl-cell--12-col">
		<div class="container">
			
                <div  class="form">
        <font color="black">
           <p><label for="fname">Question:</label> </p>
           <form>
          <input id="qs" name="qs" placeholder="Type the question" type="text" style="width:600px;"><br>
          <input class="buttom" name="submit" value="submit" type="submit" class='buttonL'><br><br>
          <?php
              if(!empty($_REQUEST['submit']))
              {
                $qs=$_REQUEST['qs'];

                if(!empty($qs))
                {
                  $sql="INSERT INTO faqq VALUES('','$qs')";
                  mysql_query($sql);
                }
              }
          ?>
          </form>
          <p><label for="fname">Answer:</label> </p>
          <form>
          <input id="qid" name="qid" placeholder="Type the question id" type="text" ><br>
          <input id="ans" name="ans" placeholder="Type the answer" type="text" style="width:600px;"><br>
          <input class="buttom" name="submit1" value="submit" type="submit" class='buttonL'><br><br> 
            <?php
              if(!empty($_REQUEST['submit1']))
              {
                $qid=$_REQUEST['qid'];
                $ans=$_REQUEST['ans'];

                if(!empty($ans)&& !empty($qid))
                {
                  $sql="INSERT INTO faqa VALUES('','$ans','$qid')";
                  mysql_query($sql);
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