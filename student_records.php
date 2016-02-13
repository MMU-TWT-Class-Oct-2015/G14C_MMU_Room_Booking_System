<?php
session_start();
include_once "db_connect.php";
if(!isset($_SESSION['member_id'])){
    die("Please login first");//jika belum login jangan lanjut
}

if($_SESSION['membership_type']!="student"){
    die("You're not a student..!");
}
$username = $_SESSION['member_id'];
?>
<html>
<head>
<title></title>
<style>
h1{text-align:center;
  margin-top:150;
}
table, th, td {
  border:1px solid black;
}
/* unvisited link */
a:link {
    color: black;
}

/* visited link */
a:visited {
    color: black;
}

/* mouse over link */
a:hover {
    color: white;
}

/* selected link */
a:active {
    color: green;
}

</style>
</head>
<body background="image/back.jpg">
  <p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="student_room_book.php">BACK</a></font></p>
<?php
$username = htmlspecialchars($username);
$username = mysql_real_escape_string($username);
echo "<table border='1' width='90%' id='table1' height='50' align=center>";
echo "<tr>
<td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>Booking Date</FONT></B></STRONG></font></td>
  <td height='51' align='center' width='10%'>
<STRONG><B>
<FONT
color=#800000 size='5'>Member ID</FONT></B></STRONG></td>
<td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>Start time</FONT></B></STRONG></font></td>
<td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>End time</FONT></B></STRONG></font></td>
<td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>Room ID</FONT></B></STRONG></font></td>
<td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>Organizer</FONT></B></STRONG></font></td>
<td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>No of participants</FONT></B></STRONG></font></td>
</tr>";
$raw_results =
mysql_query("SELECT * FROM booking WHERE (`member_id` LIKE '%".$username."%') order by booking_date desc");
if(mysql_num_rows($raw_results) > 0)
{
while($results = mysql_fetch_array($raw_results))
{
echo "<tr>

<td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>".$results['booking_date']."</FONT></B></STRONG></font></td> <td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>".$results['member_id']."</FONT></B></STRONG></font></td> <td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>".$results['time_start']."</FONT></B></STRONG></font></td>
<td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>".$results['time_end']."</FONT></B></STRONG></font></td> <td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>".$results['room_id']."</FONT></B></STRONG></font></td> <td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>".$results['organizer']."</FONT></B></STRONG></font></td> <td width='10%' height='51' align='center'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>".$results['number_of_participants']."</FONT></B></STRONG></font></td>

</tr>" ;
}

}
else{
echo "<tr align='center'>

<td colspan='9'>
<font size='5'><STRONG><B>
<FONT
color=#800000 size='5'>No results</FONT></B></STRONG></font></td><tr>";
echo "</table>";
}
?>
