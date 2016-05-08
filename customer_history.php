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
			<h1><a href='customer_main.php'><strong>ASMS | </strong>Customer</a></h1>
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
		<li><a href='customer_main.php'><i class='icon-calendar'></i> Appointment</a></li>
		<li><a href='customer_profile.php'><i class='icon-user'></i> Profile</a></li>
		<li class='current'><a href='customer_history.php'><i class='icon-desktop'></i> History</a></li>
		</ul>
	</div>
		<div id='category_block' class='col_12 column'>
		<h4><td><i class='icon-wrench'></i></td> Past Appointments</h4>
			<ul></ul>
		</div>
		
		<div class='col_12 column'>
			<ul id='listings'>
			<table class='sortable' cellspacing='0' cellpadding='0'>
			<thead><tr>
				<th>Total Cost</th>
				<th>Service ID</th>
			</tr></thead>
			<tbody>
";
				$curr = $_SESSION['customer_id'];
				$query = "SELECT service_id, SUM(cost) as sum FROM sparepart NATURAL JOIN service WHERE customer_id= ".$curr."  AND done = 1 GROUP BY start_date, service_id  ";
				$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$sum = $row['sum'];
					// $quantity = $row['quantity'];
					// $total = $sum * $quantity;
					$service_id = $row['service_id'];
					echo"<td>".$sum."</td>";
					echo"<td>".$service_id."</td>";
					echo "</tr>";
				}
echo"
			</tbody>
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