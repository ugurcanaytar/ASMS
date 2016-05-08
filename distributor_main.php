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
				<th>Cost</th>
				<th>Service ID </th>
			</tr></thead>
			<tbody><tr>";


			$curr = $_SESSION['distributor_id'];
			$query = "SELECT * FROM sparepart NATURAL JOIN operations NATURAL JOIN service WHERE distributor_id = ".$curr." AND demand = 1 ";
			$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$part_name = $row['part_type'];
					$cost = $row['cost'];
					$service = $row['service_id'];
					echo"<td>".$part_name."</td>";

					echo"<td>".$cost."</td>";
					echo"<td>".$service."</td>";
					echo"</tr>";
				}

			echo "
			</tbody>
			</table>
			</center>
			<div>
			</div>
			<div>
			</ul>";

			echo"
			<form class='horizontal' method='get' action=".$_SERVER['PHP_SELF'].">
			<center>

				<select id = 'state_select' name='service_select'>
					<option>Select Service ID</option>
			";
				$queryT = "SELECT DISTINCT service_id FROM sparepart NATURAL JOIN operations NATURAL JOIN service WHERE distributor_id = ".$curr." AND demand = 1 ";
				$result2 = mysql_query($queryT, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result2)){
					$srv_sel = $row['service_id'];
					echo"<option value =".$srv_sel.">".$srv_sel."</option>";
				}

				echo "
				</select> <br><br>

				<button class = 'green' type='submit'><i class = 'icon-wrench'></i> Demand!</button>
				</center>
				</form>
				</div>
				";
		$curr = $_SESSION['distributor_id'];
		

		if(isset($_GET['service_select'])){
			$serv = $_GET['service_select'];
			$sql1 = "UPDATE service SET demand = 0 WHERE  service_id = $serv";
			$result1 = mysql_query($sql1, $conn) or die(mysql_error());
			$sql2 = "UPDATE service SET available = 1 WHERE  service_id = $serv";
			$result2 = mysql_query($sql2, $conn) or die(mysql_error());

			if($result1 && $result2){

				echo "<div class='notice success'><i class='icon-wrench'></i> SparePart Demanded! | <strong> You will redirect in a 3 seconds... </strong>
				<a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=distributor_main.php" );
			} else {
				echo "<div class='notice error'><i class='icon-wrench'></i> SparePart Mismatch! Please Select Proper Value. | <font color = 'red'><strong> You will redirect in a 3 seconds... <strong></font> <a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=distributor_main.php" );
			}
		}
		echo "
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