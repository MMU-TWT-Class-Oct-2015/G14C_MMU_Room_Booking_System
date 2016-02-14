<?php
session_start();
include_once "db_connect.php";
$username = $_POST['member_id'];
$password = md5($_POST['pass']);
$op = $_GET['op'];

if($op=="in"){
    $sql = mysql_query("SELECT * FROM member WHERE member_id='$username' AND member_password='$password'");
    if(mysql_num_rows($sql)==1){
        $qry = mysql_fetch_array($sql);
        $_SESSION['member_id'] = $qry['member_id'];
		$_SESSION['member_name'] = $qry['member_name'];
        $_SESSION['membership_type'] = $qry['membership_type'];
        if($qry['membership_type']=="staff"){
          header('location:staff_room_book.php');
        }
		else if($qry['membership_type']=="student"){
            header('location:student_room_book.php');
}
}else{
?>
<script language="JavaScript">
alert('Username or Password not matched. Please try again..!');
document.location='member-login.php';
</script>
<?php
}
}else if($op=="out"){
unset($_SESSION['username']);
unset($_SESSION['hak_akses']);
header("location:member-login.php");
}
?>
