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
	<form name="frm" method="post">
<table align="center" width="30%" border="0">
<tr>
<td><select name="mtype">
  <option value="student">student</option>
  <option value="staff">staff</option>
</select></td>
</tr>
<tr>
<td><button id="" type="submit" name="submit" onclick="">NEXT</button></td>
</tr>
</table>
</form>
</center>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
  $memtype = $_POST['mtype'];
  if($memtype=="staff"){
    header('Location:admin_room_book_staff.php');
  }
  else if($memtype=="student"){
    header('Location:admin_room_book_student.php');
}
}
?>
