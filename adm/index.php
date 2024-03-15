<?php
session_start();
include "../connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="../images/faviconn.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="s/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 

  <!-- Custom styles for this template-->
  <link href="s/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<script>
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
/*---------------------------------------------*/

#show
{
  position: absolute;
  right: 70px;
  top: 220px;
  display: none;
}

#shide
{
  position: absolute;
  right: 70px;
  top: 220px;
}

/*---------------------------------------------*/

</style>

<body class="" style="background-image: url('../images/bg-02.jpg');">

  <div class="container">

            <?php
                      
              if (isset($_POST['adlog'])){
                          
                      function test_input($data) {
                  $data = trim($data);
                $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }
          //exploit ends

                $user = test_input($_POST['mail'])or die('please enter a valid email');
                $password = test_input($_POST['pass'])or die('please enter a valid password');
                $query1 = "select * from ad_in where  pas='".mysqli_real_escape_string($con,$password)."' AND use_r='".mysqli_real_escape_string($con,$user)."' ";
                $result1 = mysqli_query($con,$query1)or die(mysqli_error($con));
                                $row = mysqli_fetch_array($result1);
                $num_row = mysqli_num_rows($result1);
                  
                  if( $num_row > 0 ) {
                    
                   $_SESSION['passiw']=$row['pas'];
                    
                    $_SESSION['name']=$row['use_r'];
                   
                    $_SESSION['st']=$row['stage'];
                    $_SESSION['fname']=$row['fullname'];
                    $_SESSION['ph']=$row['phone'];
                                                             
                                    

                    echo "<script> location.replace('s/')</script>";
                    
                  }
                  else{ 
                echo "<script>alert('Invalid email or Password!')</script>";
                echo "<p style='color:red;'>Are You Sure you have an account?!</p>";
                }    //form validation to avoid exploit

                }            
    ?>

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-9 col-md-9" >

        <div class="card o-hidden shadow-lg my-5" style="border-radius:0px 30px 0px 30px;">
          <div class="card-body p-0" >
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12" >
                <div class="p-5" >
                  <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4"><span class="fa fa-user-md"></span></h1>
                    <h1 class="h4 text-gray-900 mb-4">Doctor Login</h1>
                  </div>

                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="user">
                    <div class="form-group">
                      <input type="email" name="mail" class="form-control form-control" placeholder="Enter Email Address..." required="">
                    </div>
                    <div class="form-group ">
                      <span  class="fa fa-eye text-success" id="show" onclick="openn()"></span>
        							<span class="fa fa-eye-slash" id="shide" onclick="openn()"></span>
                      <input type="password" name="pass" class="form-control form-control"  placeholder="Password" id="myInput" required="">
                    </div>
                   
                   <button class="btn btn-info btn-user btn-block" name="adlog"><b>
                      LOGIN</b>
                    </button>
                    <hr>
                  
                   
                  </form>
                
                  <div class="text-center">
                    <a class="small" href="forget-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="../login.php">Are you a mother?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="admincreate.php">Create an Account!</a>
					  <hr>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="s/vendor/jquery/jquery.min.js"></script>
  <script src="s/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="s/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="s/js/sb-admin-2.min.js"></script>

</body>

</html>
