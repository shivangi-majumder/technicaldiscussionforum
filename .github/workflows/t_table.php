<?php
ob_start();
require('config.php');
if(empty($_SESSION['fname']))
  $page="twise_forum.php";
else
  $page="Atwise_forum.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<style>
.button
{
  background-color: rgb(153,204,102);
    color: rgb(153,51,0);
    padding: 3px 8px;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
  border-radius: 3px;
}
.button:hover {
    background-color: rgb(92,141,61);
    color: white;
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
.buttonT {
    background-color: rgb(92,116,61); /* Green */
    border: none;
    color: rgb(153,204,102);
    padding: 5px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.buttonT:hover {
    color: white;
}
</style>
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 28px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 0px 0px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.1s;
    cursor: pointer;
}

.button1 {
    background-color: #37474f; 
    color: white; 
    
}

.button1:hover {
    background-color: #c1c1c1;
    color: #37474f; 
   
}
</style>
</head>
<body>
<!--TOPIC TABLE-->
<table width="165" id="navigation" bgcolor="#37474f">
  
    <?php
        $sql="SELECT * FROM topic";
        $result=mysql_query($sql);
        while($rows=mysql_fetch_array($result))
        {
          echo "<form method='POST' action='$page'>";
          echo "<tr align='center'>";
          $tid=$rows['topic_name'];
          echo "<td width='165'><input type='hidden' name='tid' value='$tid'><input type='submit' value= '$tid' class='button button1' style='width:100%'>"; echo "</td>";
          echo "</tr>";
          echo "</form>";
        }
    ?>
</table>
</body>
</html>