<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "car";


session_start();
$conn = mysql_connect($host,$user,$pass);
mysql_select_db($db,$conn);

if (!isset($_SESSION['employee_id'])) {
   header('Location: representative_login.php');
}

echo "
	

	<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>ASMS | Representative</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<meta name='description' content='' />
	
	<!-- CSS -->
	<link rel='stylesheet' type='text/css' href='css/kickstart.css' media='all' />
	<link rel='stylesheet' type='text/css' href='style.css' media='all' /> 
	
	<!-- Javascript -->
	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
	<script type='text/javascript' src='js/kickstart.js'></script>
</head>
<body>
<div id='container' class='grid'>
	<header>
		<div class='col_6 column'>
			<h1><a href='representative_main.php'><strong>ASMS | </strong>Repres.</a></h1>
		</div>
		<div class='col_6 column right'>
			<form action='rep_logout.php' id='add_job_link'>
				<button class='large red'><i class='icon-eject'></i> Logout</button>
			</form>
		</div>
	</header>


	<div class='col_12 column'>
		<!-- Menu Horizontal -->
		<ul class='menu'>
		<li><a href='representative_main.php'><i class='icon-edit'></i> Manage Appointments</a></li>
		<li><a href='representative_manage.php'><i class='icon-plus'></i> Add New Car</a></li>
		<li class ='current'><a href='representative_operation.php'><i class='icon-plus'></i> Add New Operation</a></li>
		<li><a href='representative_profile.php'><i class='icon-user'></i> Representative Profile</a></li>
		</ul>
	</div>
		
		<div class='col_12 column'>
			<form id='reg_form'>
			<fieldset>
			<legend><i class='icon-plus'></i> Add New Operation</legend>
			<form action= ".$_SERVER['PHP_SELF']." method='get'>

				<p>
					<label for='car_id'>Car ID: </label>
					<input name='car_id' type='text' required= 'required'/>
				</p>
				<p>
					<label for='department_id'>Department ID: </label>
					<input name='department_id' type='text' required= 'required'/>
				</p>
				<p>
					<label for='customer_id'>Customer ID: </label>
					<input name='customer_id' type='text' required= 'required'/>
				</p>
				<p>
					<label for='ops_id'>Operation ID: </label>
					<input name='ops_id' type='text' required= 'required'/>
				</p>
				<p>
					<label for='start_date'>Start Date: </label>
					<input name='start_date' type='date' required= 'required'/>
				</p>
				<p>
					<label for='end_date'>End Date: </label>
					<input name='end_date' type='date' required= 'required'/>
				</p>
				<p>
					<label for='description'>Description: </label>
					<input name='description' type='text' required= 'required'/>
				</p>
				<p>
					<button class='green' name='submit' type='submit'><i class='icon-check'></i> Apply</button>
				</p>
				</form>
			
	";
	
	if(isset($_GET['car_id']) && isset($_GET['department_id']) && isset($_GET['customer_id']) && isset($_GET['ops_id']) && isset($_GET['start_date']) && isset($_GET['end_date']) && isset($_GET['description'])){
		$car_id = $_GET['car_id'];
		$department_id = $_GET['department_id'];
		$customer_id = $_GET['customer_id'];
		$ops_id = $_GET['ops_id'];
		$start_date = $_GET['start_date'];
		$end_date = $_GET['end_date'];
		$description = $_GET['description'];

		$queryOne = "INSERT INTO Operations(ops_id, department_id, description, start_date, end_date) VALUES ('$ops_id','$department_id','$description',
					'$start_date','$end_date')";
		$queryTwo = "INSERT INTO Service (service_id, car_id, ops_id, department_id, customer_id) VALUES ('','$car_id','$ops_id','$department_id',
					'$customer_id')"; 
		$resultOne = mysql_query($queryOne, $conn) or die(mysql_error());
		$resultTwo  = mysql_query($queryTwo, $conn) or die(mysql_error());
		if($resultOne && $resultTwo){
			echo "<div class='notice warning'><i class='icon-wrench'></i> New Operation Added!
			<a href='#close' class='icon-remove'></a></div>";
		}
	}
echo "	
		</fieldset>
		</form>
	</div>
	</div>
		<div class='clearfix'></div>
		<footer>
			<p>Copyright @ASMS_Group2; CS353 - Spring 2016, Auto Service Management System, All Rights Reserved.</p>
		</footer>
</div> <!-- End Grid -->
</body>
</html>

";

?>