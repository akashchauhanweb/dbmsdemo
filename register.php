<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V17</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/utilreg.css">
	<link rel="stylesheet" type="text/css" href="css/mainreg.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" style="padding-top: 50px;" method="GET">
					<span class="login100-form-title p-b-34">
						REGISTRATION PAGE
					</span>
					
					<div class="wrap-input100 validate-input m-b-20" data-validate="Type Employee ID">
						<input id="first-name" class="input100" type="text" name="empid" placeholder="Employee ID">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-20" data-validate="Type Name">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-20" data-validate="Type Age">
						<input class="input100" type="text" name="age" placeholder="Age">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-20" data-validate="Type Contact">
						<input class="input100" type="text" name="contact" placeholder="Contact">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-20" data-validate="Type Password">
						<input class="input100" type="password" name="pass" placeholder="Password (less than 15 characters)">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" onclick="insert()">
							REGISTER
						</button>
					<?php
						include("conn.php");
						error_reporting(0);
						$empid=$_GET['empid'];
						$name=$_GET['name'];
						$age=$_GET['age'];
						$contact=$_GET['contact'];
						$pass=$_GET['pass'];
						$query="INSERT INTO temp VALUES ($empid,'$name',$age,$contact,'$pass')";
						$suc=mysqli_query($conn,$query);
						if($suc)
   						{ ?>
							<p id="info">You have successfully registered. Check back again for approval.</p>
							<script>
 									setTimeout(function(){
									document.getElementById('info').style.display = 'none'}, 5000);								</script>
							</script>
							<?php
						}
						else if($name!="" && $empid!="" && $age!="" && $pass!="")
						{
							?>
							<p id="error">Employee ID already exists. Please try again!</p>
							<script>
 									setTimeout(function(){
   									document.getElementById('error').style.display = 'none'}, 5000);
							</script>
						<?php
						}
					?>
					</div>					
				</form>
				<div class="login100-more" style="background-image: url('images/jet.jpg');"></div>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/mainadmin.js"></script>
</body>
</html>