<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['member_id'])){
    die("Please login first");//jika belum login jangan lanjut
}

if($_SESSION['membership_type']!="staff"){
    die("You're not a staff..!");
}
include_once 'db_connect.php';
$uname = $_SESSION['member_id'];
$roomid = $_POST['rid'];

if(isset($_POST['btn-signup']))
{
	$b_date = mysql_real_escape_string($_POST['bdate']);
	$t_start = mysql_real_escape_string($_POST['tstart']);
	$t_end = mysql_real_escape_string($_POST['tend']);
	$org_name = mysql_real_escape_string($_POST['org']);
  $n_o_p = mysql_real_escape_string($_POST['nop']);

  $t_start = trim($t_start);
	$t_end = trim($t_end);
	$org_name = trim($org_name);
  $n_o_p = trim($n_o_p);
  $sortdate = date('Y-m-d', strtotime($b_date));

  $query = "SELECT organizer FROM booking WHERE organizer='$org_name'";
	$result = mysql_query($query);

	$count = mysql_num_rows($result); // if username not found then register

	if($count == 0){
if(mysql_query("INSERT INTO booking(member_id,organizer, time_start, time_end, room_id, booking_date, number_of_participants)
VALUES('$uname','$org_name','$t_start','$t_end','".$_POST['roomid']."','$sortdate', '$n_o_p')"))
		{
      echo "<script>
  alert('Successfully Booked ur Bookings...!!!');
  window.location.href='staff_room_book.php';
  </script>";
		}
		else
		{
      echo "<script>
  alert('Error in Bookings...Please Try again later...!!!');
  window.location.href='staff_room_book.php';
  </script>";
    }
	}
	else{
    echo "<script>
alert('Sorry organizer name already taken....');
window.location.href='staff_room_book.php';
</script>";
	}

}
?>
<!DOCTYPE>
<head>
<title>MMU Room Booking System</title>
<link rel="stylesheet" href="style2.css" type="text/css" />
</head>
<body>
  <p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="staff_room_book.php">HOME</a></font></p>
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="index.php">LOG OUT</a></font></p>
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
<td><input type="text" name="username" value="<?php echo htmlspecialchars($uname); ?>" readonly="" /></td>
</tr>
<tr>
<td><input type="text" name="roomid" value="<?php echo htmlspecialchars($roomid); ?>" readonly="" /></td>
</tr>
<tr>
<td><input type="text" name="org" placeholder="Organizer Name" required /></td>
</tr>
<tr>
<td><input type="text" name="bdate" placeholder="dd-mm-yyyy Booking Date" required /></td>
</tr>
<tr>
<td><input type="text" name="tstart" placeholder="hh:mm Starting Time" required /></td>
</tr>
<tr>
<td><input type="text" name="tend" placeholder="hh:mm Ending Time" required /></td>
</tr>
<tr>
<td><input type="text" name="nop" placeholder="Number Of Participants" required />
</tr>
<tr>
<td><button type="submit" name="btn-signup" onclick="return myfunctions();">BOOK</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
