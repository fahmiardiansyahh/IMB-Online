<?php 
session_start();
include 'koneksi/koneksi.php';
	
	if (isset($_POST['submit']) ){
		$username=$_POST['username'];
		$password=$_POST['password'];
	$query=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$username'");
	$isi=mysqli_fetch_assoc($query);
	$userid=$isi['username'];
		$pass=$isi['password'];
		$nama=$isi['nama'];
		if (mysqli_num_rows($query)==1)
		{
		if ($password==$pass)
		{
			$_SESSION['username']=$username; //username
            $_SESSION['nama']= $nama; // Nama
            $_SESSION['id_pemohon']=$isi['id_pemohon'];
            $_SESSION['login']=true;
            echo "
			<script>
			alert('Login Berhasil !');
			document.location.href='indexuser.php';
			</script>";

  			
		}else{
			$error="Username Atau Kata Sandi Anda Salah";
		}
	}else{
			$error="Username Atau Kata Sandi Anda Salah";
		}

	}

 ?>






<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login User</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
<!--===============================================================================================-->
<style>
	.gagal{

		color: red;
		text-align: center;
		line-height: 27px;
		font-size: 15px;
		font-style: italic;
		margin-bottom: 25px;

	}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/bg-01.jpg');">
			<div class="wrap-login100">
				<div class="service-item text-right">
				 <a href="index.php" class="glyphicon glyphicon-remove">X</a></div>

				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					 <div class="gagal"><?php  if(isset($error)) echo $error; ?></div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
					</div>
					<div class="text-center p-t-30">
						<a class="txt1" href="daftar.php">
							Daftar?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

</body>
</html>