<?php
session_start();
include "session_st.php";

include"../../connect.php";
include "count.php";



if (!isset($_SESSION['passi'])){
  header("location:../../login.php");
  exit();
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <link rel="icon" href="img/mainlogo.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PMS E-learn - Profile</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../w3.css">
  <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('outputpix');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  </script>
    
  <style>
#outputpix{
    width:50%;
    height:150px;
    border-radius:100px;
    margin:10px;
} 


</style>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "connect/head.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <?php include "connect/nav.php"; ?>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
            
          </div>
          <div class="row">			
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $sn."'s"; ?> Profile</h6>
                  <div class="dropdown no-arrow"><span class="fa fa-user"></span></div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
				<div style="text-align:left;">
				<center>
				<table class="table table-responsive" style="text-align:left;">
				<?php
				 $mysqli1="select * from usr where user_id='".$us."'";
	$myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
	while($fetch=mysqli_fetch_assoc($myquery1)){
				
				?>
				<tr>
          <img  src="../../<?php echo $pi; ?>" class="img-profile rounded-circle" style="width:200px; height:200px;">
          <button onclick="document.getElementById('id01').style.display='block'" title="Edit profile picture" class="w3-button col-sm-10" style=" background:none; color:#000; border:none;">
          <b>Edit <span class="fa fa-camera"></b></span>
          </button>
<!-- ============**************** profile pic ============**************** -->
<div id="id01" class="w3-modal w3-padding" style="z-index:1000;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px; padding:30px;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <h2 style="color:#f63; text-decoration:underline;" class="fonti"> <span class="fa fa-camera"></span> Change Profile Picture</h2>
      </div>


  <?php
       if (isset($_POST['pic'])){
					 
					 //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

$email=test_input($_POST["email"]);
			      
$imgname=$_FILES['ufile']['name'];
$templocation=$_FILES['ufile']['tmp_name'];
$fakepath="../../users/".$email."/".$imgname; 
$realpath="users/".$email."/".$imgname; 

    if (file_exists($realpath)) {
    echo"<script>alert('Image already Exist')</script>";  
} 
    else{
$saveimg= move_uploaded_file($templocation,$fakepath);

        $senddata2 = mysqli_query($con,"UPDATE usr SET profile_p = '".mysqli_real_escape_string($con,$realpath)."'  where email ='".mysqli_real_escape_string($con,$email)."' ");
  }
    if(@$senddata2){
    echo"<script>alert('Image Was Updated succesfully')</script>";
                    
     echo "<meta http-equiv='Refresh' content='1; url=profile.php'>";
  }    
}
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="col-md-6">
								<center>
                <img src="../../images/faceless.jpeg" alt="" class="img-responsive" style="width:200px; height:200px;"  align="absmiddle" id="outputpix"/><br />
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                
                <input type="file" class="form-control"  name="ufile" id="ufile5" accept="image/*" onchange="loadFile(event)" required="required"/><br>
                </center>
								
									<input type="email" value="<?php echo $mail; ?>" name="email" class="comment_input form-control" required="required" readonly="readonly" style="display:none;"><br>
									
									<button type="submit" name="pic" class=" trans_200 form-control btn-primary w3-text-white"><b>Update Picture</b></button><br><br>
				</form>      
      <div class="w3-container w3-border-top w3-padding-16" style="background:#f63;">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
	  </div>

    </div>
  </div>
<!-- THE END -->			
        </tr>

				<tr>
				<th>Name</th>
				<th><?php echo $fetch['sname']." ".$fetch['fname']." ".$fetch['mname']; ?>&nbsp;&nbsp;
        <span onclick="document.getElementById('id02').style.display='block'" title="Edit Name"     class="" style=" background:none; color:#000; border:none; cursor: pointer;">
          Edit <span class="fa fa-edit"></span>
          </span>

          <!-- ============**************** Fullname ============**************** -->
<div id="id02" class="w3-modal w3-padding" style="z-index:1000;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px; padding:0px;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <h2 style="color:#60c; text-decoration:underline;" class="fonti"> <span class="fa fa-edit"></span> Change Name</h2>
      </div><br>


  <?php
       if (isset($_POST['nam'])){
					 
					 //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

$email=test_input($_POST["email"]);
$sname=test_input($_POST["sname"]);
$fname=test_input($_POST["fname"]);
$lname=test_input($_POST["lname"]); 

        $senddata2 = mysqli_query($con,"UPDATE usr SET sname = '".mysqli_real_escape_string($con,$sname)."', fname = '".mysqli_real_escape_string($con,$fname)."', mname = '".mysqli_real_escape_string($con,$lname)."'  where email ='".mysqli_real_escape_string($con,$email)."' ");

        if(@$senddata2){
    echo"<script>alert('Name Was Updated succesfully')</script>";
                    
     echo "<meta http-equiv='Refresh' content='1; url=profile.php'>";                    
           }    
}
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="col-md-6">
								
                  <input type="text" value="<?php echo $sn; ?>" name="sname" class="comment_input form-control"><br>
                              
                  <input type="text" value="<?php echo $fn; ?>" name="fname" class="comment_input form-control"><br>
                              
                  <input type="text" placeholder="Middle name" name="lname" class="comment_input form-control"><br>
									
									<input type="email" value="<?php echo $mail; ?>" name="email" class="comment_input form-control" required="required" readonly="readonly" style="display:none;"><br>
									
									<button type="submit" name="nam" class=" trans_200 form-control btn-primary w3-text-white" ><b>Update Name</b></button><br><br>
				</form>      
      <div class="w3-container w3-border-top w3-padding-16" style="background:#60c;">
        <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
	  </div>

    </div>
  </div>
<!-- THE END -->			

        </th>
				</tr>

<!-- ============**************** child age ============**************** -->
				<tr>
				<th>Child's age</th>
				<th><?php echo $fetch['vaccage']; ?>&nbsp;&nbsp;
        <span onclick="document.getElementById('id02a').style.display='block'" title="Edit age"     class="" style=" background:none; color:#000; border:none; cursor: pointer;">
          Edit <span class="fa fa-child"></span>
          </span>

<div id="id02a" class="w3-modal w3-padding" style="z-index:1000;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px; padding:0px;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id02a').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <h2 style="color:#60c; text-decoration:underline;" class="fonti"> <span class="fa fa-edit"></span> Update Child Age</h2>
      </div><br>


  <?php
       if (isset($_POST['vage'])){
					 
					 //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

$email=test_input($_POST["email"]);
$vacage=test_input($_POST["vacage"]);

        $senddata2 = mysqli_query($con,"UPDATE usr SET vaccage = '".mysqli_real_escape_string($con,$vacage)."'  where email ='".mysqli_real_escape_string($con,$email)."' ");

        if(@$senddata2){
    echo"<script>alert('Age Was Updated succesfully')</script>";
                    
     echo "<meta http-equiv='Refresh' content='1; url=profile.php'>";                    
           }    
}
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="col-md-6">
								
                
                    <select style="font-size:15px;" name="vacage" class="form-control" required="required">
                      <option value="">Child's age in month</option>
                      <option value="1">0-1 month</option>
                      <option value="6">6 months</option>
                      <option value="12">12 months</option>
                      <option value="24">24 months and more</option>
                      <?php
                        $mysqli1="select * from  imm_uze where stage='$stage' ";
                        $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
                        while($row2 = mysqli_fetch_object($myquery1)){
                      ?>
                      <option value="<?php echo $row2->vaccage; ?>"><?php echo $row2->vaccage; ?></option>
                        <?php } ?>
                    </select>
                  
                  
									<input type="email" value="<?php echo $mail; ?>" name="email" class="comment_input form-control" required="required" readonly="readonly" style="display:none;"><br>
									
									<button type="submit" name="vage" class=" trans_200 form-control btn-primary w3-text-white" ><b>Update Age</b></button><br><br>
				</form>      
      <div class="w3-container w3-border-top w3-padding-16" style="background:#60c;">
        <button onclick="document.getElementById('id02a').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
	  </div>

    </div>
  </div>
        </th>
				</tr>
<!-- THE END -->			


				<tr>
				<th>Email</th>
				<th><?php echo $fetch['email']; ?></th>
				</tr>
				<tr>
				<th>Stage</th>
				<th><?php echo $fetch['stage']; ?></th>
				</tr>
				<!--<tr>
				<th>Department</th>
				<th><?php //echo $fetch['dept']; ?></th>
				</tr>-->
				
				<tr>
				<th>Phone</th>
				<th><?php echo $fetch['phone']; ?>&nbsp;&nbsp;
        <span onclick="document.getElementById('id03').style.display='block'" title="Edit Phone Number"     class="" style=" background:none; color:#000; border:none; cursor: pointer;">
          Edit <span class="fa fa-phone"></span>
          </span>

  <!-- ============**************** Phone ============**************** -->
  <div id="id03" class="w3-modal w3-padding" style="z-index:1000;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px; padding:0px;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <h2 style="color:lime; text-decoration:underline;" class="fonti"> <span class="fa fa-phone"></span> Change Phone Number</h2>
      </div><br>


  <?php
       if (isset($_POST['pho'])){
					 
					 //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

$email=test_input($_POST["email"]);
$phone=test_input($_POST["phone"]);

        $senddata2 = mysqli_query($con,"UPDATE usr SET phone = '".mysqli_real_escape_string($con,$phone)."'  where email ='".mysqli_real_escape_string($con,$email)."' ");

        if(@$senddata2){
    echo"<script>alert('Phone Number Was Updated succesfully')</script>";
                    
    echo "<meta http-equiv='Refresh' content='1; url=profile.php'>";                    
           }    
}
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="col-md-6">
								
                  <input type="text" placeholder="Phone Number" name="phone" class="comment_input form-control" required="required" min="11" max="11"><br>
                              
									<input type="email" value="<?php echo $mail; ?>" name="email" class="comment_input form-control" required="required" readonly="readonly" style="display:none;"><br>
									
									<button type="submit" name="pho" class=" trans_200 form-control btn-primary w3-text-white" ><b>Update Phone Number</b></button><br><br>
				</form>      
      <div class="w3-container w3-border-top w3-padding-16" style="background:lime;">
        <button onclick="document.getElementById('id03').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
	  </div>

    </div>
  </div>
<!-- THE END -->			

        </th>
				</tr>

        <tr>
				<th>Address</th>
				<th><?php echo $fetch['addr']; ?>&nbsp;&nbsp;
        <span onclick="document.getElementById('id04').style.display='block'" title="Edit Address"     class="" style=" background:none; color:#000; border:none; cursor: pointer;">
          Edit <span class="fa fa-map-signs"></span>
          </span>
  <!-- ============**************** Address ============**************** -->
  <div id="id04" class="w3-modal w3-padding" style="z-index:1000;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px; padding:0px;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id04').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <h2 style="color:#663399; text-decoration:underline;" class="fonti"> <span class="fa fa-map-signs"></span> Change Address</h2>
      </div><br>


  <?php
       if (isset($_POST['adr'])){
					 
					 //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

$addr=test_input($_POST["addr"]);
$email=test_input($_POST["email"]);

        $senddata2 = mysqli_query($con,"UPDATE usr SET addr = '".mysqli_real_escape_string($con,$addr)."'  where email ='".mysqli_real_escape_string($con,$email)."' ");

        if(@$senddata2){
    echo"<script>alert('Address Was Updated succesfully')</script>";
                    
    echo "<meta http-equiv='Refresh' content='1; url=profile.php'>";
    
           }    
}
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="col-md-6">
								
                  <input type="text" placeholder="Address" name="addr" class="comment_input form-control" required="required"><br>
                              
									<input type="email" value="<?php echo $mail; ?>" name="email" class="comment_input form-control" required="required" readonly="readonly" style="display:none;"><br>
									
									<button type="submit" name="adr" class=" trans_200 form-control btn-primary w3-text-white" ><b>Update Address</b></button><br><br>
				</form>      
      <div class="w3-container w3-border-top w3-padding-16" style="background:#663399;">
        <button onclick="document.getElementById('id04').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
	  </div>

    </div>
  </div>
<!-- THE END -->			
      
        </th>
				</tr>

        <tr>
				<th>State</th>
				<th><?php echo $fetch['state']; ?>&nbsp;&nbsp;
        <span onclick="document.getElementById('id05').style.display='block'" title="Edit State"     class="" style=" background:none; color:#000; border:none; cursor: pointer;">
          Edit <span class="fa fa-map"></span>
          </span>
        <!-- ============**************** Address ============**************** -->
  <div id="id05" class="w3-modal w3-padding" style="z-index:1000;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px; padding:0px;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id05').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <h2 style="color:#ff00bf; text-decoration:underline;" class="fonti"> <span class="fa fa-map"></span> Change State</h2>
      </div><br>


  <?php
       if (isset($_POST['sta'])){
					 
					 //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

$email=test_input($_POST["email"]);
$state=test_input($_POST["state"]);

        $senddata2 = mysqli_query($con,"UPDATE usr SET state = '".mysqli_real_escape_string($con,$state)."'  where email ='".mysqli_real_escape_string($con,$email)."' ");

        if(@$senddata2){
    echo"<script>alert('State Was Updated succesfully')</script>";
                    
     echo "<meta http-equiv='Refresh' content='1; url=profile.php'>";                    
           }    
}
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="col-md-6">
								
                  <input type="text" placeholder="State" name="state" class="comment_input form-control" required="required"><br>
                              
									<input type="email" value="<?php echo $mail; ?>" name="email" class="comment_input form-control" required="required" readonly="readonly" style="display:none;"><br>
									
									<button type="submit" name="sta" class=" trans_200 form-control btn-primary w3-text-white" ><b>Update State</b></button><br><br>
				</form>      
      <div class="w3-container w3-border-top w3-padding-16" style="background:#ff00bf;">
        <button onclick="document.getElementById('id05').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
	  </div>

    </div>
  </div>
<!-- THE END -->
        </th>
				</tr>

				
				<?php } ?>
				</table>
				</center>
				  </div>
				  <br>
				 
                 
                </div>
              </div>
            </div>
			
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            

          
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include "connect/foot.php"; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>