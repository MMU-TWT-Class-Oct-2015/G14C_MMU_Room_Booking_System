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
<form action="member-authenticate.php?op=in" method="post">
<table align="center" width="30%" border="0">
<p align="center"><font size="7" face="Georgia" color="#000000">
Member Login</font></p>
<tr>
<td><input type="text" name="member_id" placeholder="Your username" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><p><font size="4" face="Georgia" color="#000000"><b>Don't have an account..?</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
<a href="register.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
