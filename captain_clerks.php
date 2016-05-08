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
			</tr></thead>
			<tbody>";

			$dept = $_SESSION['department_id'];
			$query = "SELECT * FROM clerk NATURAL JOIN employee WHERE ops_id = '10000' ";
				$result = mysql_query($query, $conn) or die( mysql_error());
				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					$clerk_id = $row['employee_id'];
					$clerk_name = $row['employee_name'];
					echo"<td>".$clerk_id."</td>";
					echo"<td>".$clerk_name."</td>";
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
				<center><br>";

			echo "


				<select id = 'state_select' name='clerk_select' required= 'required'/>
					<option>Select Clerk ID</option>
				";

				$query = "SELECT DISTINCT employee_id FROM clerk ORDER BY employee_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$emp = $row['employee_id'];
					echo"<option value=".$emp.">".$emp."</option>";
				}

				echo "
				</select>  <br><br>



				<select id = 'state_select' name='department_select' required= 'required'/>
					<option>Select Department ID</option>

				";


				$query = "SELECT DISTINCT department_id FROM department WHERE department_id = ".$dept." ORDER BY department_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$dpt = $row['department_id'];
					echo"<option value=".$dpt.">".$dpt."</option>";
				}

				echo "
				</select> <br><br>

				<select id = 'state_select' name='operation_select' required= 'required'/>
					<option>Select Operation ID</option>

				";


				$query = "SELECT DISTINCT ops_id FROM operations ORDER BY ops_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$oOps = $row['ops_id'];
					echo"<option value=".$oOps.">".$oOps."</option>";
				}

				echo "

				</select> <br><br>

				<select id = 'state_select' name='service_select' required= 'required'/>
					<option>Select Service ID</option>

				";

				$query = "SELECT DISTINCT service_id FROM service WHERE department_id = ".$dept." ORDER BY service_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$sRv = $row['service_id'];
					echo"<option value=".$sRv.">".$sRv."</option>";

				}
				echo "


				</select> <br><br>	
				<button class = 'green' type='submit'><i class = 'icon-check'></i> Update</button>
				</form></center>
			</form>
			";
		if(isset($_GET['service_select']) && isset($_GET['operation_select']) && isset($_GET['department_select']) && isset($_GET['clerk_select']))
		{

			$clerk_id = $_GET['clerk_select'];
			$ops_id = $_GET["operation_select"];
			$department = $_GET["department_select"];
			$service = $_GET["service_select"];


			if($clerk_id > 0 && $ops_id > 0 && $department > 0 && $service > 0){
				$sql = "UPDATE clerk SET ops_id = '$ops_id' WHERE employee_id = '$clerk_id'";
				$sql2 = "UPDATE clerk SET department_id = '$department' WHERE employee_id = '$clerk_id' ";
				$sql3 = "UPDATE clerk SET service_id = '$service' WHERE employee_id = '$clerk_id' ";

				$result = mysql_query($sql, $conn) or die(mysql_error());
				$result2 = mysql_query($sql2, $conn) or die(mysql_error());
				$result3 = mysql_query($sql3, $conn) or die(mysql_error());

				if($result && $result2 && $result3){
				echo "<div class='notice success'><i class='icon-wrench'></i> Spare Part Requested! | <strong> You will redirect in a 3 seconds... </strong><a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=captain_clerks.php" );
				}
			} else {
				echo "<div class='notice error'><i class='icon-wrench'></i> Please Write Proper Spare Part! | <strong> You will redirect in a 3 seconds... </strong> <a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=captain_clerks.php" );
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