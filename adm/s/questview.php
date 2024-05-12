
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

  <title>Post-Partum - Answered Questions</title>

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
            <h1 class="h3 mb-0 text-gray-800">Reply Question</h1>
            
          </div>

          <!-- Content Row -->

          <div class="row">
            <!-- Area Chart -->
            <!-- Pie Chart -->			
             <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Reply</h6>
                  <div class="dropdown no-arrow">
                   
                   
                  </div>
                </div>

            <!-- Card Body -->
            <div class="card-body">
			<div class="row pb-5">
				<div class="col-md-2"></div>
            <div class="col-md-5" style="border:1px solid #ccc; padding:20px;">

            <?php
                        
            if (isset($_POST['rp'])){
                
            //form validation to avoid exploit
            function test_input($data) {
                $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
            //exploit ends

            $get=test_input($_POST["getid"]);          
            $text=test_input($_POST["qus"]);
                        
            $senddata2 = mysqli_query($con,"UPDATE que_st SET ans='".mysqli_real_escape_string($con,$text)."',
            status='Replied' WHERE id='".$get."' AND stage='".$stage."' ")or die(mysqli_error($con)); 
            

            if(@$senddata2){
            echo"<script>alert('question has been Answered')</script>";	
            }
            else{
            echo"<script>alert('An error occured')</script>";
            }
                }

            ?>
				    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="user">
                    
					<div class="form-group" >
                     <input type="hidden" value="<?php echo $_GET['id']; ?>" name="getid" />   
                     <textarea style="resize:none;" class="form-control " name="qus" rows=4 placeholder="Reply here..."></textarea>
                    </div>
                    
                    <button class="btn btn-primary btn-user btn-block" name="rp"><b><span class="fa fa-send"></span> Submit</b>
                    </button>

                    <hr> 
                    </div>                 
              </form>                 
    </div>
         
    <!-- Card Body -->
    <div class="row container">
						
    <div class="col-md-9 " style="overflow-x: auto;">
        <table class="table table-striped table-bordered table-hover" 
      id="dataTables-example" style="width:100%;">
    
    <thead>
       <tr>
       <th>Fullname</th>
       <th>Title</th>
       <th>Question</th>
       <th>Answer</th>
	    
                
   </tr>
</thead>
<tbody>
<!-- php here -->
<?php
    if(!isset($_GET['id'])){
	echo "sorry";	
	}
	
	else{
    $geti=$_GET['id'];
    $queryo=mysqli_query($con,"select * from que_st where id = '".$geti."' ");
    while($row = mysqli_fetch_object($queryo)){    
    ?>

   <tr class="" style="color: #444;">    
                  <td><?php echo $row->fullname; ?></td>
                  <td><?php echo $row->title; ?></td>
                  <td><?php echo $row->question; ?></td>                 
                  <td><?php echo $row->ans; ?></td>
				          
                   
                   
                </tr>
               <?php  }} ?>

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