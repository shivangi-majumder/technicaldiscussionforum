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
      right: ;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    width: 130px;
    }
    .buttonL {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 0px 8px;
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
.buttonL:hover {
    background-color: rgb(92,141,61);
    color: white;
}
    </style>
  
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--black mdl-color-text--grey-100">
        <div class="mdl-layout__header-row">
       <a class="mdl-navigation__link" href="home.php"><i class="mdl-color-text--blue-grey-300 material-icons" role="presentation">home</i><b><font color="white">Home</font></b></a>
     <a class="mdl-navigation__link" href="forum.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i><font color="white">Forums</font></a>
	 <a class="mdl-navigation__link" href="contact.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i><font color="white">Contact Us</font></a>

<?php
    $query="SELECT ou FROM register WHERE email='admin'";
    $result=mysql_query($query);
    $row=mysql_fetch_array($result);
    $ou=$row[0];
    ?>
<?php //echo "Users online($ou)";?>
<form>
     &nbsp&nbsp&nbsp <input type="text" name="email" placeholder="example@xyz.com" style="height: 20px;width:124px">
     <input type="password" name="pass" placeholder="Password" style="height: 20px;width:124px">
    &nbsp <input type="submit" name="login" value='Login' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-button mdl-color--red">
    <a href="register.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white mdl-color--blue" >Sign Up</a>
    
  <?php
if(!empty($_REQUEST['login']))
  {
    $email=$_REQUEST['email'];
    $pass=md5($_REQUEST['pass']);
    $sql="SELECT fname,lname,email,pass, block, ou,dp FROM register where email='$email' and pass='$pass'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    if($email==$row['email']&&$pass==$row['pass']&& $row['block']!=1)
    {
        //echo "\n $row[1] \t $row[2] \t $row[0]";
      $_SESSION['fname'] = $row[0];
      $_SESSION['lname'] = $row[1];
      $_SESSION['email'] = $row[2];      
      $_SESSION['pass'] = $row['pass'];
      $_SESSION['pn'] = $row['pn'];
      $_SESSION['dp']=$row['dp'];
      if($email=='admin'){
        $query="SELECT ou FROM register WHERE email='admin'";
        $result=mysql_query($query);
        $row=mysql_fetch_array($result);
        $ou=$row[0];
        $ou++;
        $query="UPDATE register SET ou='$ou' WHERE email='admin'";
        mysql_query($query);
        header("location: admin.php");
      }
      else
      {
        $query="SELECT ou FROM register WHERE email='admin'";
        $result=mysql_query($query);
        $row=mysql_fetch_array($result);
        $ou=$row[0];
        $ou++;
        $query="UPDATE register SET ou='$ou' WHERE email='admin'";
        mysql_query($query);
        header("location: about.php");
      }
    }
    elseif($email==$row['email']&&$pass==$row['pass']&& $row['block']==1)
    {
     echo "Sorry! You have been blocked"; 
    }
    else{
       // header("location: about.php");
        echo "Your Login Name or Password is invalid";
      }
    }
?>
</form>

         <form method="POST" action="twise_forum.php">
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
		  <input type="submit" value="Contact" class="mdl-menu__item" name="Contact" formaction="feedback.php" style="width:150px">
		  <input type="submit" value="Privacy Policy" class="mdl-menu__item" name="Privacy Policy" formaction="pp.php" style="width:150px">
          </ul>
		  </form>
        </div>
        
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="images/images.jpg" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span>Welcome to our forum!</span>
            <div class="mdl-layout-spacer"></div>
            
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
          </div>
		  <script src="y.js"></script>
        <!--  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>-->
  </body>
</html>
