<?php
# connect to the database
include_once('config.php');

// database query
$sql = mysql_query('SELECT * FROM database.chat ORDER BY time asc');

# show database results
while($row = mysql_fetch_array($sql))
{
	echo "<b>".$row['0']."</b>:".($row['1'])."<div align='right'>".($row['2'])."</div><br/>";
}
//mysql_close($link);
# REFRESH PAGE
echo '<META HTTP-EQUIV="refresh" CONTENT="5">';
?>