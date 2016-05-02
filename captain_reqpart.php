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
		<li class = 'current'><a href='captain_reqpart.php'><i class='icon-plus'></i> Request Spare Parts</a></li>
		<li><a href='captain_clerks.php'><i class='icon-flag'></i> Clerks</a></li>
		</ul>
	</div>
		<div id='category_block' class='col_12 column'>
		<h4><td><i class='icon-wrench'></i></td> Request Spare Parts</h4>
			<ul></ul>
		</div>
		
		<div class='col_12 column'>
			<center>
			<ul id='listings'>
			<table class='sortable' cellspacing='0' cellpadding='0'>
			<thead><tr>
				<th>Part Type</th>
			</tr></thead>
			<tbody>";


			$query = "SELECT DISTINCT part_type FROM sparepart ";
			$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$part_type = $row['part_type'];
					echo"<td>".$part_type."</td>";
					echo "</tr>";
				}
			
echo"
			
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
					<label for='part_type'>Part Type: </label>
					<input name='part_type' type='text' required= 'required'/>
				</p>
				<p>
					<label for='distributor_id'>Distributor ID: </label>
					<input name='distributor_id' type='text' required= 'required'/>
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
			</div>

				";
		if(isset($_GET['part_type']) && isset($_GET['distributor_id']) && isset($_GET['ops_id'])){
			$part_type = $_GET['part_type'];
			$distributor_id = $_GET["distributor_id"];
			$ops_id = $_GET["ops_id"];

			$query2 = "SELECT * FROM sparepart WHERE part_type = '$part_type'";
			$result2 = mysql_query($query2, $conn) or die( mysql_error());
			$row2 = mysql_fetch_array($result2);
			$cost = $row2['cost'];
			
			$department_id = $_SESSION['department_id'];
			$capt_id = $_SESSION['employee_id'];
			$check = 0;

			$result = mysql_query($query, $conn) or die( mysql_error());
			while($row = mysql_fetch_array($result)){
				if ($part_type == $row['part_type']){
						$check = 1;
				}
			}

			if($check){
					$query = "INSERT INTO sparepart (part_id, part_type, distributor_id, cost, ops_id, employee_id, department_id) VALUES ('', '$part_type', '$distributor_id', '$cost', '$ops_id', '$capt_id', '$department_id')";
					$result = mysql_query($query, $conn) or die(mysql_error());
					if($result){
						echo "<div class='notice success'><i class='icon-wrench'></i> Spare Part Requested!
				<a href='#close' class='icon-remove'></a></div>";
			}
			} else{
				echo "<div class='notice error'><i class='icon-wrench'></i> Please Write Proper Spare Part!
				<a href='#close' class='icon-remove'></a></div>";
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