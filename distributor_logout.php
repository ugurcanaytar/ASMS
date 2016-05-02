<?php 
	session_start();
	unset($_SESSION['distributor_id']);
	unset($_SESSION['password']);
	session_destroy();
	header('Location: distributor_login.php');
?>