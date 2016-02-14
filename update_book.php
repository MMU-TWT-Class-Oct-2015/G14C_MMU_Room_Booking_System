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

		if(mysql_query("UPDATE `member` SET `member_name`='$name',`member_password`='$upass',
      `membership_type`='$utype',`phone_num`='$uphone',`member_email`='$umail' WHERE member_id = '$uid'"))
		{
      echo "<script>
  alert('Successfully updated...!!!');
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
$res=mysql_query("SELECT * FROM member WHERE member_id='$id'");
$row=mysql_fetch_array($res);
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
  function memtype(){
	  if(frm.mtype.value=="staff"){
	    return true;
	  }
    if(frm.mtype.value=="student"){
	    return true;
	  }
    alert("Invalid Membership Type");
    frm.mtype.focus();
	  return false;
  }
function myfunctions() {
var retvalue;
retvalue = val();
if(retvalue == false) { return retvalue; }
retvalue = pval();
if(retvalue == false) { return retvalue; }
retvalue = meml();
if(retvalue == false) { return retvalue; }
return memtype();
}
</script>
<center>
<div id="login-form">
<form method="post" name="frm">
<table align="center" width="30%" border="0">
<p align="center"><font size="7" face="Georgia" color="#000000">
Member Register</font></p>
<tr>
<td><input type="text" name="uid" placeholder="User ID" value="<?php echo $row['member_id']; ?>" required readonly=""/></td>
</tr>
<tr>
<td><input type="text" name="uname" placeholder="User Name" value="<?php echo $row['member_name']; ?>" required />
<input type="hidden" name="pass" value="<?php echo $row[member_password]; ?>" /></td>
</tr>
<tr>
<td>
<input type="text" name="mtype" placeholder="membership type" value="<?php echo $row['membership_type']; ?>" required />
</td>
</tr>
<tr>
<td><input type="text" name="phone" placeholder="user contact number" value="<?php echo $row['phone_num']; ?>" required /></td>
</tr>
<tr>
<td><input type="text" name="email" placeholder="user mail" value="<?php echo $row['member_email']; ?>" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup" onclick="return myfunctions();">update</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
