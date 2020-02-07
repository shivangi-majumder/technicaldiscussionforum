<?php
ob_start();
error_reporting(0);
require('config.php');
$fname=$_SESSION['fname'];
if(empty($fname))
{
  session_destroy();
  require('heder.php');
}
elseif(!empty($fname) && $fname=='Admin')
{
  session_destroy();
  header("location: home.php");
}
else
  require('Uheader.php');
?>
<?php

?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Home</title>

    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    

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
                  <?php
                      $sql="SELECT fname,lname,email,pass,pn,block,ou,dp FROM register where email='$email' and pass='$pass'";
                      $result=mysql_query($sql);
                      $row=mysql_fetch_array($result);
                      //$_SESSION['fname'] = $row[0];
                      $_SESSION['lname'] = $row[1];
                      $_SESSION['email'] = $row[2];      
                      $_SESSION['pass'] = $row['pass'];
                      $_SESSION['dp'] = $row['dp'];
                      //$_SESSION['pn'] = $row['pn'];
                  ?>
          <font color="red">*Log out to see changes in the E-mail ID</font><br><br>
          <form method="post" action="" name="form1" id="form1" enctype="multipart/form-data">
          <p class="contact"><label for "file">Select Picture</label>
          <input type="file" name="file" id="file">
            <input type="hidden" value="<?php echo $_POST['pic'];?>" name="pic">
            <input type="submit" value="Upload" name="upload" id="upload" class="buttom"></p>

            <?php
              if(isset($_POST['upload']))
              {
                //print_r($_POST);
                //$pic=$_POST['pic'];
                $pic=$_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"], "images/".$pic); //."jpg");
                $sqli="UPDATE register set dp='$pic' WHERE register.fname='$fname'";
                mysql_query($sqli);
                
                echo "<script> alert('Change Successful !'); </script>";
                  //echo "<img src='images/$pic' class='demo-avatar'>";
              }
              $uri = $_SERVER['REQUEST_URI'];
              if(strpos($uri, '?') != false) {
                header('location: '.substr($uri, 0, strpos($uri, '?')));
              }
          ?>
          </form>
          <form id="contactform"> 
    			<p class="contact"><label for="fname">Name:&nbsp&nbsp</label>
          <label><?php echo "$fname $lname" ?></label></p></form>
          <form id="contactform"> 
          <p class="contact"><label for="fname">First Name</label> 
          <input id="fnem" name="fnem" placeholder="First Name" type="text" style="width:500px;">
          <input class="buttom" name="change1" value="Change" type="submit"> </p>
          <?php
           if(!empty($_REQUEST['change1']))
            {
              $fnem=$_REQUEST['fnem'];
                  $sqli="select * from register";
                  $result=mysql_query($sqli);
                  while($row=mysql_fetch_array($result))
                  {
                      $sql="UPDATE register set fname='$fnem' where register.fname='$fname' ";
                      mysql_query($sql);
                      //echo "<script> alert('Change Successful !'); </script>";
                      $uri = $_SERVER['REQUEST_URI'];
                      if(strpos($uri, '?') != false) {
                        header('location: '.substr($uri, 0, strpos($uri, '?')));
                      }
                      break;
                    }
              }
              ?></form>
          <form id="contactform"> 
      <p class="contact"><label for="lname">Last Name</label>
          <input id="lnem" name="lnem" placeholder="Last Name" type="text" style="width:500px;">
          <input class="buttom" name="change2" value="Change" type="submit"> </p>
           <?php
           if(!empty($_REQUEST['change2']))
            {
              $lnem=$_REQUEST['lnem'];
                 $sqli="select * from register";
                  $result=mysql_query($sqli);
                  while($row=mysql_fetch_array($result))
                  {
                      $sql="UPDATE register set lname='$lnem' where register.fname='$fname' ";
                      mysql_query($sql);
                      //echo "<script> alert('Change Successful !'); </script>";
                      $uri = $_SERVER['REQUEST_URI'];
                      if(strpos($uri, '?') != false) {
                        header('location: '.substr($uri, 0, strpos($uri, '?')));
                      }
                      break;
                  }
            }
            
          ?></form><br/>
          <form id="contactform"> 
   <p class="contact"><label for="pn">Phone Number:&nbsp&nbsp</label>
          <label><?php $pn=$_SESSION['pn'];echo "$pn" ?></label></p></form>
          <form id="contactform"> 
          <p class="contact"><label for="num">Number</label>&nbsp&nbsp&nbsp&nbsp
          <input type="number" min="5000000000" max="9999999999" name="num" style="width:500px;">
          <input class="buttom" name="change3" value="Change" type="submit">
          <?php
          $count=0;
           if(!empty($_REQUEST['change3']))
            {
                $num=$_REQUEST['num'];
                $sqli="select * from register";
                $result=mysql_query($sqli);
                while($row=mysql_fetch_array($result))
                {
                   if($row['pn']==$num)
                  {
                    $count=1;
                    echo "Number already in use !";
                    break;
                  }
                }
                if($count==0)
                {
                  $sql="UPDATE register set pn='$num' where register.fname='$fname' ";
                  mysql_query($sql);
                  echo "<script> alert('Change Successful !'); </script>";
                  }
                  $uri = $_SERVER['REQUEST_URI'];
                      if(strpos($uri, '?') != false) {
                        header('location: '.substr($uri, 0, strpos($uri, '?')));
                  break;
                }
              //else continue;
            }
              ?> </p></form><br>
          <form><p class="contact"><label for="email">Email id:&nbsp&nbsp</label>
          <label><?php echo "$email" ?></label></p></form>
          <form id="contactform"> 
          <p class="contact"><label for="email" >Email</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input id="emel" name="emel" placeholder="example@domain.com" type="email" style="width:500px;">
          <input class="buttom" name="change4" value="Change" type="submit">
          <?php
          $c=0;
           if(!empty($_REQUEST['change4']))
            {
              $emel=$_REQUEST['emel'];
              $sqli="select * from register";
              $result=mysql_query($sqli);
              while($row=mysql_fetch_array($result))
              {
                if($row['email']==$emel)
                  {
                    $c=1;
                    echo "Email ID already in use";
                    break;
                  }
                }
                if($c==0)
                {
                  $sql="UPDATE register set email='$emel' where register.fname='$fname' ";
                  mysql_query($sql);
                  //echo "<script> alert('Change Successful !'); </script>";
                  $uri = $_SERVER['REQUEST_URI'];
                      if(strpos($uri, '?') != false) {
                        header('location: '.substr($uri, 0, strpos($uri, '?')));
                      }

                  break;
                }
            }
            ?>

    </p></form>
   
              <form id="contactform"> 
              <p class="contact"><label for="email">Change Password:</label></p></form>
              <form id="contactform"> 
              <p class="contact"><label for="fname">Current:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input id="op" name="op" placeholder="Enter Current password" type="password" style="width:500px;"><br></p>
              <label for="fname">New:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <input id="np" name="np" placeholder="Enter New password" type="password" style="width:500px;">
              <input class="buttom" name="change5" value="Change" type="submit"> </p>
               <?php
                  $ct=0;
                   if(!empty($_REQUEST['change5']))
                    {
                        $op=md5($_REQUEST['op']);
                        $np=md5($_REQUEST['np']);
                        $sqli="select * from register";
                        $result=mysql_query($sqli);
                        while($row=mysql_fetch_array($result))
                        {
                           if($row['pass']==$op)
                          {
                            $ct=1;
                            $sql="UPDATE register set pass='$np' where register.fname='$fname' ";
                            mysql_query($sql);
                            echo "<script> alert('Change Successful !'); </script>";
                            break;
                          }
                        }
                        if($ct==0)
                        {
                          echo "<script> alert('Old password did not match !'); </script>";
                          break;
                        }
                      //else continue;
                    }
              ?></form>

</div>      
</div>
          </div>
		  </div>
		  </main>
      <?php require('footer.php');?>
		  </body>
		  </html>