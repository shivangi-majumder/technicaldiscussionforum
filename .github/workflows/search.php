<?php
ob_start();
require('config.php');
?>
<!doctype html>
<html>
<head>
<title>Search</title>
</head>
<body>
<h4>Search</h4>
<form method="POST" action="twise_forum.php">
    <td align="right" valign="" width="250"><input type="text" name="tid" placeholder="  Search Q & A.." class="text"></td>
    <td align="left" valign=""><input type="submit" value="search" name="searchB" class="buttS buttonL"></td>
    </form>
<?php
/*if(!empty($_REQUEST['submit']))
{
	$search=$_REQUEST['search'];
	$sql = mysql_query("SELECT * FROM question WHERE question='$search'");
	while ($row=mysql_fetch_array($sql))
	{
		if($row!="")
*/

?>
</form>