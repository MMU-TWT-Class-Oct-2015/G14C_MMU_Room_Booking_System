<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    die("Please login first");
}
?>
<html>
<head>
  <style>
  h1{text-align:center;
    margin-top:0;
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
  <?php
   include 'db_connect.php';
  $result = mysql_query("SELECT `member_id`, `member_name`, `membership_type`, `phone_num`, `member_email`
    FROM `member` order by `member_id`",$link) or die("Database Error");
  ?>
</head>
<body background="image/back.jpg">
  <p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="admin_page.php">HOME</a></font></p>
  <p align="right"><font size="6" face="Georgia" color="#000000">
  <a href="logout.php">Logout</a></font></p>
<h1 >Member Details</details></details></h1>
  <table border="1" width="90%" id="table1" height="50" align=center>
    <tr>
      <td height="5" align="center" width="20%"><a href="admin_register_member.php"><STRONG>
      <FONT color=#800000 size="5">Add</FONT></STRONG>
      </td>
      <td width="16%" height="51" align="center">
<a href="admin_delete_member.php">
<font size="5"><STRONG><B>
  <FONT
 color=#800000 size="5">Delete</FONT></B></STRONG></font></td>
    </tr>
</table>
<br>
<br>
<br>
<br>
<br>

<table border="1" width="90%" id="table1" height="50" align=center>
  <tr>
    <td height="51" align="center" width="20%"><STRONG>
    <FONT
color=#800000 size="5">Edit</FONT></STRONG>
    </td>
    <td height="51" align="center" width="20%"><STRONG>
    <FONT
color=#800000 size="5">Member ID</FONT></STRONG>
    </td>
    <td height="51" align="center" width="20%"><STRONG><B>
<FONT
color=#800000 size="5">Member Name</FONT></B></STRONG></td>

    <td width="16%" height="51" align="center">
<font size="5"><STRONG><B>
<FONT
color=#800000 size="5">Membership Type</FONT></B></STRONG></font></td>
<td height="51" align="center" width="20%"><STRONG>
<FONT
color=#800000 size="5">Phone Number</FONT></STRONG>
</td>
<td height="51" align="center" width="20%"><STRONG><B>
<FONT
color=#800000 size="5">Member Email</FONT></B></STRONG></td>
<tr>
  <?php
  while($row = mysql_fetch_array($result, MYSQL_BOTH))
  {
  ?>
  <td height="51" align="center" width="20%"><STRONG><B>
<FONT color=#800000 size="5"><?php echo "<a href='update_book.php?edit=$row[0]'>Edit</a>"; ?></FONT></B></STRONG></td>
  <td>
    <font size="5"><STRONG><B>
    <FONT
    color=#800000 size="5"><?php
    echo $row[0];
    ?></FONT></B></STRONG></font>
  </td>
  <td>
    <font size="5"><STRONG><B>
    <FONT
    color=#800000 size="5"><?php
    echo $row[1];
    ?></FONT></B></STRONG></font>
  </td>
  <td>
    <font size="5"><STRONG><B>
    <FONT
    color=#800000 size="5"><?php
    echo $row[2];
    ?></FONT></B></STRONG></font>
  </td>
  <td>
    <font size="5"><STRONG><B>
    <FONT
    color=#800000 size="5"><?php
    echo $row[3];
    ?></FONT></B></STRONG></font>
  </td>
  <td>
    <font size="5"><STRONG><B>
    <FONT
    color=#800000 size="5"><?php
    echo $row[4];
    ?></FONT></B></STRONG></font>
  </td>
</tr>
<?php
}
?>
</table>
</table action="">
</body>
</html>
