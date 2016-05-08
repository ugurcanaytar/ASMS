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
		<li class='current'><a href='captain_main.php'><i class='icon-calendar'></i> Appointment</a></li>
		<li><a href='captain_reqpart.php'><i class='icon-plus'></i> Request Spare Parts</a></li>
		<li><a href='captain_clerks.php'><i class='icon-flag'></i> Clerks</a></li>
		</ul>
	</div>
		<div id='category_block' class='col_12 column'>
		<h4><td><i class='icon-wrench'></i></td> Current Appointments</h4>
			<ul></ul>
		</div>
		
		<div class='col_12 column'>
			<ul id='listings'>
			<table class='sortable' cellspacing='0' cellpadding='0'>
			<thead><tr><center>
				<th>Customer ID</th>
				<th>Appointment Date</th>
			</tr></thead>
			<tbody>
";
			$curr = $_SESSION['employee_id'];
			$query = "SELECT * FROM service NATURAL JOIN operations NATURAL JOIN captain WHERE employee_id = ".$curr.""; // captain kendi departmanındakileri görmeli sadece
			$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$customer = $row['customer_id'];
					$start_date = $row['start_date'];
					echo"<td>".$customer."</td>";
					echo"<td>".$start_date."</td>";

					echo"</tr>";
				}
echo"

			</tbody></center>
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