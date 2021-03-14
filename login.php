<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
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
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" class="login100-form validate-form" style="height: 240px;">
					<span class="login100-form-title" style="height:50px">
						Officer's Login
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type Employee ID">
						<input id="first-name" class="input100" type="text" name="username" placeholder="Employee ID">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type Password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login" id="login">
							Sign in
						</button>
					</div>
					<?php
						include("conn.php");
						error_reporting(0);
						$empid=$_POST['username'];
						$pass=$_POST['pass'];
						$query="SELECT * FROM offusrpass WHERE empid='$empid' and pass='$pass'";
    					$suc=mysqli_query($conn,$query);
						$no=mysqli_num_rows($suc);   
						if($no==1)
    					{ 
							session_start();
							$_SESSION['empid']=$empid;
							?>
							<p id="info">Login Successful. Redirecting...</p>
							<script>
  								setTimeout(function(){
									window.location.href= 'http://localhost:8080/Project/userdash/index.php';},4000);
							</script>
    					<?php
						}
						else if($no==0)
    					{ 
							$query="SELECT * FROM temp WHERE empid='$empid' and pass='$pass'";
							$suc=mysqli_query($conn,$query);
							$no=mysqli_num_rows($suc);
							if($no==1)
							{
							?>
        						<p id="info">Your account is awaiting approval. Check back in a while.</p>
							<script>
  								setTimeout(function(){
									document.getElementById('info').style.display = 'none'}, 5000);
							</script>
    						<?php
							}
							else if($empid!="" && $pass!="")
							{?>
								<p id="error">No registration found. Please try again!</p>
								<script>
 										setTimeout(function(){
											document.getElementById('error').style.display = 'none'}, 5000);
								</script>
							<?php
							}
						}
					?>
					<div class="w-full text-center p-t-27 p-b-20">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							User name / password?
						</a>
					</div>

					<div class="w-full text-center">
						<a href="register.php" class="txt3">
							Register
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
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
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>