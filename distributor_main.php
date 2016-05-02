<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "car";


session_start();
$conn = mysql_connect($host,$user,$pass);
mysql_select_db($db,$conn);

if (!isset($_SESSION['distributor_id'])) {
   header('Location: distributor_login.php');
}
echo "

	<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>ASMS | Distributor</title>
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
			<h1><a href='distributor_main.php'><strong>ASMS | </strong>Distributor</a></h1>
		</div>
		<div class='col_6 column right'>
			<form action='distributor_logout.php' id='add_job_link'>
				<button class='large red'><i class='icon-eject'></i> Logout</button>
			</form>
		</div>
	</header>


	<div class='col_12 column'>
		<!-- Menu Horizontal -->
		<ul class='menu'>
		<li class='current'><a href='distributor_main.php'><i class='icon-edit'></i> Manage Spare Parts</a></li>
		</ul>
	</div>
		<div id='category_block' class='col_12 column'>
		<h4><td><i class='icon-wrench'></i></td> Requested Spare Parts</h4>
			<ul></ul>
		</div>
		
		<div class='col_12 column'>
			<ul id='listings'>
			<table class='sortable' cellspacing='0' cellpadding='0'>
			<thead><tr>
				<th>Spare Part Name</th>
				<th>Captain ID</th>
				<th>Captain Name</th>
				<th>Cost</th>
			</tr></thead>
			<tbody><tr>";


			$curr = $_SESSION['distributor_id'];
			$query = "SELECT * FROM sparepart NATURAL JOIN employee WHERE distributor_id = ".$curr."";
			$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$part_name = $row['part_type'];
					$captain_name = $row['employee_name'];
					$captain_id = $row['employee_id'];
					//$captain_email = $row['cap_email'];
					$cost = $row['cost'];
					echo"<td>".$part_name."</td>";
					echo"<td>".$captain_id."</td>";
					echo"<td>".$captain_name."</td>";

					echo"<td>".$cost."</td>";
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