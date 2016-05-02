<?php

echo "
<!DOCTYPE html>
<html>
<head>";


echo "

	<title>ASMS | Main Page</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<meta name='description' content='' />
	<link rel='stylesheet' type='text/css' href='css/kickstart.css' media='all' />
	<link rel='stylesheet' type='text/css' href='style.css' media='all' /> 
	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
	<script type='text/javascript' src='js/kickstart.js'></script>
</head>
<body>
<div id='container' class='grid'>
	<header>
		<div class='col_6 column'>
			<h1 align='right'><a href='index.php'><strong>AutoService</strong>ManagementSystem</a></h1>
		</div>
	"; 

	echo "	
	</header>

";

echo "

	<div class='col_12 column'>
			<form id='login_form'>
			<fieldset>
			<legend>Welcome!</legend>
			<div class = 'col_12 column'>				
				<ul class = 'menu'>
					<li><a href='customer_login.php'><i class='icon-desktop'></i> Customer</a></li>
					<li><a href='representative_login.php'><i class='icon-user'></i> Representative</a></li>
					<li><a href='clerk_login.php'><i class='icon-wrench'></i> Clerk</a></li>
					<li><a href='captain_login.php'><i class='icon-flag'></i> Captain</a></li>
					<li><a href='distributor_login.php'><i class='icon-key'></i> Distributor</a></li>
					";
					echo "
					<li><a href='contact.php'><i class='icon-phone'></i> Contact Us</a></li>
				</ul>
			</div>
			";
			echo "

				</fieldset>
			</form>


		</div>
		</div>

		<div class='clearfix'></div>
		<footer>
		";
		echo "
			<p>Copyright @ASMS_Group2; CS353 - Spring 2016, Auto Service Management System, All Rights Reserved.</p>
		</footer>
</div> <!-- End Grid -->
</body>
</html>
												
";
?>