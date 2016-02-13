<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    die("Please login first");
}
?>

<html>
<head>
<title>MMU Room Booking System</title>
<link rel="stylesheet" href="style2.css" type="text/css" />
</head>
<body>
<center>
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="admin_page.php">HOME</a></font></p>
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="logout.php">LOG OUT</a></font></p>
	<p align="center"><font size="7" face="Georgia" color="#000000">
	Search by Options</font></p>
	<form name="frm" method="post" action="searchresult.php">
<table align="center" width="30%" border="0">
<tr>
	<td><input type="text" name="query1" placeholder="Search Input" required=""/></td>
</tr>
<tr>
<td><button id="" type="submit" name="submit" onclick="">Search By Date</button></td>
</tr>
<tr>
<td><button id="" type="submit" name="submit1" onclick="">Search By Rooms</button></td>
</tr>
<tr>
<td><button id="" type="submit" name="submit2" onclick="">Search By Members</button></td>
</tr>
</table>
</form>
</center>
</body>
</html>
