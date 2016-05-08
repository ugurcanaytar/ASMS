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
		
		<form action= ".$_SERVER['PHP_SELF']." method='get'>
		<div class='col_12 column'>
			<ul id='listings'>
			<table class='sortable' cellspacing='0' cellpadding='0'>
			<thead><tr>
				<th>Operation</th>
				<th>Engine Volume</th>
				<th>Release Date</th>
				<th>Appointment Date</th>
				<th>Service ID</th>
			</tr></thead>
			<tbody>";

			$curr = $_SESSION['employee_id'];	
			$query = "SELECT * FROM car NATURAL JOIN  service NATURAL JOIN operations NATURAL JOIN clerk WHERE employee_id = ".$curr." AND done = 0 AND available = 1";
			$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$operation = $row['description'];
					$engine = $row['engine_volume'];
					$start_date = $row['start_date'];
					$rls_date = $row['release_date'];
					$service = $row['service_id'];
					echo"<td>".$operation."</td>";
					echo"<td>".$engine."</td>";
					echo"<td>".$rls_date."</td>";
					echo"<td>".$start_date."</td>";
					echo"<td>".$service."</td>";

					echo"</tr>";


					
					
				}
echo "		
			</form>
			</tr></tbody>
			</table><center>

";
echo "


				<select id = 'state_select' name='service_select'>
					<option>Service ID</option>

				";
				$query2 = "SELECT * FROM car NATURAL JOIN  service NATURAL JOIN operations NATURAL JOIN clerk WHERE employee_id = ".$curr." AND done = 0 AND available = 1";
				$result2 = mysql_query($query2, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result2)){
					$serv = $row['service_id'];
					echo"<option value=".$serv.">".$serv."</option>";
				}
echo"				
			</select>  <br><br>
			<center><button class = 'green' method = 'get' type='submit'><i class = 'icon-wrench'></i> Finish!</button></center>";

			error_reporting(E_ERROR | E_PARSE);

				if(isset($_GET['service_select'])){
					$serv = $_GET['service_select'];
					$errorQuery = "SELECT * FROM service WHERE service_id = $serv ";
					$errResult = mysql_query($errorQuery, $conn);

					if(mysql_num_rows($errResult)){
						$sql1 = "UPDATE service SET done = 1 WHERE service_id = $serv";
						$result1 = mysql_query($sql1, $conn) or die(mysql_error());
						$sql2 = "UPDATE clerk SET ops_id = 10000 WHERE employee_id = ".$curr."";
						$result2 = mysql_query($sql2, $conn) or die(mysql_error());
						$sql3 = "UPDATE service SET available = 9 WHERE service_id = $serv";
						$result3 = mysql_query($sql3, $conn) or die(mysql_error());
						$sql4 = "UPDATE clerk SET service_id = 0 WHERE employee_id = ".$curr."";
						$result4 = mysql_query($sql4, $conn) or die(mysql_error());
						echo "<div class='notice success'><i class='icon-wrench'></i> Operation is done | <strong> You will redirect in a 3 seconds... </strong>
						<a href='#close' class='icon-remove'></a></div>";
						header( "refresh:3;url=clerk_main.php" );
					}
					else{
						echo "<div class='notice error'><i class='icon-wrench'></i> Mismatch! Please Select Proper Value. | <font color = 'red'><strong> You will redirect in a 3 seconds... <strong></font> <a href='#close' class='icon-remove'></a></div>";
						header( "refresh:3;url=clerk_main.php" );
					}	
				}


			echo "
			</div>
			</ul>
			</center>
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