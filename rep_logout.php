<?php 
	session_start();
	unset($_SESSION['employee_id']);
	unset($_SESSION['password']);
	unset($_SESSION['expert_level']);
	unset($_SESSION['phone']);
	unset($_SESSION['rep_email']);
	unset($_SESSION['employee_name']);
	session_destroy();
	header('Location: representative_login.php');
?>