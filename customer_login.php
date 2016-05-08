
<!DOCTYPE html>
<html>
<head>

	<title>Customer Login Page</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<meta name='description' content='' />
	<link rel='stylesheet' type='text/css' href='css/kickstart.css' media='all' />
	<link rel='stylesheet' type='text/css' href='style.css' media='all' /> 
	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
	<script type='text/javascript' src='js/kickstart.js'></script>
</head>
<body>
<form method = "post" action = "customer_login.php">
<div id='container' class='grid'>
	<header>
		<div class='col_6 column'>
			<h1 align='right'><a href='index.php'><strong>AutoService</strong>ManagementSystem</a></h1>
		</div>
		
	</header>


	<div class='col_12 column'>
			<form id='login_form'>
			<fieldset>
			<legend>Welcome Customer! Please Login.</legend>
				<p>
					<label for="customer_id">Customer ID:</label>
					<input id="customer_id" name="customer_id" type="text" required= "required"/>
				</p>
				<p>
					<label for="password">Password</label>
					<input id="password" name="password" type="password" required= "required"/>
				</p>			
				<p>
					<input type="submit" value="Submit" />
				</p>
				</fieldset>
			</form>
	




<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "car";


session_start();

$conn = mysql_connect($host,$user,$pass);
mysql_select_db($db,$conn);



if(isset($_POST['customer_id'])) {
	$customer_id = $_POST['customer_id'];
	$password = $_POST['password'];

	$_SESSION['customer_id'] = $customer_id;
	$_SESSION['password'] = $password;

	
				

	$sql = "SELECT * FROM customer WHERE customer_id = '".$customer_id."' AND password = '".$password."' LIMIT 1 ";
	$res = mysql_query($sql,$conn);
	$customer = mysql_fetch_array($res);
	$_SESSION['name'] = $customer['name'];
	$_SESSION['address'] = $customer['address'];
	$_SESSION['phone_number'] = $customer['phone_number'];
	$_SESSION['c_email'] = $customer['c_email'];
	
	if(mysql_num_rows($res) == 1) {
		echo "<div class='notice success'><i class='icon-wrench'></i> Welcome to the system! | <strong> You will direct to the system in a 3 seconds... </strong>
				<a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=customer_main.php" );
	}
	else{
		echo "<div class='notice error'><i class='icon-wrench'></i> Your ID or Password is incorrect! Please re-type your information. | <font color = 'red'><strong> You will redirect in a 3 seconds... <strong></font> <a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=customer_login.php" );
	}

}
?>
</div>
</div>

		<div class='clearfix'></div>
		<footer>
			<p>Copyright @ASMS_Group2; CS353 - Spring 2016, Auto Service Management System, All Rights Reserved.</p>
		</footer>
</div> <!-- End Grid -->
</body>
</html>
												
