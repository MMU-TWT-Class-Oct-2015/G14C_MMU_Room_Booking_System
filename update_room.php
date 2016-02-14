<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['admin_username'])){
    die("Please login first");
}
include_once 'db_connect.php';

if(isset($_POST['btn-signup']))
{
  $rid = mysql_real_escape_string($_POST['roomid']);
	$rtype = mysql_real_escape_string($_POST['rtype']);
	$r_c = mysql_real_escape_string($_POST['rc']);
  $ridold = mysql_real_escape_string($_POST['ridold']);

  $ridold = trim($ridold);
  $r_c = trim($r_c);
	$rtype = trim($rtype);
  $rid = trim($rid);

if(mysql_query("UPDATE `room` SET `room_id`='$rid',`room_type`='$rtype',`capacity`='$r_c' WHERE `room_id` = '$ridold'"))
		{
      echo "<script>
  alert('Successfully updated ur Rooms...!!!');
  window.location.href='admin_page.php';
  </script>";
		}
		else
		{
      echo "<script>
  alert('Error in Updating...Please Try again later...!!!');
  window.location.href='admin_page.php';
  </script>";
    }

}
if(isset($_GET['edit'])){
$id=$_GET['edit'];
$res=mysql_query("SELECT * FROM room WHERE room_id='$id'");
$row=mysql_fetch_array($res);
}
?>
<html>
<head>
<title>MMU Room Booking System</title>
<link rel="stylesheet" href="style2.css" type="text/css" />
</head>
<body>
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="admin_page.php">HOME</a></font></p>
  <script type="text/javascript">
  function checkdate(form)
  {
    // regular expression to match required date format
    re = /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/;

    if(form.bdate.value != '') {
      if(regs = form.bdate.value.match(re)) {
        // day value between 1 and 31
        if(regs[1] < 1 || regs[1] > 31) {
          alert("Invalid value for day: " + regs[1]);
          form.bdate.focus();
          return false;
        }
        // month value between 1 and 12
        if(regs[2] < 1 || regs[2] > 12) {
          alert("Invalid value for month: " + regs[2]);
          form.bdate.focus();
          return false;
        }
        // year value between 1902 and 2016
        if(regs[3] < 1902 || regs[3] > (new Date()).getFullYear()) {
          alert("Invalid value for year: " + regs[3] + " - must be between 1902 and " + (new Date()).getFullYear());
          form.bdate.focus();
          return false;
        }
      } else {
        alert("Invalid date format: " + form.bdate.value);
        form.bdate.focus();
        return false;
      }
    }
    else{
    alert("Please fill up the date..!");
  }
  return true;
  }
  function checkstarttime(form){
    // regular expression to match required time format
    re = /^(\d{1,2}):(\d{2})([ap]m)?$/;

    if(form.tstart.value != '') {
      if(regs = form.tstart.value.match(re)) {
        if(regs[3]) {
          // 12-hour value between 1 and 12
          if(regs[1] < 1 || regs[1] > 12) {
            alert("Invalid value for hours: " + regs[1]);
            form.tstart.focus();
            return false;
          }
        } else {
          // 24-hour value between 0 and 23
          if(regs[1] > 23) {
            alert("Invalid value for hours: " + regs[1]);
            form.tstart.focus();
            return false;
          }
        }
        // minute value between 0 and 59
        if(regs[2] > 59) {
          alert("Invalid value for minutes: " + regs[2]);
          form.tstart.focus();
          return false;
        }
      } else {
        alert("Invalid time format: " + form.tstart.value);
        form.tstart.focus();
        return false;
      }
    }
    else {
      alert("Please fill up the starting time..!");
    }
    return true;
  }
  function checkendtime(form){
    // regular expression to match required time format
    re = /^(\d{1,2}):(\d{2})([ap]m)?$/;

    if(form.tend.value != '') {
      if(regs = form.tend.value.match(re)) {
        if(regs[3]) {
          // 12-hour value between 1 and 12
          if(regs[1] < 1 || regs[1] > 12) {
            alert("Invalid value for hours: " + regs[1]);
            form.tend.focus();
            return false;
          }
        } else {
          // 24-hour value between 0 and 23
          if(regs[1] > 23) {
            alert("Invalid value for hours: " + regs[1]);
            form.tend.focus();
            return false;
          }
        }
        // minute value between 0 and 59
        if(regs[2] > 59) {
          alert("Invalid value for minutes: " + regs[2]);
          form.tend.focus();
          return false;
        }
      } else {
        alert("Invalid time format: " + form.tend.value);
        form.tend.focus();
        return false;
      }
    }
    else {
      alert("Please fill up ending the time..!");
    }
    return true;
  }
  function myfunctions() {
  var retvalue;
  retvalue = checkdate(form);
  if(retvalue == false) { return retvalue; }
  retvalue = checkstarttime(form);
  if(retvalue == false) { return retvalue; }
  return checkendtime(form);
}
</script>
<center>
<div id="login-form">
<form method="post" name="form">
<table align="center" width="30%" border="0">
<p align="center"><font size="7" face="Georgia" color="#000000">
Member Register</font></p>
<tr>
<td><input type="text" name="roomid" placeholder="Room ID" value="<?php echo $row[room_id]; ?>" required/>
  <input type="hidden" name="ridold" value="<?php echo $row[room_id]; ?>" required/></td>
</tr>
<tr>
<td><input type="text" name="rtype" placeholder="Room Type" value="<?php echo $row[room_type]; ?>" required /></td>
</tr>
<tr>
<td><input type="text" name="rc" placeholder="Capacity of Room" value="<?php echo $row[capacity]; ?>" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup" onclick="return myfunctions();">Update</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
