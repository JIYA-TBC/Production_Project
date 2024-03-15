<?php
session_start();
include "session_a.php";
include"../../connect.php";


if (!isset($_SESSION['passiw'])){
  header("location:../index.php");
  exit();
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <link rel="icon" href="img/logo-01.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>View Mothers - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../w3.css">
  <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../users/learn/css/main.css">
  <link href="../../users/learn/font-awesome/css/font-awesome.css" rel="stylesheet" />


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
            <h1 class="h3 mb-0 text-gray-800">View and send SMS for <?php echo $stage; ?> Mothers</h1>
            
          </div>
          <div class="row">

<div class="col-md-3"></div>

<div class="col-md-6">
<p style="font-size: 1.0rem;"><b>Please Note that you can use this account to View and send SMS for <span style="color:#4e73df"><?php echo $stage;?></span> Mothers only.</b></p>
<br>

<!-- <?php
             
                 if (isset($_POST['addweek'])){
           
           //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends
         
      $week=test_input($_POST["week"]);      
	  $check2=mysqli_query($con,"select * from wee_k where week LIKE '%".mysqli_real_escape_string($con,$week)."%' ");

    $row2=mysqli_num_rows($check2);
    
if($row2 > 0 ){
         echo"<script>alert('There is a similar week... Do change it')</script>";
         
    }
	
	else{	
$senddata2 = mysqli_query($con,"insert into wee_k (level,week) values
    ('".mysqli_real_escape_string($con,$stage)."','".mysqli_real_escape_string($con,$week)."'
)")or die(mysqli_error($con));	
	}
	
	if(@$senddata2){
	echo"<script>alert('week successfully added for $stage')</script>";	
	}
	else{
		echo"<script>alert('An error occured')</script>";
	}
				 }
	  
	  ?>

                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control" name="week" placeholder="Enter Week e.g Week 1..." required="">
                    </div>
					
                    <button class="btn btn-primary btn-user" name="addweek"><b>
                      Add Week</b>
                    </button>
                    <hr>
                  
                   
                  </form> -->
          
          </div>
      </div>
      
		  <br></br>
		  <div class="row container">
      <div class="col-md-2"></div>
		  <div class="col-md-6 card mb-4 pr-1 pl-1" style="">
      <div class=" bg-primary pt-3 pb-2 mb-4 text-white text-center">
          <h6 style="font-weight: bold;">Send Immunization SMS</h6>
      </div>

                  <?php
                    if (isset($_POST['vag'])){
                      $vacc=$_POST['vacc'];

                      $check2=mysqli_query($con,"select * from usr where vaccage LIKE '%".mysqli_real_escape_string($con,$vacc)."%' ");

                      $row2=mysqli_num_rows($check2);
    
                      if($row2 == !'".mysqli_real_escape_string($con,$vacc)."' ){
                              echo"<script>alert('Soory, The Age You Entered is Not Yet Avaliable ... Do change it')</script>";
                              
                          }

                      // $update = mysqli_query($con,"UPDATE usr SET status = 'YES' where vaccage='".mysqli_real_escape_string($con,$vacc)."' and stage='$stage' ");         
                      // if($update == 'YES'){
                        // }
                      else{
                        echo "<script> alert('$vacc Immunization SMS Has been Sent!')</script>";

                      }
                    }
                  ?>  
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method='POST'>

            <select style="opacity:0.6;" name="vacc" class="form-control comment_input mb-4" required="required">
            <option value=""> Choose Vaccine Age</option>
            <?php
              $mysqli1="select * from  imm_uze where stage='$stage' ";
              $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
              while($row2 = mysqli_fetch_object($myquery1)){
            ?>
            <option value="<?php echo $row2->vaccage; ?>"><?php echo $row2->vaccage; ?></option>      
            <?php } ?>
            </select>
            <button class="btn btn-success mb-2" name="vag">
              Send SMS
            </button>
        </form>
      </div>
		  
      <div class="col-md-12" style="overflow-x: auto;">
      
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    
    <thead>
    <tr>
       <th>Fullname</th>
       <th>Phone</th>
       <th>Email</th>
       <th>State</th>
       <th>Address</th>
       <th>Vaccine Age</th>
	    <th>Delete</th>             
    </tr>
    </thead>
    <tbody>
<!-- php here -->
    <?php
        $mysqli1="select * from  usr where stage='$stage' ";
        $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
        while($row2 = mysqli_fetch_object($myquery1)){
   ?>
    <tr class="" style="color: #444;">    
      <td><?php echo $row2->sname." ".$row2->fname." ".$row2->mname; ?></td>
      <td><?php echo $row2->phone; ?></td>
      <td><?php echo $row2->email; ?></td>
      <td><?php echo $row2->state; ?></td>
      <td><?php echo $row2->addr; ?></td>
      <td><?php echo $row2->vaccage; ?></td>
      <td><a onclick="return confirm('Are you sure you want to delete?')" href="deletemoth.php?id=<?php echo $row2->id; ?>"><span class="fa fa-trash"></span></a></td>              
    </tr>
    <?php  } ?>

      </tbody>
    </table>
		  
		  </div>
		  
		  </div>

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
  
  <script src="js/dataTables/jquery.dataTables.js"></script>
  <script src="js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</html>