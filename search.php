<html>
<head>
	<title>Welcome to MMU Room Booking System</title>
</head>
<style>
p {
	margin-top:150;
}
</style>
<body background="http://cdn.wonderfulengineering.com/wp-content/uploads/2014/07/background-wallpapers-13.jpg">
<center>
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="index.php">HOME</a></font></p>
	<p align="center"><font size="7" face="Georgia" color="#000000">
	Search by Options</font></p>
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="rid" placeholder="Room ID" required /></td>
</tr>
<tr>
<td><input type="text" name="date" placeholder="Date" required /></td>
</tr>
<tr>
	<td><input type="text" name="mid" placeholder="Member ID" required /></td>
</tr>
<tr>
<td>
	<select name="mtype">
  <option value="staff">Staff</option>
  <option value="student">Student</option>
</select>
</td>
</tr>
<tr>
<td><button type="submit" name="" onclick="">Search</button></td>
</tr>
</table>
</center>
</body>
</html>
