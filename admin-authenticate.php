<?php
session_start();
include_once "db_connect.php";
$username = $_POST['username'];
$password = $_POST['pass'];
$op = $_GET['op'];

if($op=="in"){
    $sql = mysql_query("SELECT * FROM admin_login WHERE admin_username='$username' AND admin_password='$password'");
    if(mysql_num_rows($sql)==1){
        $qry = mysql_fetch_array($sql);
        $_SESSION['admin_id'] = $qry['admin_id'];
		$_SESSION['admin_username'] = $qry['admin_username'];
    if($qry['admin_username']=="admin"){
        header("location:page-admin.php");
    }
    }else{
		?>
		<script language="JavaScript">
			alert('Username or Password not matched. Please try again..!');
			document.location='admin-login.php';
		</script>
		<?php
    }
}else if($op=="out"){
    unset($_SESSION['admin_username']);
    header("location:admin-login.php");
}
?>
