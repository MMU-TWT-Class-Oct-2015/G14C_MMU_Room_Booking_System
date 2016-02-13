<html>
<head>
<title>MMU Room Booking System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body background="image/back.jpg">
	<center>
	<form name="get_roomid" action="student_page.php" method="post" >
		<table align="center" width="30%" border="0">
		<p align="center"><font size="7" face="Georgia" color="#000000">
		Member Register</font></p>
		<tr>
		<td><input type="text" name="userid" value="<?php echo htmlspecialchars($usernam); ?>" readonly="" /></td>
		</tr>
		<tr>
		<td>
			<div id='room_type_container'>
					<select name='room_type' onchange="window.loadrid()">
							<option disabled>Select Room Type</option>
							<?php while($row = mysql_fetch_assoc($r)): ?>
							<option value='<?php echo $row["room_nums"]?>'><?php echo $row['room_type']?></option>
							<?php endwhile; ?>
					</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>
			<div id='room_id_container'></div>
			<div style="clear: both"></div></td>
			</tr>
			<tr>
			<td>
			<button type="submit" name="submit" action="student_page.php">NEXT</button>
		</td>
		</tr>
		</table>
	</form>
	</center>
</body>
</html>
