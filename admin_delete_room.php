<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    die("Please login first");
}
?>
<html>
<head>
<title>MMU Room Booking System</title>
<?php
include 'db_connect.php'; //Connect mysql database
$result ="";
$result = mysql_query("select room_id from room ORDER BY room_type");
if(isset($_POST['submit'])) ///forsubmit data
{
$rid=$_POST['org'];
$delres=mysql_query("delete from room where room_id=\"$rid\"");

if($delres==1)
{
echo "Room Deleted Successfully";
echo "<p>Click <a href='admin_page.php'> here </a> to delete another";
exit(0);
}
}
?>
<link rel="stylesheet" href="style2.css" type="text/css" />
</head>
<body>
<center>
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="admin_page.php">HOME</a></font></p>
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="logout.php">LOG OUT</a></font></p>
	<p align="center"><font size="7" face="Georgia" color="#000000">
	Room records Delete</font></p>
	<form name="frm" method="post">
<table align="center" width="30%" border="0">
<tr>
<td>
	<select name="org">
    <?php
    while($row = mysql_fetch_array($result, MYSQL_BOTH))
    {
    echo "<option>$row[0]</option>";
    }
    echo"</select>";
    ?>
</select>
</td>
</tr>
<tr>
<td><button type="submit" name="submit" onclick="">Delete Record</button></td>
</tr>
</table>
</form>
</center>
</body>
</html>
