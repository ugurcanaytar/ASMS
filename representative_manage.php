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
			<form action= ".$_SERVER['PHP_SELF']." method='get'>

				<p>
					<label for='owner_id'>Owner ID: </label>
					<input name='owner_id' type='text' required= 'required'/>
				</p>
				<p>
					<label for='release_date'>Release Date: </label>
					<input name='release_date' type='date' required= 'required'/>
				</p>
				<p>
					<label for='model'>Car Model: </label>
					<input name='model' type='text' required= 'required'/>
				</p>
				<p>
					<label for='engine_volume'>Engine Volume: </label>
					<input name='engine_volume' type='text' required= 'required'/>
				</p>
				<p>
					<button class='green' name='submit' type='submit'><i class='icon-check'></i> Apply</button>
				</p>
				</form>
			
	";

	//var_dump($_GET);
	// isset($_POST['car_id']) && isset($_POST['owner_id']) && isset($_POST['release_date']) && isset($_POST['model']) && isset($_POST['engine_volume'])
	if(isset($_GET['owner_id']) && isset($_GET['release_date']) && isset($_GET['model']) && isset($_GET['engine_volume'])){


		$owner_id = $_GET["owner_id"];
		$release_date = $_GET["release_date"];
		$model = $_GET["model"];
		$engine_volume = $_GET["engine_volume"];
		$query = "INSERT INTO Car (car_id, model, release_date, engine_volume, owner_id) VALUES ('', '$model', '$release_date', '$engine_volume', '$owner_id')";
		$result = mysql_query($query, $conn); //or die(mysql_error());
		
		if($result){
			echo "<div class='notice warning'><i class='icon-wrench'></i> New Car Added!
			<a href='#close' class='icon-remove'></a></div>";
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