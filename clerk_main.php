<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "car";


session_start();
$conn = mysql_connect($host,$user,$pass);
mysql_select_db($db,$conn);

if (!isset($_SESSION['employee_id'])) {
   header('Location: clerk_login.php');
}


echo "
<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>ASMS | Clerk</title>
	<meta charset='UTF-8'
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
			<h1><a href='clerk_main.php'><strong>ASMS | </strong>Clerk</a></h1>
		</div>
		<div class='col_6 column right'>
			<form action='clerk_logout.php' id='add_job_link'>
				<button class='large red'><i class='icon-eject'></i> Logout</button>
			</form>
		</div>
	</header>


	<div class='col_12 column'>
		<!-- Menu Horizontal -->
		<ul class='menu'>
		<li class='current'><a href='clerk_main.php'><i class='icon-user'></i> Profile</a></li>
		</ul>
	</div>
		<div id='category_block' class='col_12 column'>
		<h4><td><i class='icon-wrench'></i></td> Assigned Jobs</h4>
			<ul></ul>
		</div>
		
		<div class='col_12 column'>
			<ul id='listings'>
			<table class='sortable' cellspacing='0' cellpadding='0'>
			<thead><tr>
				<th>Car Model</th>
				<th>Car ID</th>
				<th>Operation</th>
				<th>Engine Volume</th>
				<th>Release Date</th>
				<th>Appointment Date</th>
			</tr></thead>
			<tbody>";

			$query = "SELECT * FROM car NATURAL JOIN  service NATURAL JOIN operations";
			$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$car_model = $row['model'];
					$car_id = $row['car_id'];
					$operation = $row['description'];
					$engine = $row['engine_volume'];
					$start_date = $row['start_date'];
					$rls_date = $row['release_date'];
					echo"<td>".$car_model."</td>";
					echo"<td>".$car_id."</td>";
					echo"<td>".$operation."</td>";
					echo"<td>".$engine."</td>";
					echo"<td>".$rls_date."</td>";
					echo"<td>".$start_date."</td>";

					echo"</tr>";
				}
echo "
			</tr></tbody>
			</table>
			</div>
			</ul>
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