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
 <link rel="icon" href="img/faviconn.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EMP E-learn - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../styles/main_styles.css">

<!-- Livechat for this template-->
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="bootstrap4/css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" media="screen" href="css/chat_style.css" /> 
<script src="js/jquery-3.3.1.js"></script>
<script src="bootstrap4/js/bootstrap.js"></script>
<script src="js/main.js"></script>
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
          <!-- Topbar Navbar -->
          <?php include "connect/nav.php"; ?>
        </nav>
        <div class="container-fluid">
          <div class="row">			
            <div class="col-xl-8 col-lg-8">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Activity Login</h6>
                  <div class="dropdown no-arrow"><span class="fa fa-bell"></span></div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
				<div style="height:200px;overflow-x: scroll;">
				<?php
				$myfile = fopen("../".$mail."/log.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
				?></div>
				  <br></div>
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
  <?php
        include_once('foot.php');
    ?>
</body>
</html>