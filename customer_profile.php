<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "car";


session_start();
$conn = mysql_connect($host,$user,$pass);
mysql_select_db($db,$conn);


echo "

	<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>ASMS | Customer</title>
	<meta charset=UTF-8'/>
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
";

echo"
<div id='container' class='grid'>
	<header>
		<div class='col_6 column'>
			<h1><a href='customer_main.php'><strong>ASMS | </strong>Customer</a></h1>
		</div>
		<div class='col_6 column right'>
			<form action='logout.php' id='add_job_link'>
				<button class='large red'><i class='icon-eject'></i> Logout</button>
			</form>
		</div>
	</header>


	<div class='col_12 column'>
		<!-- Menu Horizontal -->
		<ul class='menu'>
		<li><a href='customer_main.php'><i class='icon-calendar'></i> Appointment</a></li>
		<li class='current'><a href='customer_profile.php'><i class='icon-user'></i> Profile</a></li>
		<li><a href='customer_history.php'><i class='icon-desktop'></i> History</a></li>
		</ul>
	</div>

		<div class='col_12'>
		<fieldset>
			<legend>Customer Profile</legend>
			<form action=" .$_SERVER['PHP_SELF']." method='post'>
		<p>
";			

			$curr = $_SESSION['customer_id'];
			$query2 = "SELECT * FROM customer_info WHERE customer_id = ".$curr."";
			$result2 = mysql_query($query2, $conn) or die( mysql_error());
			while($row = mysql_fetch_array($result2)){
					echo "<p>";
					$c_id = $row['customer_id'];
					$name = $row['name'];
					$address = $row['address'];
					$c_email = $row['c_email'];
					$p_n = $row['phone_number'];
					echo"Name: ".$name."<br>";
					echo"Customer ID: ".$c_id."<br>";
					echo"Address: ".$address."<br>";
					echo"Phone Number: ".$p_n."<br>";
					echo"Customer Email:".$c_email."<br>";
					echo "</p>";
				}
echo "
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