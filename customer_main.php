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
			$query = "SELECT * FROM operations NATURAL JOIN service WHERE customer_id = ".$curr." ";
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
			<form action= ".$_SERVER['PHP_SELF']." method='get'>
				<center>
				<p>
					<label for='department_id'>Department ID: </label>
					<input name='department_id' type='text' required= 'required'/>
				</p>
				<p>
					<label for='ops_id'>Operation ID: </label>
					<input name='ops_id' type='text' required= 'required'/>
				</p>
				<p>
					<button class='green' name='submit' type='submit'><i class='icon-check'></i> Delete</button>
				</p>
				</center>
			</form>
			</div>
				";
		if(isset($_GET['ops_id']) && isset($_GET['department_id'])){
			$ops_id = $_GET["ops_id"];
			$department = $_GET["department_id"];
			$sql = "DELETE FROM operations WHERE ops_id = '".$ops_id."' AND department_id = '".$department."'  ";
			$result = mysql_query($sql, $conn); //or die(mysql_error());
			header('Location: customer_main.php');
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