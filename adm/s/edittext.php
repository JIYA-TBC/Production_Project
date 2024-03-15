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

  <title>Edit/Delete Text Tutorial - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <span class="fas glyphicon glyphicon-edit"></span>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN PMS E-Learn </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Tutorials</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-blue py-2 collapse-inner rounded">
            <h6 class="collapse-header">Upload Format:</h6>
			<a class="collapse-item active" href="uptext.php">Uplaod Text</a>
            <a class="collapse-item" href="upvideos.php">Upload Videos</a>
            <a class="collapse-item" href="upvideolink.php">Upload Video Links</a>
            <a class="collapse-item" href="uppdf.php">Upload PDFs / Docxs / Images</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Quiz</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-blue py-2 collapse-inner rounded">
            <h6 class="collapse-header">::::</h6>
            <a class="collapse-item" href="addexam.php">Set Exam</a>
          
          </div>
        </div>
      </li>
      

<li class="nav-item">
        <a class="nav-link" href="viewassin.php">
          <i class="fas fa-fw fa-edit"></i>
          <span>View Assignment
              <span class="badge col-sm-2" style="background:red; color:#fff;" id="badge">
                <?php
                $count="select id from ass_in where level='$stage'";
                $check=mysqli_query($con,$count);
                if($check){
                $show=mysqli_num_rows($check);
                echo $show;	
                }
                ?>
              </span>
          </span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
     

      <!-- Nav Item - Pages Collapse Menu -->
      
	  
	  <li class="nav-item">
        <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure you want to logout?')">
          <i class="fas fa-fw fa-trash"></i>
          <span>Logout</span></a>
      </li>

      <!-- Nav Item - Charts -->
      

      <!-- Nav Item - Tables -->
     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button  id="sidebarToggle" style="border-radius: 20px;"></button>
      </div>

    </ul>
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
         

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><span class="fa fa-pen"></span> Edit/ delete exam question</h1>
            
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
    $queryo=mysqli_query($con,"select * from text_tutor where id = '".$geti."' ");
    while($row = mysqli_fetch_array($queryo)){

    
    ?>

   

                    <div class="form-group">
                     <span for="top">Topic:</span>  <input type="text" id="top" class="form-control form-control-user" value="<?php echo $row['topic']; ?>"  name="top" placeholder="Topic" required="">
                    </div>
					
					 <div class="form-group">
					 <span for="bod">Body:</span> 
                     <textarea class="form-control " id="bod" name="bod"  rows=5 placeholder="Body (Write ups)..." required=""><?php echo $row['body']; ?></textarea>
                    </div>
					
					 <div class="form-group">
					 <span for="cod">Code:</span> 
                     <textarea class="form-control " name="cod" id="cod"  rows=5 placeholder="Code (PHP code)..." required=""><?php echo $row['code']; ?></textarea>
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
         
      $topic=test_input($_POST["top"]);
      $body=test_input($_POST["bod"]);
	  $code=test_input($_POST["cod"]);
	  
	  
    
    
    
  
$senddata2 = mysqli_query($con,"UPDATE text_tutor SET topic='".mysqli_real_escape_string($con,$topic)."',
body='".mysqli_real_escape_string($con,$body)."',code='".mysqli_real_escape_string($con,$code)."' WHERE id='".$get."' AND level='".$stage."' ")or die(mysqli_error($con)); 
  
  
  if(@$senddata2){
  echo"<script>alert('Text course successfully updated')</script>";
echo "<script> location.replace('uptext.php')</script>";  
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
		$queryo3=mysqli_query($con,"delete from text_tutor where id = '".$geto."' AND level='".$stage."' ") or die(mysqli_error($con));
		
		
if($queryo3){
	echo "<script>alert('Text course Deleted')</script>";
	echo "<script> location.replace('uptext.php')</script>";
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
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <span>Copyright &copy; PMS E-Learn <?php echo date("y"); ?> ~~ Developed By <a href="www.facebook.com/jcworld55">JC WORLD</a></span>
          </div>
        </div>
      </footer>
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
