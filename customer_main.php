<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "car";

session_start();
$conn = mysql_connect($host,$user,$pass);
mysql_select_db($db,$conn);
     
if (!isset($_SESSION['customer_id'])) {
   header('Location: customer_login.php');
}

echo "

<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>ASMS | Customer</title>
	<meta charset=UTF-8'/>
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
			<h1><a href='customer_main.php'><strong>ASMS | </strong>Customer</a></h1> <!--Session Finish-->
		</div>
		<div class='col_6 column right'>
			<form action='logout.php' id='add_job_link'>
				<button class='large red'><i class='icon-eject'></i> Logout</button>

			</form>
		</div>
	</header>


	<div class='col_12 column'>
		<!-- Menu Horizontal -->
		<ul class='menu'>
		<li class='current'><a href='customer_main.php'><i class='icon-calendar'></i> Appointment</a></li>
		<li><a href='customer_profile.php'><i class='icon-user'></i> Profile</a></li>
		<li><a href='customer_history.php'><i class='icon-desktop'></i> History</a></li>
		</ul>

	</div>
		<div id='category_block' class='col_12 column'>
		<h4><td><i class='icon-wrench'></i></td> Current Appointments</h4>
			<ul></ul>
		</div>
		
		<div class='col_12 column'>
			<ul id='listings'>
			<table class='sortable' cellspacing='0' cellpadding='0'>
			<thead><tr>
				<th>Appointment Date</th>
				<th>Operation Description</th>
				<th>Department ID</th>
				<th>Operation ID</th>
			</tr></thead>
			<tbody>";
			$curr = $_SESSION['customer_id'];
			$query = "SELECT * FROM operations NATURAL JOIN service WHERE customer_id = ".$curr." AND done = 0 ";
				$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$start_date = $row['start_date'];
					$description = $row['description'];
					$department = $row['department_id'];
					$operation = $row['ops_id'];
					echo"<td>".$start_date."</td>";
					echo"<td>".$description."</td>";
					echo"<td>".$department."</td>";
					echo"<td>".$operation."</td>";
					echo "</tr>";
				}

	echo "
			</tbody>
			</table>
			</center>
			<div>
			</div>
			<div>
			</ul>

	";
	echo"
			<form class='horizontal' method='get' action=".$_SERVER['PHP_SELF'].">
			<center>

				<select id = 'state_select' name='operation_select'>
					<option>Select Operation ID</option>
			";

				$query = "SELECT * FROM operations NATURAL JOIN service WHERE customer_id = ".$curr." ";
				$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					$operation = $row['ops_id'];
					echo"<option value =".$operation.">".$operation."</option>";
				}

				echo "
				</select> <br><br>



				<select id = 'state_select' name='department_select'>
					<option>Select Department ID</option>

				";

				$query = "SELECT * FROM operations NATURAL JOIN service WHERE customer_id = ".$curr." ";
				$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					$dep = $row['department_id'];
					echo"<option value = ".$dep.">".$dep."</option>";
				}

				echo var_dump($_GET);
				echo "
				</select>  <br><br>



				<button class = 'green' type='submit'><i class = 'icon-wrench'></i> Delete</button>
			</center>
			</form>
			";

		error_reporting(E_ERROR | E_PARSE);
		if(isset($_GET['department_select']) && isset($_GET['operation_select'])){

			$ops_id = $_GET['operation_select'];
			$department = $_GET['department_select'];

			$errorQuery = "SELECT * FROM operations NATURAL JOIN service WHERE customer_id = ".$curr." AND ops_id = ".$ops_id." AND department_id = ".$department."";
			$errResult = mysql_query($errorQuery, $conn);
			if(mysql_num_rows($errResult)){
				$sql = "DELETE FROM service WHERE ops_id = '".$ops_id."' AND department_id = '".$department."'";
				$result = mysql_query($sql, $conn);
				echo "<div class='notice success'><i class='icon-wrench'></i> Appointment Deleted! | <strong> You will redirect in a 3 seconds... </strong>
				<a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=customer_main.php" );
			} else {
				echo "<div class='notice error'><i class='icon-wrench'></i> Appointment Mismatch! Please Select Proper Value. | <font color = 'red'><strong> You will redirect in a 3 seconds... <strong></font> <a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=customer_main.php" );
			}
			
		}
echo "
		</div>
		</div>
		<div>
		<div>
		<div class='clearfix'></div>
		<footer>
			<p>Copyright @ASMS_Group2; CS353 - Spring 2016, Auto Service Management System, All Rights Reserved.</p>
		</footer>
</div> <!-- End Grid -->

</body>
</html>

";




?>