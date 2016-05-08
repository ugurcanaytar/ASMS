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
		<li class='current'><a href='representative_main.php'><i class='icon-edit'></i> Manage Appointments</a></li>
		<li><a href='representative_manage.php'><i class='icon-plus'></i> Add New Car</a></li>
		<li><a href='representative_operation.php'><i class='icon-plus'></i> Add New Operation</a></li>
		<li><a href='representative_profile.php'><i class='icon-user'></i> Representative Profile</a></li>
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
				<th>Customer Name</th>
				<th>Customer ID</th>
				<th>Release Date</th>
				<th>Model</th>
				<th>Engine Volume</th>
			</tr></thead>
			<tbody>";
				$curr = $_SESSION['rep_email'];
				$query = "SELECT * FROM customer NATURAL JOIN  service NATURAL JOIN operations NATURAL JOIN car WHERE done = 0 AND rep_email = '$curr'";
				$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$customer_sa = $row['name'];
					$customer_id = $row['customer_id'];
					$start_date = $row['start_date'];
					$engine = $row['engine_volume'];
					$model = $row['model'];
					echo"<td>".$customer_sa."</td>";
					echo"<td>".$customer_id."</td>";
					echo"<td>".$start_date."</td>";
					echo"<td>".$model."</td>";
					echo"<td>".$engine."</td>";
					echo "</tr>";
				}
			echo "</tbody>
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