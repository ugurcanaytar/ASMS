<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "car";


session_start();

$conn = mysql_connect($host,$user,$pass);
mysql_select_db($db,$conn);

if(!isset($_SESSION['employee_id']))
	{
		header( 'Location: representative_login.php' );
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
		<li><a href='representative_main.php'><i class='icon-edit'></i> Manage Appointments</a></li>
		<li><a href='representative_manage.php'><i class='icon-plus'></i> Add New Car</a></li>
		<li class><a href='representative_operation.php'><i class='icon-plus'></i> Add New Operation</a></li>
		<li class='current'><a href='representative_profile.php'><i class='icon-user'></i> Representative Profile</a></li>

		</ul>
	</div>

		<div class='col_12'>
		<fieldset>
			<legend><i class='icon-user'></i> Representative Profile</legend>
		<p>
";

			echo "Name: ".$_SESSION['employee_name']."<br>";
			echo "Expert Level: ".$_SESSION['expert_level']."<br>";
			echo "Phone Number: ".$_SESSION['phone']."<br>";
			echo "E-Mail: ".$_SESSION['rep_email']."<br>";
echo"			
		</p>
		</fieldset>
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