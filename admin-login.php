<?php
session_start();
include_once 'db_connect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$uname = mysql_real_escape_string($_POST['username']);
	$upass = mysql_real_escape_string($_POST['pass']);

	$res=mysql_query("SELECT admin_id, admin_password FROM admin_login WHERE admin_username='$uname'");
	$row=mysql_fetch_array($res);

	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row

	if($count == 1 && $row['admin_password']==$upass)
	{
		$_SESSION['user'] = $row['admin_id'];
		header("Location: home.php");
	}
	else
	{
		?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
	}

}
?>
<html>
<head>
<title>MMU Room Booking System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<p align="right"><font size="6" face="Georgia" color="#000000">
<a href="index.php">HOME</a></font></p>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<p align="center"><font size="7" face="Georgia" color="#000000">
Admin Login</font></p>
<tr>
<td><input type="text" name="username" placeholder="Your username" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
