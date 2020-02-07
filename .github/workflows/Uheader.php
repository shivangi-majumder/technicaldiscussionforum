<?php
ob_start();
require('config.php');
?>
<!doctype html>

<html lang="en">
  <head>
  
    <title>Online disscussion forum</title>
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
       <a class="mdl-navigation__link" href="home.php""><i class="mdl-color-text--blue-grey-300 material-icons" role="presentation">home</i><b><font color="white">Home</font></b></a>
	   <a class="mdl-navigation__link" href="forum_log.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i><font color="white"><b>Forums</b></font> </a>
	   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	   <a class="mdl-navigation__link" href="contact.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i><font color="white"><b>Contact</b></font> </a>
 
<?php
    $query="SELECT ou FROM register WHERE email='admin'";
    $result=mysql_query($query);
    $row=mysql_fetch_array($result);
    $ou=$row[0];
    ?>
<?php //echo "Users online($ou)";?>

           &nbsp&nbsp&nbsp<form method="POST" action="Atwise_forum.php">
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
             <input type="submit" value="Feedback" class="mdl-menu__item" name="Feedback" formaction="feedback.php" style="width:150px">
		  <input type="submit" value="Privacy Policy" class="mdl-menu__item" name="Privacy Policy" formaction="pp.php" style="width:150px">
          </ul>
		   </form>
        </div>

      </header>
         <?php

$fname=$_SESSION['fname'];
$email=$_SESSION['email'];
$lname=$_SESSION['lname'];
$pass=$_SESSION['pass'];
$pic=$_SESSION['dp'];
?>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        
        <header class="demo-drawer-header">

             <?php echo "<img src='images/$pic'"?> class ="demo-avatar">
          <div class="demo-avatar-dropdown">
<?php echo "Welcome $fname"; ?>
<?php 
    $sql="SELECT fname,lname,email,pass,pn,block,ou,dp FROM register where email='$email' and pass='$pass'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
     $_SESSION['fname'] = $row[0];
      $_SESSION['lname'] = $row[1];
      $_SESSION['email'] = $row[2];      
      $_SESSION['pass'] = $row['pass'];
      $_SESSION['pn'] = $row['pn'];
      $_SESSION['dp']=$row['dp'];
    ?>
  
  
</span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
			<form>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
             <input type="submit" value="Settings" class="mdl-menu__item" name="Settings" formaction="settings.php" style="width:150px">
			 <input type="submit" value="Feedback" class="mdl-menu__item" name="Feedback" formaction="feedback.php" style="width:150px">
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
          <a class="mdl-navigation__link" href="faq.php"><i class="mdl-color-text--blue-grey-300 material-icons" role="presentation">help_outline</i><font color="white">FAQ</font></a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
           <img src="a.jpg" width="970" height="280">
          <div class="view-source" id="view-source">
<!DOCTYPE html>
<html lang="en">
  <head>
  <style>

.chat_box{
  position:fixed;
  right:20px;
  bottom:0px;
  width:250px;
}
.chat_body{
  background:white;
  height:400px;
  padding:5px 0px;
}

.chat_head,.msg_head{
  background:#f39c12;
  color:white;
  padding:15px;
  font-weight:bold;
  cursor:pointer;
  border-radius:5px 5px 0px 0px;
}

.msg_box{
  position:fixed;
  bottom:-5px;
  width:250px;
  background:white;
  border-radius:5px 5px 0px 0px;
}

.msg_head{
  background:#3498db;
}

.msg_body{
  background:white;
  height:200px;
  font-size:12px;
  padding:15px;
  overflow:auto;
  overflow-x: hidden;
}
.msg_input{
  width:100%;
  border: 1px solid white;
  border-top:1px solid #DDDDDD;
  -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
  -moz-box-sizing: border-box;    /* Firefox, other Gecko */
  box-sizing: border-box;  
}

.close{
  float:right;
  cursor:pointer;
}
.minimize{
  float:right;
  cursor:pointer;
  padding-right:5px;
  
}

.user{
  position:relative;
  padding:10px 30px;
}
.user:hover{
  background:#f8f8f8;
  cursor:pointer;

}
.user:before{
  content:'';
  position:absolute;
  background:#2ecc71;
  height:10px;
  width:10px;
  left:10px;
  top:15px;
  border-radius:6px;
}

.msg_a{
  position:relative;
  background:#FDE4CE;
  padding:10px;
  min-height:10px;
  margin-bottom:5px;
  margin-right:10px;
  border-radius:5px;
}
.msg_a:before{
  content:"";
  position:absolute;
  width:0px;
  height:0px;
  border: 10px solid;
  border-color: transparent #FDE4CE transparent transparent;
  left:-20px;
  top:7px;
}


.msg_b{
  background:#EEF2E7;
  padding:10px;
  min-height:15px;
  margin-bottom:5px;
  position:relative;
  margin-left:10px;
  border-radius:5px;
  word-wrap: break-word;
}
.msg_b:after{
  content:"";
  position:absolute;
  width:0px;
  height:0px;
  border: 10px solid;
  border-color: transparent transparent transparent #EEF2E7;
  right:-20px;
  top:7px;
}
</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="facivon.ico">
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="script.js"></script>
  </head>
  <body>
  
  <div class="chat_box">
  <div class="chat_head"><?php echo "Users online($ou)";?></div>
  <div class="chat_body"> 
  <?php require('chat.php');?>
  </div>
  </div>
</body>
</html>
</div>
 <script src="y.js"></script>
  </body>
</html>
