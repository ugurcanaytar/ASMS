<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "car";

session_start();
$conn = mysql_connect($host,$user,$pass);
mysql_select_db($db,$conn);
     
if (!isset($_SESSION['employee_id'])) {
   header('Location: captain_login.php');
}

echo "
<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>ASMS | Captain</title>
	<meta charset=UTF-8'>
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
			<h1><a href='captain_main.php'><strong>ASMS | </strong>Captain</a></h1>
		</div>
		<div class='col_6 column right'>
			<form action='captain_logout.php' id='add_job_link'>
				<button class='large red'><i class='icon-eject'></i> Logout</button>
			</form>
		</div>
	</header>


	<div class='col_12 column'>
		<!-- Menu Horizontal -->
		<ul class='menu'>
		<li><a href='captain_main.php'><i class='icon-calendar'></i> Appointment</a></li>
		<li><a href='captain_reqpart.php'><i class='icon-plus'></i> Request Spare Parts</a></li>
		<li class='current'><a href='captain_clerks.php'><i class='icon-flag'></i> Clerks</a></li>
		</ul>
	</div>
		<div id='category_block' class='col_12 column'>
		<h4><td><i class='icon-flag'></i></td> Available Clerks</h4>
			<ul></ul>
		</div>
		
		<div class='col_12 column'>
			<ul id='listings'>
			<table class='sortable' cellspacing='0' cellpadding='0'>
			<thead><tr>
				<th>Clerk ID</th>
				<th>Clerk Name</th>
				<th>Department ID</th>
				<th>Operation ID</th>
			</tr></thead>
			<tbody>";


			$query = "SELECT * FROM clerk NATURAL JOIN employee WHERE ops_id = '10000' ";
				$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$clerk_id = $row['employee_id'];
					$clerk_name = $row['employee_name'];
					$department_id = $row['department_id'];
					$operation_id = $row['ops_id'];
					echo"<td>".$clerk_id."</td>";
					echo"<td>".$clerk_name."</td>";
					echo"<td>".$department_id."</td>";
					echo"<td>".$operation_id."</td>";
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
					<label for='employee_id'>Clerk ID: </label>
					<input name='employee_id' type='text' required= 'required'/>
				</p>
				<p>
					<label for='department_id'>Department ID: </label>
					<input name='department_id' type='text' required= 'required'/>
				</p>
				<p>
					<label for='ops_id'>Operation ID: </label>
					<input name='ops_id' type='text' required= 'required'/>
				</p>
				<p>
					<button class='green' name='submit' type='submit'><i class='icon-check'></i> Update</button>
				</p>
				</center>
				</form>
				";
		if(isset($_GET['employee_id']) && isset($_GET['ops_id']) && isset($_GET['department_id'])){
			$clerk_id = $_GET['employee_id'];
			$ops_id = $_GET["ops_id"];
			$department = $_GET["department_id"];
			$sql = "UPDATE clerk SET ops_id = '$ops_id' AND department_id = '$department' WHERE employee_id = '$clerk_id' ";

			$result = mysql_query($sql, $conn) or die(mysql_error());
			header('Location: captain_clerks.php');

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