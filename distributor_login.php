<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "car";

session_start();
mysql_connect($host,$user,$pass);
mysql_select_db($db);

if(isset($_POST['distributor_id'])) {
	$distributor_id = $_POST['distributor_id'];
	$password = $_POST['password'];

	$_SESSION['distributor_id'] = $distributor_id;
	$_SESSION['password'] = $password;

	$sql = "SELECT * FROM distributor WHERE distributor_id = '".$distributor_id."' AND password = '".$password."' LIMIT 1 ";
	$res = mysql_query($sql);
	if(mysql_num_rows($res) == 1) {
		header('Location: distributor_main.php');
	}
	else{
		echo '
		<div>
			<center><p class="warning">The user with the given Distributor ID and password does NOT exist in the system!</p></center>
		</div>
		';
	}

}
?>
<!DOCTYPE html>
<html>
<head>

	<title>Distributor Login Page</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<meta name='description' content='' />
	<link rel='stylesheet' type='text/css' href='css/kickstart.css' media='all' />
	<link rel='stylesheet' type='text/css' href='style.css' media='all' /> 
	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
	<script type='text/javascript' src='js/kickstart.js'></script>
</head>
<body>
<form method = "post" action = "distributor_login.php">
<div id='container' class='grid'>
	<header>
		<div class='col_6 column'>
			<footer><h1 align='right'><a href='index.php'><strong>AutoService</strong>ManagementSystem</a></h1></footer>
		</div>
		
	</header>


	<div class='col_12 column'>
			<form id='login_form'>
			<fieldset>
			<legend>Welcome Distributor! Please Login.</legend>
				<p>
					<label for='distributor_id'>Distributor ID:</label>
					<input id='distributor_id' name='distributor_id' type='text' required= 'required'/>
				</p>
				<p>
					<label for='password'>Password:</label>
					<input id='password' name='password' type='password' required= 'required'/>
				</p>			
				<p>
					<input type='submit' value='Submit' />
				</p>
				</fieldset>
			</form>
		</div>


		<div class='clearfix'></div>
		<footer>
			<p>Copyright @ASMS_Group2; CS353 - Spring 2016, Auto Service Management System, All Rights Reserved.</p>
		</footer>
</div> <!-- End Grid -->
</body>
</html>
						
