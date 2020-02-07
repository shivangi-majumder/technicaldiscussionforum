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
        <div class="demo-graphs mdl-shadow--6dp mdl-color--Cyan-900 mdl-cell mdl-cell--12-col">
        
        <?php
          $query="SELECT * FROM faqq order by id";
          $result=mysql_query($query);
          while($rows=mysql_fetch_array($result))
          {
            $id=$rows['id'];
            echo "<font size='4'color='black'>";
            echo "<form method='POST'>";
            echo "<tr>";
            echo "<td><font size='3'><br/>Q: ".$rows['question']."</font></td>";
            echo "</tr>";
            echo "</form>";
            echo "</font>";
            $a="SELECT * FROM faqa WHERE id='$id'order by aid";
            $sql=mysql_query($a);
            echo "<font size='3'color='green'>Answer:</font>";
            while($ans=mysql_fetch_array($sql))
            {
              echo "<form method='POST'>";
              echo "<font size='3'color='green'>";
              echo "".$ans['answer'];
              echo "</form>";
            }

          }
          ?>
      </div>
		  </div>
		  </main>
      <?php require('footer.php');?>
		  </body>
		  </html>