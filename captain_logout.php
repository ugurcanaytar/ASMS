<?php 
	session_start();
	unset($_SESSION['employee_id']);
	unset($_SESSION['password']);
	unset($_SESSION['department_id']);
	session_destroy();
	header('Location: captain_login.php');
?>