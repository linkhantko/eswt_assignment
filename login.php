<?php
	include('connect.php');
		//starting
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="vendors/images/icon2.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="adminlogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="adminlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="adminlogin/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="adminlogin/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="adminlogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="adminlogin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="adminlogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="adminlogin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="adminlogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="adminlogin/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="signin.php" method="post">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>
					<?php
					if(isset($_SESSION['reg_success'])):

				 ?>
				 <div class="alert alert-success" role="alert">
				  <h5> Congratulatons</h5>
				  <h6> You hvae successfully <span class="">Sign Up </span></h6>
				  <hr>
				  <p><?= $_SESSION['reg_success']; ?></p>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
				  </button>
				</div>

				<?php
					endif;
					unset($_SESSION['reg_success']);
				?>
				<?php
					if(isset($_SESSION['fail_login'])):
				 ?>
				<div class="alert alert-danger" role="alert">


				  <p><?= $_SESSION['fail_login']; ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
				  </button></p>
				</div>
				<?php
					endif;
					unset($_SESSION['fail_login']);
				?>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password" autocomplete="off">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" autocomplete="off">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
							<!-- <input type="submit" name="btnLogin" value="Login" class="login100-form-btn"> -->
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="#">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="adminlogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="adminlogin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="adminlogin/vendor/bootstrap/js/popper.js"></script>
	<script src="adminlogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="adminlogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="adminlogin/vendor/daterangepicker/moment.min.js"></script>
	<script src="adminlogin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="adminlogin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="adminlogin/js/main.js"></script>

</body>
</html>
