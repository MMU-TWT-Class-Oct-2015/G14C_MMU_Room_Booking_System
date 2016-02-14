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
$result = mysql_query("select booking_date from booking ORDER BY booking_date");
if(isset($_POST['submit'])) ///forsubmit data
{
$bookdate=$_POST['org'];
$sortdate = date('Y-m-d', strtotime($bookdate));
$delres=mysql_query("delete from booking where booking_date<=\"$sortdate\"");

if($delres==1)
{
echo "Account Deleted Successfully";
echo "<p>Click <a href='admin_page.php'> here </a> to delete another";
exit(0);
}
}
?>
<link rel="stylesheet" href="style2.css" type="text/css" />
</head>
<body>
  <script>
  function checkdate(form)
  {
    // regular expression to match required date format
    re = /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/;

    if(form.org.value != '') {
      if(regs = form.org.value.match(re)) {
        // day value between 1 and 31
        if(regs[1] < 1 || regs[1] > 31) {
          alert("Invalid value for day: " + regs[1]);
          form.org.focus();
          return false;
        }
        // month value between 1 and 12
        if(regs[2] < 1 || regs[2] > 12) {
          alert("Invalid value for month: " + regs[2]);
          form.org.focus();
          return false;
        }
        // year value between 1902 and 2016
        if(regs[3] < 1902 || regs[3] > (new Date()).getFullYear()) {
          alert("Invalid value for year: " + regs[3] + " - must be between 1902 and " + (new Date()).getFullYear());
          form.org.focus();
          return false;
        }
      } else {
        alert("Invalid date format: " + form.org.value);
        form.org.focus();
        return false;
      }
    }
    else{
    alert("Please fill up the date..!");
  }
}
</script>
<center>
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="admin_page.php">HOME</a></font></p>
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="logout.php">LOG OUT</a></font></p>
	<p align="center"><font size="7" face="Georgia" color="#000000">
	Booking record Delete</font></p>
	<form name="form" method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="org" placeholder="dd-mm-yyyy Booked Date" required />
</td>
</tr>
<tr>
<td><button type="submit" name="submit" onclick="return checkdate(form);">Delete Record</button></td>
</tr>
</table>
</form>
</center>
</body>
</html>
