<?php
session_start();
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Postpartum:::Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/mainlogo.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<script>
	var loadFile = function(event) {
		var reader = new FileReader();
		reader.onload = function() {
			var output = document.getElementById('outputpix');
			output.src = reader.result;
		};
		reader.readAsDataURL(event.target.files[0]);
	};
</script>

<script>
	function checkMail() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "checkuser.php",
			data: 'email=' + $("#mail").val(),
			type: "POST",
			success: function(data) {
				$("#user-availability-status").html(data);
				$("#loaderIcon").hide();
			},
			error: function() {}
		});
	}

	function openn() {
		var x = document.getElementById("myInput");
		if (x.type == "password") {
			x.type = "text";
			$("#show").show();
			$("#shide").hide();
		} else {
			x.type = "password";
			$("#show").hide();
			$("#shide").show();
		}
	}
</script>

<style>
	#outputpix {
		width: 50%;
		height: 140px;
		border-radius: 100px;
		margin: 10px;
	}
</style>

<body class="animsition">

	<!-- Header -->
	<?php include "connect/header.php"; ?>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/.jpg');">
		<h2 class="ltext-105 cl0 txt-center" style="color:#f50a0a;">
			Login Here
		</h2>
	</section>

	<div class="bg0 p-t-10 p-b-10" style="font-size: 40px; text-align: center; color: #000;">
		<a href="index.php"><img src="images/icons/mainlogo.png" alt="IMG-LOGO" style="height:170px; width:150px;"></a>

		<!-- <span class="fa fa-female" ></span> -->
		<!-- <h4 class="mtext-105 cl2 txt-center p-b-30"> -->
		<!-- Login -->
		<!-- </h4> -->
	</div>

	<?php

	if (isset($_POST['log'])) {

		function test_input($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		//exploit ends

		$mail = test_input($_POST['email']) or die('please enter a valid mail');
		$password = test_input($_POST['pass']) or die('please enter a valid pin');
		$query = "select * from usr where  pass='" . mysqli_real_escape_string($con, $password) . "' AND email='" . mysqli_real_escape_string($con, $mail) . "' ";
		$result = mysqli_query($con, $query) or die(mysqli_error($con));
		$row = mysqli_fetch_array($result);
		$num_row = mysqli_num_rows($result);
		$date = date('d/m/y');
		$time = date("h:i:sa");

		if ($num_row > 0) {

			$_SESSION['passi'] = $row['pass'];
			$_SESSION['mail'] = $row['email'];
			$_SESSION['sname'] = $row['sname'];
			$_SESSION['fname'] = $row['fname'];
			$_SESSION['mname'] = $row['mname'];
			$_SESSION['picture'] = $row['profile_p'];
			$_SESSION['userid'] = $row['user_id'];
			$_SESSION['sta'] = $row['stage'];
			$_SESSION['ph'] = $row['phone'];


			$file = fopen('users/' . $mail . '/log.txt', 'a');
			$content = "Email:" . $mail . PHP_EOL . "Date:" . $date . PHP_EOL . "Time:" . $time . PHP_EOL . PHP_EOL;

			$senddata2 = fwrite($file, $content);
			fclose($file);

			echo "<script> location.replace('users/learn/activity.php')</script>";
		} else {
			echo "<script>alert('Invalid email or Pin! ')</script>";
			echo "<p style='color:red; text-align:center;'>Are You Sure you have an account?!</p>";
		}		 //form validation to avoid exploit

	}
	?>

	<!-- Content page -->
	<section class="bg0 p-b-20 ">
		<div class="container">

			<div class="flex-w flex-tr">
				<div class="col-md-3"></div>
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control" type="email" name="email" placeholder="Email" required>
							<span class="fa fa-envelope how-pos4 pointer-none"></span>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<span class="fa fa-eye text-success" id="show" onclick="openn()"></span>
							<span class="fa fa-eye-slash" id="shide" onclick="openn()"></span>
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control" type="password" name="pass" placeholder="Password" id="myInput" required>
							<span class="fa fa-expeditedssl how-pos4 pointer-none"></span>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer text-white" name="log" style="background:#f01d1d;">
							Login
						</button><br>
						<p><a class="fli" href="#">Forget Password?</a> </p>
						<p><a class="fli" href="adm/index.php">Are you a doctor?</a></p>

					</form>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<?php include "connect/footer.php"; ?>

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
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script> -->
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>