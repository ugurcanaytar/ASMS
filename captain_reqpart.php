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
ob_start(); 
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
				<th>Quantity</th>
				<th>Service ID</th>
			</tr>
			<tbody>";

			$dept = $_SESSION['department_id'];
			$query = "SELECT * FROM operations NATURAL JOIN service WHERE available = 0 AND demand = 0 AND department_id = ".$dept."";
			$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$part_type = $row['part_type'];
					$quantity = $row['quantity'];
					$service = $row['service_id'];
					echo"<td>".$part_type."</td>";
					echo"<td>".$quantity."</td>";
					echo"<td>".$service."</td>";
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
			<form class='horizontal' method='get' action=".$_SERVER['PHP_SELF'].">
			<br><center>

				
				
			";

				echo "

				<p>
					<input name='part_type' type='text' placeholder='Enter Part Type...' required= 'required'/>
				</p>
				<br>

				<select id = 'state_select' name='distributor_select' required= 'required'/>
					<option>Select Distributor ID</option>
				";

				$query = "SELECT DISTINCT distributor_id FROM distributor ORDER BY distributor_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$dist = $row['distributor_id'];
					echo"<option value=".$dist.">".$dist."</option>";
				}

				echo "
				</select>  <br><br>



				<select id = 'state_select' name='operation_select' required= 'required'/>
					<option>Select Operation ID</option>

				";

				$query = "SELECT DISTINCT ops_id FROM operations ORDER BY ops_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$opS = $row['ops_id'];
					echo"<option value=".$opS.">".$opS."</option>";
				}
				$oper = $_GET['operation_select'];	

				echo "
				</select> <br><br>

				<select id = 'state_select' name='service_select' required= 'required'/>
					<option>Select Service ID</option>

				";


				$query = "SELECT * FROM operations NATURAL JOIN service WHERE available = 0 AND demand = 0 AND department_id = ".$dept." ORDER BY service_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$sRv = $row['service_id'];
					echo"<option value=".$sRv.">".$sRv."</option>";
				}

				echo "

				</select> <br><br>

				
				<button class = 'green' type='submit'><i class = 'icon-check'></i> Request!</button>
				</form></center>
			</form>
			";


	
		// error_reporting(E_ERROR | E_PARSE);
		if(isset($_GET['part_type']) && isset($_GET['operation_select']) && isset($_GET['distributor_select']) && isset($_GET['service_select'])){
			$query = "SELECT * FROM operations NATURAL JOIN service WHERE available = 0 AND demand = 0 ";
			$part_type = $_GET['part_type'];
			$distributor_id = $_GET["distributor_select"];
			$ops_id = $_GET["operation_select"];
			$service_id = $_GET['service_select'];

			$query2 = "SELECT * FROM sparepart WHERE part_type = '$part_type'";
			$result2 = mysql_query($query2, $conn) or die( mysql_error());
			$row2 = mysql_fetch_array($result2);
			$cost = $row2['cost'];
			
			$query3 = "SELECT DISTINCT department_id FROM sparepart WHERE part_type = '$part_type'";
			$result3 = mysql_query($query3, $conn) or die( mysql_error());
			$row3 = mysql_fetch_array($result3);
			$department = $row3['department_id'];

			$capt_id = $_SESSION['employee_id'];
			$check = 0;

			$result = mysql_query($query, $conn) or die( mysql_error());
			while($row = mysql_fetch_array($result)){
				if ($part_type == $row['part_type']){
						$check = 1;
				}
			}

			if($check){
				$queryQuantity = "SELECT DISTINCT quantity FROM operations WHERE department_id = ".$dept." AND ops_id = ".$ops_id."";
				$resultQ = mysql_query($queryQuantity, $conn) or die(mysql_error());
				$row = mysql_fetch_array($resultQ);
				$count = $row['quantity'];
				//echo var_dump(mysql_num_rows($resultQ));
				$nrCount = 0;
				while($nrCount < $count){
					$query3 = "INSERT INTO sparepart (part_id, part_type, distributor_id, cost, ops_id, employee_id, department_id, service_id) VALUES ('', '$part_type', '$distributor_id', '$cost', '$ops_id', '$capt_id', '$department', $service_id)";
					$result = mysql_query($query3, $conn) or die(mysql_error());

					$sql1 = "UPDATE service SET demand = 1 WHERE ops_id = '$ops_id' AND service_id = $service_id";
					$result1 = mysql_query($sql1, $conn) or die(mysql_error());
					
					$nrCount = $nrCount +1;
					if($result && $nrCount == $count){
						echo "<div class='notice success'><i class='icon-wrench'></i> Spare Part Requested! | <strong> You will redirect in a 3 seconds... </strong><a href='#close' class='icon-remove'></a></div>";
						header( "refresh:3;url=captain_reqpart.php" );
					}

				}
					
			} else{
						echo "<div class='notice error'><i class='icon-wrench'></i> Please Write Proper Spare Part! | <strong> You will redirect in a 3 seconds... </strong>
						<a href='#close' class='icon-remove'></a></div>";
						header( "refresh:3;url=captain_reqpart.php" );
			}
			


		}

echo "
		</div>
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