<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    die("Please login first");
}
include_once "db_connect.php";
if(isset($_POST['btn-signup']))
{
	$r_id = mysql_real_escape_string($_POST['rid']);
	$r_type = mysql_real_escape_string($_POST['rtype']);
  $c_o_r = mysql_real_escape_string($_POST['cor']);

  $r_id = trim($r_id);
	$r_type = trim($r_type);
  $c_o_r = trim($c_o_r);

  $query = "SELECT room_id FROM room WHERE room_id='$r_id'";
	$result = mysql_query($query);

	$count = mysql_num_rows($result); // if username not found then register

	if($count == 0){
if(mysql_query("INSERT INTO `room`(`room_id`, `room_type`, `capacity`)
VALUES ('$r_id','$r_type','$c_o_r')"))
		{
      echo "<script>
  alert('Successfully registered...!!!');
  window.location.href='admin_page.php';
  </script>";
		}
		else
		{
      echo "<script>
  alert('Error in Registering...Please Try again later...!!!');
  window.location.href='admin_page.php';
  </script>";
    }
	}
	else{
    echo "<script>
alert('Sorry room id already exist....');
window.location.href='admin_page.php';
</script>";
	}

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
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="index.php">Log Out</a></font></p>
  <script type="text/javascript">
  function val(){
		if(form.cor.value==""){
	    alert("Please fill up the Capacity..!");
	    form.cor.focus();
	    return false;
	  }
	  if(isNaN(form.cor.value)){
	    alert("Capacity must be integers");
	    form.cor.focus();
	    return false;
	  }
	  return true;
	}
</script>
<center>
<div id="login-form">
<form method="post" name="form">
<table align="center" width="30%" border="0">
<p align="center"><font size="7" face="Georgia" color="#000000">
Room Register</font></p>
<tr>
<td><input type="text" name="rid" placeholder="Room ID" required /></td>
</tr>
<tr>
<td><input type="text" name="rtype" placeholder="Room Type" required /></td>
</tr>
<tr>
<td><input type="text" name="cor" placeholder="Capacity of room" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup" onclick="return val();">Register</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
