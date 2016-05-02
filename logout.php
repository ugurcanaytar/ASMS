<?php 
	session_start();
	unset($_SESSION['customer_id']);
	unset($_SESSION['password']);
	unset($_SESSION['name']);
	unset($_SESSION['address']);
	unset($_SESSION['phone_number']);
	unset($_SESSION['c_email']);
	session_destroy();
	header('Location: customer_login.php');
?>
