<?php
session_start();
unset($_SESSION['member_id']);
unset($_SESSION['membership_type']);
session_destroy();
	header("Location:index.php");
?>
