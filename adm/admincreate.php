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

  <title>Admin - Register</title>

  
  <link href="s/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 

 
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
  top: 112px;
  display: none;
}

#shide
{
  position: absolute;
  right: 70px;
  top: 112px;
}

/*---------------------------------------------*/

</style>


<body class="" style="background-image: url('../images/bg-02.jpg');">

  <div class="container">
<!-- php code -->

<?php
             
                 if (isset($_POST['crt'])){
           
           //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends
                 
      $fullname=test_input($_POST["fname"]);
      $stage=test_input($_POST["stage"]);
      $username=test_input($_POST["mail"]);
      $phone=test_input($_POST["phone"]);
      $password=test_input($_POST["pass"]);
      $code_input=test_input($_POST["vcode"]);
      $codec="PN_7878";
      
$check2=mysqli_query($con,"select * from ad_in where use_r='".mysqli_real_escape_string($con,$username)."' or pas='".mysqli_real_escape_string($con,$password)."' ");

    $row2=mysqli_num_rows($check2);
    
if($row2 > 0 ){
         echo"<script>alert('email or password already exists')</script>";
         
    }
   elseif ($code_input != $codec) {
      echo"<script>alert('Verification Code is Wrong')</script>";
   }
    
    else{
        if($row2==0){


        $senddata2 = mysqli_query($con,"insert into ad_in (use_r,pas,stage,fullname,phone) values
    ('".mysqli_real_escape_string($con,$username)."','".mysqli_real_escape_string($con,$password)."','".mysqli_real_escape_string($con,$stage)."','".mysqli_real_escape_string($con,$fullname)."','".mysqli_real_escape_string($con,$phone)."')")or die(mysqli_error($con)); 
  
  $query = "select * from ad_in where  pas='".mysqli_real_escape_string($con,$password)."' AND use_r='".mysqli_real_escape_string($con,$username)."' ";
                $result = mysqli_query($con,$query)or die(mysqli_error($con));
                                $row = mysqli_fetch_array($result);
    
        }

       
  }
    if(@$senddata2){
        
    echo"<script>alert('$stage Doctor account created')</script>";
  
  $_SESSION['passiw']=$row['pas'];
                    
                    $_SESSION['name']=$row['use_r'];
                   
                    $_SESSION['st']=$row['stage'];
                    $_SESSION['fname']=$row['fullname'];
                    $_SESSION['ph']=$row['phone'];
                    echo "<script> location.replace('s/')</script>";
}

else{
echo"<script>alert('An error occured,please try again..')</script>";    
}}?>

<!-- end php code -->

    <!-- Outer Row -->
    <div class="row ">

      <div class="col-xl-6 mt-4">

        <div class="card o-hidden shadow-lg my-5" style="border-radius:30px 0px 0px 30px;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-3"><span class="fa fa-user-md"></span></h1>
                    <h1 class="h4 text-gray-900 mb-4">Create A Doctor Account</h1>
                  </div>


                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="user">
                  <div class="form-group">
                      <input type="text" class="form-control" name="fname" placeholder="Enter Fullname" required="">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required="">
                    </div>

                  <div class="form-group">
                      <input type="email" class="form-control" name="mail" placeholder="Enter Email Address..." required="">
                  </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-6 mt-4">

          <div class="card o-hidden shadow-lg my-5" style="border-radius:0px 30px 30px 0px;">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
              
                <div class="col-lg-12">
                  <div class="p-5">
                    
                  <div class="form-group">
                    <select style="font-size:15px;" name="stage" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control" required="required">
                      <option value="">------- Department ------</option>
                      <option value="Postnatal">Postnatal</option>
                    </select>
                  </div>
                                   
                  <div class="form-group">
                      <span  class="fa fa-eye text-success" id="show" onclick="openn()"></span>
        							<span class="fa fa-eye-slash" id="shide" onclick="openn()"></span>
                      <input type="password" class="form-control" name="pass" id="myInput" placeholder="Password" required="">
                    </div>

                      <div class="form-group">
                      <input type="text" class="form-control form-control" name="vcode" placeholder="Verification Code" required="">
                    </div>
                   
                    <button class="btn btn-success btn-user btn-block" name="crt"><b>
                      Create Account</b>
                    </button>
                    <hr>
                  
                   
                  </form>
                
                  <div class="text-center">
                    <a class="small" href="index.php">Already have an account?.. <b>Login</b></a>
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
