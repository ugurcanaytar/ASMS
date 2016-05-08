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
		<li><a href='representative_main.php'><i class='icon-edit'></i> Manage Appointments</a></li>
		<li class ='current'><a href='representative_manage.php'><i class='icon-plus'></i> Add New Car</a></li>
		<li><a href='representative_operation.php'><i class='icon-plus'></i> Add New Operation</a></li>
		<li><a href='representative_profile.php'><i class='icon-user'></i> Representative Profile</a></li>
		</ul>
	</div>
		
		<div class='col_12 column'>
		<form id='reg_form'>
			<fieldset>
			<legend><i class='icon-plus'></i> Add New Car</legend>
			<form class='horizontal' method='get' action=".$_SERVER['PHP_SELF'].">
			<br><center>
				<select id = 'state_select' name='owner_select' required= 'required'/>
					<option>Select Owner ID</option>
			";

				$query = "SELECT DISTINCT owner_id FROM car ORDER BY owner_id asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$owner = $row['owner_id'];
					echo"<option value=".$owner.">".$owner."</option>";
				}

				echo "
				</select>  <br><br>

				<select id = 'state_select' name='model_select' required= 'required'/>
					<option>Select Car Model</option>
				";

				$query = "SELECT DISTINCT model FROM car ORDER BY model asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$model = $row['model'];
					echo"<option value=".$model.">".$model."</option>";
				}

				echo "
				</select>  <br><br>



				<select id = 'state_select' name='volume_select' required= 'required'/>
					<option>Select Engine Volume</option>

				";

				$query = "SELECT * FROM car ORDER BY engine_volume asc";
				$result = mysql_query($query, $conn) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$eVolume = $row['engine_volume'];
					echo"<option value=".$eVolume.">".$eVolume."</option>";
				}

				echo "
				</select> <br><br>

				<p>
					<label for='release_date'>Release Date:</label>
					<input name='release_date' type='date' required= 'required'/>
					<br><br>
				</p>
				<button class = 'green' type='submit'><i class = 'icon-plus'></i> Add</button>
			</form></center>
			</form>
			";


	if(isset($_GET['volume_select']) && isset($_GET['release_date']) && isset($_GET['model_select']) && isset($_GET['owner_select'])){


		$owner_id = $_GET["owner_select"];
		$release_date = $_GET["release_date"];
		$model = $_GET["model_select"];
		$engine_volume = $_GET["volume_select"];
		$query = "INSERT INTO Car (car_id, model, release_date, engine_volume, owner_id) VALUES ('', '$model', '$release_date', '$engine_volume', '$owner_id')";
		$result = mysql_query($query, $conn); //or die(mysql_error());
		
		if($result){
			echo "<div class='notice warning'><i class='icon-wrench'></i> New Car Added! <font color = 'red'><strong> You will redirect in a 3 seconds... <strong></font> <a href='#close' class='icon-remove'></a></div>";
			header( "refresh:3;url=representative_manage.php" );
		} else {

			echo "<div class='notice error'><i class='icon-wrench'></i> Cannot Add New Car! Please Select Proper Values! | <font color = 'red'><strong> You will redirect in a 3 seconds... <strong></font> <a href='#close' class='icon-remove'></a></div>";
				header( "refresh:3;url=representative_manage.php" );
		}
	}
echo "	
		</fieldset>
		</form>
	</div>
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