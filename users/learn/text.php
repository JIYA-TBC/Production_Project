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
 <link rel="icon" href="img/faviconn.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PMS E-learn - Text Tutorial</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../w3.css">
  <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<style>
.resi{
	padding:3px;
	font-size:1.0rem;
	background-color: #f8f9fc;
	border-bottom:1px solid gray;
	
}

.lin{
	color:#45b88e;
	text-decoration:none;
	
	transition:2s;
}
.lin:hover{
	color:black;
	text-decoration:none;
	transition:2s;
}
.pre{
	line-height:1.2em;
  background:linear-gradient(180deg,#ccc 0,#ccc 1.2em,#eee 0);
  background-size:2.4em 2.4em;
  background-origin:content-box;
  
	font-family:Arial;
	font-size:18px;
	padding: 0 20px;
	text-align:justify;
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
          <?php include "connect/nav.php"; ?>

        </nav>
        <div class="">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Text Tutorial</h1>
            
          </div>
          <div class="row">			
            <div class="col-xl-12 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Topics for <?php echo $stage; ?></h6>
                  <div class="dropdown no-arrow">
                   
                   
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
				<div class="row">
				
				<div class="col-md-12">
				<ul type="none" >
				<li class="resi"><?php echo $stage; ?> Tutorial</li>
<?php include "function/subja.php"; ?>
       
				</ul>
				</div>
        </div>
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
  
  <script>
  w3CodeColor(document.getElementById("myDiv"));
  <?php include "js/highlighter.js"; ?>
  </script>
</body>
</html>