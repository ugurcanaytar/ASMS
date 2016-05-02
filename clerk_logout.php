<?php 
	session_start();
	unset($_SESSION['employee_id']);
	unset($_SESSION['password']);
	session_destroy();
	header('Location: clerk_login.php');
?>