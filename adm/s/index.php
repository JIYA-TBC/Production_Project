<?php
session_start();
include "session_a.php";
include "../../connect.php";


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

  <title>Postnatal - Admin Dashboard</title>

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
          

          <!-- Topbar Navbar -->
          <?php include "connect1/nav.php"; ?>
         

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card shadow h-100 py-2" style="border-left:3px solid #330099">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xm font-weight-bold text-uppercase mb-1" style="color:#330099;">Profile</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $fname; ?></div>
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ph; ?></div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xm font-weight-bold text-primary text-uppercase mb-1">Department</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $stage; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      
                      <div class="text-xm font-weight-bold text-primary text-uppercase mb-1">Registered Mothers</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        
                      <?php
                      $query="select * from usr";
                      $runquery=mysqli_query($con, $query) or die(mysqli_error($con));
                      $counttot=mysqli_num_rows($runquery);
                      echo $counttot;
                      ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <!-- Pending Requests Card Example -->
            
          </div>

          <!-- Content Row -->

          

          <!-- Content Row -->
          <div class="row container">

            <!-- Content Column -->
            <p style="font-size: 1.0rem;"><b>Please Note that you can use this account to Formate <span style="color:#330099"><?php echo $stage;?></span> Informations.</b></p>

          
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

  
  <!-- Page level plugins -->
  

  <!-- Page level custom scripts -->
  

</body>



</html>
