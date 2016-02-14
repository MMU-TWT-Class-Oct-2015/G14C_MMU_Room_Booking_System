<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    die("Please login first");
}
include_once 'db_connect.php';

if(isset($_POST['btn-signup']))
{
	$uid = mysql_real_escape_string($_POST['uid']);
	$name = mysql_real_escape_string($_POST['uname']);
	$upass = mysql_real_escape_string($_POST['pass']);
	$utype = mysql_real_escape_string($_POST['mtype']);
	$uphone = mysql_real_escape_string($_POST['phone']);
	$umail = mysql_real_escape_string($_POST['email']);

	$uid = trim($uid);
	$name = trim($name);
	$upass = trim($upass);
	$utype = trim($utype);
	$uphone = trim($uphone);
	$umail = trim($umail);
  $upass = md5($upass);


	// username exist or not
	$query = "SELECT member_id FROM member WHERE member_id='$uid'";
	$result = mysql_query($query);

	$count = mysql_num_rows($result); // if username not found then register

	if($count == 0){

		if(mysql_query("INSERT INTO member(member_id, member_name, member_password, membership_type, phone_num, member_email)	VALUES('$uid','$name','$upass','$utype','$uphone','$umail')"))
		{
			?>
			<script>alert('successfully registered ');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}
	}
	else{
			?>
			<script>alert('Sorry username already taken ...');</script>
			<?php
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
	<a href="admin_page.php">HOME</a></font></p>
	<script type="text/javascript">
	function val(){
		if(frm.uid.value==""){
	    alert("Please fill up the User ID..!");
	    frm.uid.focus();
	    return false;
	  }
	  if(isNaN(frm.uid.value)){
	    alert("User ID must be integers");
	    frm.uid.focus();
	    return false;
	  }
	  if((frm.uid.value).length < 10){
	    alert("User ID not valid.Please enter a valid user ID");
	    frm.uid.focus();
	    return false;
	  }
		if((frm.uid.value).length > 10){
	    alert("User ID not valid.Please enter a valid user ID");
	    frm.uid.focus();
	    return false;
	  }
	  return true;
	}
	function pval(){
		if(frm.phone.value==""){
	    alert("Please fill up the Contact Number..!");
	    frm.phone.focus();
	    return false;
	  }
	  if(isNaN(frm.phone.value)){
	    alert("Contact Number must be integers");
	    frm.phone.focus();
	    return false;
	  }
	  if((frm.phone.value).length < 9){
	    alert("Contact Number is not valid.Please enter a valid Contact Number");
	    frm.phone.focus();
	    return false;
	  }
		if((frm.phone.value).length > 11){
	    alert("Contact Number is not valid.Please enter a valid Contact Number");
	    frm.phone.focus();
	    return false;
	  }
	  return true;
	}
	function meml(){
		if(frm.email.value==""){
			alert("please enter the email address");
			frm.email.focus();
			return false;
		}

	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

		if(reg.test(frm.email.value)== false){
			alert("invalid email address");
			frm.email.focus();
			return false;
		}
	return true;
	}
function myfunctions() {
var retvalue;
retvalue = val();
if(retvalue == false) { return retvalue; }
retvalue = pval();
if(retvalue == false) { return retvalue; }
return meml();
}
</script>
<center>
<div id="login-form">
<form method="post" name="frm">
<table align="center" width="30%" border="0">
<p align="center"><font size="7" face="Georgia" color="#000000">
Member Register</font></p>
<tr>
<td><input type="text" name="uid" placeholder="User ID" required /></td>
</tr>
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="User Password" required /></td>
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
<td><input type="text" name="phone" placeholder="user contact number" required /></td>
</tr>
<tr>
<td><input type="text" name="email" placeholder="user mail" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup" onclick="return myfunctions();">Register</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
