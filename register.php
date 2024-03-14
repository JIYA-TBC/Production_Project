<?php
session_start();
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Postpartum:::Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/logo-01.png"/>
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
    reader.onload = function(){
      var output = document.getElementById('outputpix');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };</script>
  
  <script>
function checkMail() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "checkuser.php",
    data:'email='+$("#mail").val(),
    type: "POST",
    success:function(data){
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
    },
    error:function (){}
    });
}

function openn(){
	var x = document.getElementById("myInput");
	if(x.type == "password"){
		x.type = "text";
		$("#show").show();
		$("#shide").hide();
	}else{
		x.type = "password";
		$("#show").hide();
		$("#shide").show();
	}
}

</script>
  
  <style>
#outputpix{
    width:50%;
    height:140px;
    border-radius:100px;
    margin:10px;
} 


</style>

<body class="animsition">
	
	<!-- Header -->
	<?php include "connect/header.php"; ?>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center" style="color:#f63;">
			Register Here
		</h2>
	</section>	

    <div class="bg0 p-t-10 p-b-10" style="font-size: 40px; text-align: center; color: #000;">
        <span class="fa fa-female" ></span>
        <h4 class="mtext-105 cl2 txt-center p-b-30">
			Enter Your Infomations
		</h4>
    </div>

	<?php
             
			 if (isset($_POST['submit'])){
				 
				 //form validation to avoid exploit
				function test_input($data) {
					$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
				}
				//exploit ends
				
				$sname=test_input($_POST["sname"]);
				$fname=test_input($_POST["fname"]);
				$email=test_input($_POST["email"]);
				$stage=test_input($_POST["stage"]);

				$phone=test_input($_POST["phone"]);
				$user=test_input($_POST["user"]);
				$pass=test_input($_POST["pass"]);
				
				$passhash= password_hash($pass,PASSWORD_DEFAULT);

				$duser="PN/".date("Y")."/";
				$generate=rand(999,9999999);
			  	$userid=$duser.$generate;
  


	  	$check2=mysqli_query($con,"select * from usr where email='".mysqli_real_escape_string($con,$email)."' or pass='".mysqli_real_escape_string($con,$pass)."' ");
		$row2=mysqli_num_rows($check2);


		if($row2 > 0 ){
	 	echo"<script>alert('email or password already exists')</script>";
	 
		}

		else{
	
		$cf=mkdir("users/".$email);


		$senddata2 = mysqli_query($con,"insert into usr (user_id,sname,fname,email,stage,phone,user,pass,passhash) values
		('".mysqli_real_escape_string($con,$userid)."','".mysqli_real_escape_string($con,$sname)."','".mysqli_real_escape_string($con,$fname)."','".mysqli_real_escape_string($con,$email)."','".mysqli_real_escape_string($con,$stage)."','".mysqli_real_escape_string($con,$phone)."','".mysqli_real_escape_string($con,$user)."','".mysqli_real_escape_string($con,$pass)."','".mysqli_real_escape_string($con,$passhash)."')")or die(mysqli_error($con)); 

		$query = "select * from usr where  pass='".mysqli_real_escape_string($con,$pass)."' AND email='".mysqli_real_escape_string($con,$email)."' ";
							$result = mysqli_query($con,$query)or die(mysqli_error($con));
							$pickoff = mysqli_query($con,"INSERT INTO pick_off (user_id,link_in) values ('$userid','#')")or die(mysqli_error($con));
							$row = mysqli_fetch_array($result);
							$file=fopen('users/'.$email.'/log.txt','a');

		}

		if(@$senddata2){
		echo"<script>alert('$fname, you Registered succesfully')</script>";

								$_SESSION['passi']=$row['pass'];
									$_SESSION['mail']=$row['email'];
									$_SESSION['sname']=$row['sname'];
									$_SESSION['fname']=$row['fname'];
									$_SESSION['mname']=$row['mname'];
									$_SESSION['picture']=$row['profile_p'];
									$_SESSION['userid']=$row['user_id'];
									$_SESSION['sta']=$row['stage'];
									$_SESSION['ph']=$row['phone'];										
									
									echo "<script> location.replace('users/learn/')</script>";
		}

		else{
		echo"<script>alert('An error has occured, please try again..')</script>";    
			}
		}
	?>


	<!-- Content page -->
	<section class="bg0 p-b-20">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control" type="text" name="sname" placeholder="Surname" required>
							<span class="fa fa-user how-pos4 pointer-none"></span>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control" type="text" name="fname" placeholder="Firstname" required>
							<span class="fa fa-user how-pos4 pointer-none"></span>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control" type="email" id="mail" onBlur="checkMail()" name="email" placeholder="Email" required>
							<span class="fa fa-envelope how-pos4 pointer-none"></span>
							<span id="user-availability-status"></span>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<select style="font-size:15px;" name="stage" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control" required="required">
								<option value="">------- Department ------</option>
								<option value="Postpartum">Postpartum</option>
							</select>
							<span class="fa fa-external-link-square how-pos4 pointer-none"></span>
						</div>
						
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control" type="text" name="phone" placeholder="Phone" required>
							<span class="fa fa-phone how-pos4 pointer-none"></span>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control" type="text" name="user" placeholder="Username" required>
							<span class="fa fa-user-plus how-pos4 pointer-none"></span>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<span  class="fa fa-eye text-success" id="show" onclick="openn()"></span>
							<span class="fa fa-eye-slash" id="shide" onclick="openn()"></span>
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control" type="password" name="pass" placeholder="Password" id="myInput" required>
							<span class="fa fa-expeditedssl how-pos4 pointer-none"></span>
							
						</div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="submit" style="background:#f63;">
							Submit
						</button>
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
		$(".js-select2").each(function(){
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
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>