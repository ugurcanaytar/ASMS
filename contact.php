<?php


echo "

	<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>ASMS | Contact</title>
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
			<h1><a href='index.php'><strong>ASMS | </strong>Contact</a></h1>
		</div>
		<div class='col_6 column right'>
		</div>
	</header>


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

			<h4>ASMS System</h4>
			<center><blockquote class='small'><p><strong>This project is one of the parts of our course CS353 - Database Systems in Bilkent University. Our aim is to handle
			and provide Service Management System (SMS) for Auto Services in order to construct rapid networking in their environment for providing
			instantaneous service to their customers. To contact us:<br></strong>
			<br>
				Ugurcan Aytar - ugurcan.aytar@ug.bilkent.edu.tr<br>
				Umut Cem Soyulmaz - umut.soyulmaz@ug.bilkent.edu.tr<br>
				Caner Akca - caner.akca@ug.bilkent.edu.tr<br>
				Burak Bor - burak.bor@ug.bilkent.edu.tr<br>
			<br>
			<strong>Enjoy!</strong>
			<span>Members of Group 2</span>
			<img src='contact.jpg' alt='Caner View' style='width:400px;height:500px;'>


			</p></blockquote></center>
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