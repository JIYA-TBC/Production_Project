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

  <title>Post-Partum - Booked Appointments</title>

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
          <!-- Topbar Navbar -->
          <?php include "connect1/nav.php"; ?>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Booked Appointments</h1>
            
          </div>

          <!-- Content Row -->

          
         
    <!-- Card Body -->
    <div class="row container">
						
    <div class="col-md-9 " style="overflow-x: auto;">
    <table class="table" id="dataTables-example" style="width:100%;">
    
    <thead>
    <tr>
    <th></th>
    <!-- <th>Delete</th>         -->
    </tr>
    </thead>
  <tbody>
  <!-- php here -->
  <?php
  // echo $fname;
  $stmt = $con->prepare("SELECT * FROM book_app WHERE dept = 'Post-Partum' AND docname = ?");
  if (!$stmt) {
    die('Prepare failed: ' . $con->error);
}
      // $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
      // while($row2 = mysqli_fetch_object($myquery1)){

        $stmt->bind_param('s', $fname);
        $stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Fetch the results
while ($row2 = $result->fetch_object()) {

  ?>
  <tr class="" style="color: #444;">    
    <td>
        <div class="row border-left-success" style="padding-left: 70px;">
        <div class="col-md-12 p-1">
            <i class="text-success"><?php echo $row2->fullname; ?></i>
        </div>
        <div class="col-md-12 p-1">
            <i><b>Note : </b></i><?php echo $row2->appnote; ?>
        </div>
        <div class="col-md-4 p-1">
            <i><b>Contact : </b></i><?php echo $row2->phone; ?>
        </div>
        <div class="col-md-8 p-1">
            <?php echo $row2->email; ?>
        </div>
        <div class="col-md-4 p-1">
            <i><b>Date & Time : </b></i><?php echo $row2->appdate; ?>
        </div>
        <div class="col-md-8 p-1">
            <?php echo $row2->apptime; ?>
        </div>
        <div class="col-md-12 p-1">
            <i><b>Status : </b></i>
            <?php
                if($row2->status == "Approved"){ 
                echo "$row2->status <span class='fa fa-check text-success'></span>"; 
                }else{ 
                    echo "$row2->status <span class='fa fa-close text-danger'></span>"; 
                }    
            ?>
        </div> 
        <div class="col-md-3 p-1">
            <a onclick="return confirm('Are you sure you want to delete?')" href="deleteapp.php?id=<?php echo $row2->id; ?>" class=" text-danger"><span class="fa fa-trash"></span> Delete</a>
        </div>
        <div class="col-md-9 p-1">
            <i><b> 
            <?php
                if($row2->status == "Approved"){ 
                echo "<a onclick='return confirm('Are you sure you want to delete?')' href='unapprove.php?id=$row2->id' class='text-success'><span class='fa fa-check'></span> Click here to Unapprove</a>";  
                }else{ 
                echo "<a onclick='return confirm('Are you sure you want to delete?')' href='approve.php?id=$row2->id' class='text-danger'><span class='fa fa-close'></span> Click here to Approve</a>"; 
                }
            ?>
            </b></i>
        </div> 
    </div> 
    </td>
    
</tr>
  <?php  } ?>

  </tbody>
</table>
             
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

  <!-- Page level plugins -->
  

  <!-- Page level custom scripts -->
  
  <!-- Livechat for this template-->
    <?php
 //       include_once('foot.php');
    ?>
 <!-- Livechat end -->


</body>

</html>
