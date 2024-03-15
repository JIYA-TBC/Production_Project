<?php
session_start();
include "session_a.php";
include"../../connect.php";


if (!isset($_SESSION['passiw'])){
  header("location:../login.php");
  exit();
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <link rel="icon" href="img/faviconn.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit/Delete test questions - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../styles/main_styles.css">
  

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "connect1/head.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
         

          <!-- Topbar Search -->
          <?php include "connect1/nav.php"; ?>
          

          <!-- Topbar Navbar -->
         

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><span class="fa fa-pen"></span> Edit/ delete test question</h1>
            
          </div>

          <!-- Content Row -->
         

          <!-- Content Row -->

          

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            

<div class="col-md-4"></div>

<div class="col-md-5">

<br>



 <form action="" method="POST" class="user">

  <?php
    if(!isset($_GET['id'])){
	echo "sorry";	
	}
	
	else{
    $geti=$_GET['id'];
    $queryo=mysqli_query($con,"select * from te_st where id = '".$geti."' ");
    while($row = mysqli_fetch_array($queryo)){

    
    ?>

    <div class="form-group">
                     <textarea class="form-control " name="que" value="" rows=4 placeholder="Code (PHP code)..." required=""><?php echo $row['question']; ?></textarea>
                    </div>

                    <div class="form-group">
                     <span for="opt1">Option 1:</span>  <input type="text" id="opt1" class="form-control form-control-user" value="<?php echo $row['opt1']; ?>"  name="opt1" placeholder="option 1" required="">
                    </div>
                    <div class="form-group">
                     <span for="opt2">Option 2:</span> <input type="text" class="form-control form-control-user" id="opt2" value="<?php echo $row['opt2']; ?>"  name="opt2" placeholder="option 2" required="">
                    </div>
                     <div class="form-group">
                      <span for="opt3">Option 3:</span><input type="text" class="form-control form-control-user" id="opt3" value="<?php echo $row['opt3']; ?>"  name="opt3" placeholder="option 3" required="">
                    </div>
                     <div class="form-group">
                      <span for="opt4">Option 4:</span><input type="text" class="form-control form-control-user" id="opt4" value="<?php echo $row['opt4']; ?>"  name="opt4" placeholder="option 4" required="">
                    </div>
                    <div class="form-group">
                      <span for="ans">Answer:</span><input type="text" class="form-control form-control-user" id="ans" value="<?php echo $row['an_s']; ?>"  name="ans" placeholder="Answer" required="">
                    </div>
	<?php }}?>
					
                      
                   
                    <button class="btn btn-info btn-user btn-block" name="upd"><b>
                      Update This Text Document</b>
                    </button>

                    <button class="btn btn-danger btn-user btn-block" name="del" onclick="return confirm('Are you sure you want to delete this question?')"><b>
                     Delete This Text Document</b>
                    </button>
                    <hr>
                 
                   
                  </form>
          <!-- update question -->
		  <?php
            
                 if (isset($_POST['upd'])){
           $get=$_GET["id"];
           //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends
         
      $que=test_input($_POST["que"]);
      $opt1=test_input($_POST["opt1"]);
	  $opt2=test_input($_POST["opt2"]);
	  $opt3=test_input($_POST["opt3"]);
	  $opt4=test_input($_POST["opt4"]);
      $ans=test_input($_POST["ans"]);
	  
    
    
    
  
$senddata2 = mysqli_query($con,"UPDATE te_st SET question='".mysqli_real_escape_string($con,$que)."',
opt1='".mysqli_real_escape_string($con,$opt1)."',opt2='".mysqli_real_escape_string($con,$opt2)."',
opt3='".mysqli_real_escape_string($con,$opt3)."',opt4='".mysqli_real_escape_string($con,$opt4)."',
an_s='".mysqli_real_escape_string($con,$ans)."' WHERE id='".$get."' AND level='".$stage."' ")or die(mysqli_error($con)); 
  
  
  if(@$senddata2){
  echo"<script>alert('course successfully updated')</script>";
echo "<script> location.replace('viewtest.php')</script>";  
  }
  else{
    echo"<script>alert('An error occured')</script>";
  }
         }
    
    ?>
		  

	
	<!-- delete question -->
	 <?php
	  if(isset($_POST['del'])){
		  
		 $geto=$_GET['id'];
		$queryo3=mysqli_query($con,"delete from te_st where id = '".$geto."' ") or die(mysqli_error($con));
		
		
if($queryo3){
	echo "<script>alert('Question Deleted')</script>";
	echo "<script> location.replace('viewtest.php')</script>";
}	
else{
	echo "<script>alert('An error occured')</script>";
}	
	  }
	  
	  ?>

          
          </div>
		  </div>
		  <br></br>
		  

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include "connect1/foot.php"; ?>
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
  
  

  
  <!-- Page level plugins -->
  

  <!-- Page level custom scripts -->
  

</body>



</html>
