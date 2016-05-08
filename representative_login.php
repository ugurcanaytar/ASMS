
<!DOCTYPE html>
<html>
<head>

	<title>Representative Login Page</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<meta name='description' content='' />
	<link rel='stylesheet' type='text/css' href='css/kickstart.css' media='all' />
	<link rel='stylesheet' type='text/css' href='style.css' media='all' /> 
	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
	<script type='text/javascript' src='js/kickstart.js'></script>
</head>
<body>
<form method = "post" action = "representative_login.php">
<div id='container' class='grid'>
	<header>
		<div class='col_6 column'>
			<h1 align='right'><a href='index.php'><strong>AutoService</strong>ManagementSystem</a></h1>
		</div>
		
	</header>


	<div class='col_12 column'>
			<form id='login_form'>
			<fieldset>
			<legend>Welcome Representative! Please Login.</legend>
				<p>
					<label for='employee_id'>Representative ID:</label>
					<input id='employee_id' name='employee_id' type='text' required= 'required'/>
				</p>
				<p>
					<label for='password'>Password</label>
					<input id='password' name='password' type='password' required= 'required'/>
				</p>			
				<p>
					<input type='submit' value='Submit' />
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

if(isset($_POST['employee_id'])) {
	$employee_id = $_POST['employee_id'];
	$password = $_POST['password'];

	$_SESSION['employee_id'] = $employee_id;
	$_SESSION['password'] = $password;

	$sql = "SELECT * FROM representative WHERE employee_id = '".$employee_id."' AND password = '".$password."' LIMIT 1 ";
	$res = mysql_query($sql, $conn);
	$representative = mysql_fetch_array($res);

	$sql2 = "SELECT * FROM employee WHERE employee_id = '".$employee_id."' LIMIT 1 ";
	$res2 = mysql_query($sql2, $conn);
	$representative2 = mysql_fetch_array($res2);



	$_SESSION['expert_level'] = $representative['expert_level'];
	$_SESSION['phone'] = $representative['phone'];
	$_SESSION['rep_email'] = $representative['rep_email'];
	$_SESSION['employee_name'] = $representative2['employee_name'];

	if(mysql_num_rows($res) == 1) {
		echo "<div class='notice success'><i class='icon-wrench'></i> Welcome to the system! | <strong> You will direct to the system in a 3 seconds... </strong>
				<a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=representative_main.php" );
	}
	else{
		echo "<div class='notice error'><i class='icon-wrench'></i> Your ID or Password is incorrect! Please re-type your information. | <font color = 'red'><strong> You will redirect in a 3 seconds... <strong></font> <a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=representative_login.php" );
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