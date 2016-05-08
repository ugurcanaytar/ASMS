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
			<form class='horizontal' method='get' action='representative_main.php'>
			<br><center>
				<select id = 'state_select' name='car_select'>
					<option>Select Car ID</option>
			";

				$query = "SELECT DISTINCT car_id FROM car ORDER BY car_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$car = $row['car_id'];
					echo"<option value=".$car.">".$car."</option>";
				}


				echo "
				</select>  <br><br>

				<select id = 'state_select' name='department_select'>
					<option>Select Department ID</option>
				";


				$query = "SELECT DISTINCT department_id FROM operations ORDER BY department_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$dept = $row['department_id'];
					echo"<option value=".$dept.">".$dept."</option>";
				}


				echo "
				</select>  <br><br>



				<select id = 'state_select' name='customer_select'>
					<option>Select Customer ID</option>

				";

				$query = "SELECT DISTINCT owner_id FROM car ORDER BY owner_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$owner = $row['owner_id'];
					echo"<option value=".$owner.">".$owner."</option>";
				}

				echo "
				</select>  <br><br>



				<select id = 'state_select' name='operation_select'>
					<option>Select Operation ID</option>

				";

				$query = "SELECT DISTINCT ops_id FROM operations ORDER BY ops_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$ops = $row['ops_id'];
					echo"<option value=".$ops.">".$ops."</option>";
				}

			

				echo "
				</select> <br><br>

				<p>
					<label for='start_date'>Start Date:</label>
					<input name='start_date' type='date' required= 'required'/>
					<br><br>
				</p>


				<button class = 'green' type='submit'><i class = 'icon-plus'></i> Add</button>
			</form></center>
			</form>
			";
	
	error_reporting(E_ERROR | E_PARSE);
	$curr = $_SESSION['employee_id'];
	if(isset($_GET['car_select']) && isset($_GET['department_select']) && isset($_GET['customer_select']) && isset($_GET['operation_select']) && 
		isset($_GET['start_date'])){


		$car_id = $_GET['car_select'];
		$department_id = $_GET['department_select'];
		$customer_id = $_GET['customer_select'];
		$ops_id = $_GET['operation_select'];
		$start_date = $_GET['start_date'];


		$errorQuery = "SELECT * FROM car WHERE owner_id = ".$customer_id." AND car_id = ".$car_id." ";
		$errorQueryN = "SELECT * FROM operations WHERE ops_id = ".$ops_id." AND department_id = ".$department_id." ";


			$errResult = mysql_query($errorQuery, $conn);
			$errResultN = mysql_query($errorQueryN, $conn);
			//var_dump(mysql_num_rows($errResultN));
			//var_dump(mysql_num_rows($errResult));
			if(mysql_num_rows($errResult) && mysql_num_rows($errResultN)){
				$queryTwo = "INSERT INTO Service (service_id, car_id, ops_id, department_id, customer_id, start_date) VALUES ('','$car_id','$ops_id','$department_id','$customer_id', '$start_date')"; 

				$result  = mysql_query($queryTwo, $conn);
				echo "<div class='notice success'><i class='icon-wrench'></i> Operation Added | <strong> You will redirect in a 3 seconds... </strong>
				<a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=representative_operation.php" );
			} else {
				echo "<div class='notice error'><i class='icon-wrench'></i> Mismatch! Please Select Proper Value. | <font color = 'red'><strong> You will redirect in a 3 seconds... <strong></font> <a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=representative_operation.php" );
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