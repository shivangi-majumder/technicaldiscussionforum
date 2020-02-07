<?php
ob_start();
require('config.php');
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
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--black mdl-color-text--grey-100">
        <div class="mdl-layout__header-row">
        <a class="mdl-navigation__link" href="about.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i><font color="white">About Us</font></a>
     <a class="mdl-navigation__link" href="add_tap.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i><font color="white">topics and post</font></a>
     <a class="mdl-navigation__link" href="mg_cts.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i><font color="white">manage contacts</font></a>
<?php
    $query="SELECT ou FROM register WHERE email='admin'";
    $result=mysql_query($query);
    $row=mysql_fetch_array($result);
    $ou=$row[0];
    ?>
<?php //echo "Users online($ou)";?>

  
           <form method="POST" action="Atwise_forum.php">
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input type="text" id="search" class="mdl-textfield__input" name="tid" style="float: right";>
              <label name="tid" class="mdl-textfield__label" for="search" >Enter your query...</label>
              <input type="hidden" value="search" name="searchB" class="buttS buttonL"></td>
            </div>
          </div>
        </form>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">

      <i class="material-icons">more_vert</i>
          </button>
		  <form>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
		  <input type="submit" value="Contact" class="mdl-menu__item" name="Contact" formaction="cona.php" style="width:150px">
		  <input type="submit" value="FAQs" class="mdl-menu__item" name="FAQs" formaction="faqa.php" style="width:150px">
          </ul>
		  </form>
        </div>

      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="images/user.jpg" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span><form>
  <?php

$fname=$_SESSION['fname'];
$email=$_SESSION['email'];
?><?php echo "Welcome $fname"; ?>
  
  
</form></span>
       </span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
         			<form>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
			 <input type="submit" name="logout" class="mdl-menu__item" value='Logout'  style="width:150px">
			  <?php if(!empty($_REQUEST['logout'])){      
       $query="SELECT ou FROM register WHERE email='admin'";
        $result=mysql_query($query);
        $row=mysql_fetch_array($result);
        $ou=$row[0];
        $ou--;
        $p="UPDATE register SET ou='$ou' WHERE email='admin'";
        mysql_query($p);
       session_destroy();
       header("location: home.php");
  }?>
  </form>
            </ul>
          </div>
        </header>
      <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
         <!--  <?php
        $sql="SELECT * FROM topic";
        $result=mysql_query($sql);
        while($rows=mysql_fetch_array($result))
        {
          echo "<form method='POST' action='$page'>";
          echo "<tr align='center'>";
          $tid=$rows['topic_name'];
          echo "<td width='165'><input type='hidden' name='tid' value='$tid'><input type='submit' value= '$tid' class='mdl-color-text--blue-grey-400 material-icons'>"; echo "</td>";
          echo "</tr>";
          echo "</form>";
        }
          ?>-->
		  	  <?php
  require("t_table.php");
?>
  <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href="faqa.php"><i class="mdl-color-text--blue-grey-300 material-icons" role="presentation">help_outline</i><font color="white">FAQ</font></a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
           <img src="a.jpg" width="970" height="280">
          </div>
       
        	  <script src="y.js"></script>
  </body>
</html>
