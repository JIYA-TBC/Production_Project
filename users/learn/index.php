<?php
session_start();
include "session_st.php";

include "../../connect.php";
include "count.php";

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

  <title>Post-Partum - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../w3.css">
  <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
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
          <?php include "connect/nav.php"; ?>
          <!-- Topbar Navbar -->

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
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xm font-weight-bold text-info text-uppercase mb-1"><?php echo $fn; ?>'s Profile</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"> 
                            <span class="">
                            <?php  
                              $queryall= "select * from usr WHERE stage='$stage' and email='$mail' ";
                              $runquery=mysqli_query($con, $queryall) or die(mysqli_error($con));
                              while($fetch=mysqli_fetch_object($runquery)){                  
                            ?>
                            <span> 
                              <?php
                              if($fetch->vaccage == ""){
                                echo "<script>alert('$fn, please update your child age, by going to your profile, so to get Messages on when to come for Immunization, Thanks.')</script>";
                                include "function/pro.php";
                               
                              }else{
                               include "function/pro.php";
                                
                              }
                              
                              ?>
                            </span>
                            <?php } ?>
                            </span>
                          </div><br>
                          <div class="h6 mb-0 mr-0 text-gray-800"> 
                          
                            <a style="text-decoration:none;" href="profile.php">Click here to edit your profile</a>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
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
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xm font-weight-bold text-success text-uppercase mb-1">Doctor</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php  
                          $queryall= "select * from ad_in WHERE stage='$stage' " ;
                          $runquery=mysqli_query($con, $queryall) or die(mysqli_error($con));
                          while($fetch=mysqli_fetch_object($runquery)){                  
                        ?>
                        <span> <?php echo $fetch->fullname; ?> </span><br/>
                          <?php } ?>
                       </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">			
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Note Reminder</h6>
                  <div class="dropdown no-arrow">
                </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
				<div style="height:200px;overflow-x: scroll;">
				<?php
				$queryall=mysqli_query($con,"select * from no_te WHERE user_id='$us' ORDER BY id DESC ");
				while($fetch_res=mysqli_fetch_assoc($queryall)){

				?>
                 <p><?php echo $fetch_res['note'];  ?> <span class="badge" style="background-color:#1cd1c4;">
				 <?php echo $fetch_res['date']; ?></span>&nbsp;&nbsp;<a href="index.php?id=<?php echo $fetch_res['id']; ?>"
				 onclick="return confirm('Delete Note?')"><span class="fa fa-trash"></span></a></p><hr/> 
				<?php } ?>
				  </div>
				  <br>
				  <form action="" method="POST">
				  <textarea class="form-control" name="note" placeholder="Add a Note..." required></textarea><br>
				  <button class="btn btn-info" name="an"><span class="fa fa-plus"></span></button>
				  </form>
				  <?php

					if (isset($_POST['an'])){
						
						function valid($valid){
							$valid=stripslashes($valid);
							$valid = trim($valid);
      
								$valid = htmlspecialchars($valid);
							return $valid;
						}
						
						$not=valid($_POST['note']);
						$date=date("d M, Y");
						
						$enter=mysqli_query($con,"INSERT INTO no_te (user_id,note,date) VALUES 
						('$us','".mysqli_real_escape_string($con,$not)."','$date') ") or die(mysqli_error($con));
						
						if($enter==TRUE){
							
						echo "<script>alert('Note Added!')</script>";
						echo "<meta http-equiv='Refresh' content='0; url=index.php'>";

}
else{
	echo "<script>alert('Sorry, An error occured')</script>";
}
					}
						?>
		<?php
if(!empty($_GET["id"])) {
	$result = mysqli_query($con,"DELETE FROM no_te WHERE id='".$_GET["id"]."' AND user_id='$us' ");
	}
	
	if(!empty($result)){
		
		echo "<script> alert('Note deleted!')</script>";
		echo "<meta http-equiv='Refresh' content='0; url=index.php'>";
	}

?>		               
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