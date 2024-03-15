<?php
session_start();
include "session_st.php";
include"../../connect.php";


if (!isset($_SESSION['passi'])){
  header("location:../../login.php");
  exit();
} 

if(!isset($_SESSION['cur_user'])){
  $_SESSION['cur_user'] = $_SERVER['REMOTE_ADDR'];
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

  <title>Post-Partum - PDF Tutorial</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../w3.css">
  <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

  <!-- Livechat for this template-->
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- <link href="bootstrap4/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" media="screen" href="css/chat_style.css" /> 
  <script src="js/jquery-3.3.1.js"></script>
  <script src="bootstrap4/js/bootstrap.js"></script>
  <script src="js/main.js"></script> -->
  <!-- Livechat end-->


</head>

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

          <!-- Sidebar Toggle (Topbar) -->
         

          <!-- Topbar Search -->
          

          <!-- Topbar Navbar -->
          <?php include "connect/nav.php"; ?>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">PDFs / Docxs / Images Tutorial</h1>
            
          </div>

          <!-- Content Row -->
        

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            

            <!-- Pie Chart -->
			
			
            <div class="col-xl-12 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3  flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">PDFs / Docxs / Images Tutorials</h6>
                  <div class="dropdown no-arrow">
                   
                   
                  </div>
                </div>
    <!-- Card Body -->
    <div class="card-body">

				 <!-- SUBJECT -->
         <?php include "function/subj.php"; ?>    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php include "connect/foot.php"; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>