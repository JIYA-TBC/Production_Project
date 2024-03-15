<?php
session_start();
include "../../session_st.php";
include"../../../../connect.php";


if (!isset($_SESSION['passi'])){
  header("location:../../../../login.php");
  exit();
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <link rel="icon" href="../../img/faviconn.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PMS E-learn - Text Tutorial</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../edit.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../styles/main_styles.css">

  <!-- Livechat for this template-->
  <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="../../bootstrap4/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" media="screen" href="../../css/chat_style.css" /> 
  <script src="../../js/jquery-3.3.1.js"></script>
  <script src="../../bootstrap4/js/bootstrap.js"></script>
  <script src="../../js/main.js"></script>
  <!-- Livechat end-->

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

.prec{
	line-height:1.2em;
  background:linear-gradient(180deg,#eee 0,#eee 1.2em,#eee 0);
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
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <span class="fas glyphicon glyphicon-edit"></span>
  </div>
  <div class="sidebar-brand-text mx-3">EMP E-Learn </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="../../index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Heading -->
<div class="sidebar-heading">
  Menu
</div>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-book"></i>
    <span>Tutorials</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Learning Format:</h6>
<a class="collapse-item" href="../../text.php">Text</a>
      <a class="collapse-item" href="../../videos.php">Videos</a>
      <a class="collapse-item" href="../../videolink.php">Video Links</a>
      <a class="collapse-item" href="../../pdf.php">PDFs / Docxs / Images</a>
    </div>
  </div>
</li>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-cogs"></i>
    <span>Settings</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
     
      <a class="collapse-item" href="../../profile.php">Profile</a>
      
<a class="collapse-item" href="../../activity.php">Activity Login</a>
      <div class="collapse-divider"></div>
      
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="../../logout.php" onclick="return confirm('Are you sure you want to logout?')">
    <i class="fas fa-fw fa-power-off"></i>
    <span>Logout</span></a>
</li>
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
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">1+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notifications
                </h6>
				
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo date("d M, Y"); ?></div>
                    <span class="font-weight-bold"><?php echo $sn; ?>, Welcome to PMS E-Learn</span>
                  </div>
                </a>
               
               
                
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">1</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Messages
                </h6>
                
               
              
                <a class="dropdown-item d-flex align-items-center" href="#">
                 
                  <div>
                    <div class="text-truncat"><?php echo $sn.", you registered as ".$stage; ?></div>
                    <div class="small text-gray-500">Some Moment Ago</div>
                  </div>
                </a>
               
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $sn." ".$fn; ?></span>
                <img  src="../../../../<?php echo $pi; ?>" class="img-profile rounded-circle" >
              </a>
              <!-- Dropdown - User Information -->
              
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Text Tutorial</h1>
            
          </div>

          <!-- Content Row -->
        

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            

            <!-- Pie Chart -->
			
			
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
				
				<div class="col-md-4">
				
				
				<ul type="none" >
				<center>
				<li class="resi"><?php echo $stage; ?> Tutorial</li>
				
				<?php
$query="select * from  text_tutor where level='".$stage."' order by id desc";
$runquery=mysqli_query($con, $query) or die(mysqli_error($con));
while($counttot=mysqli_fetch_array($runquery)){

?>	
				<li class="resi"><a href="?uniqlearn=<?php echo $counttot['uniqlearn']; ?>" class="lin"><?php echo $counttot['topic']; ?></a></li>
<?php } ?>
				
				</center>
				</ul>
				</div>
	

	<div class="col-md-8">
	
	<?php
@$get=$_GET['uniqlearn'];
$link="php/tryit/?uniqlearn=".$get;

$query="select * from  text_tutor where level='".$stage."' AND uniqlearn='".$get."' ";
$runquery=mysqli_query($con, $query) or die(mysqli_error($con));
$update_query=mysqli_query($con,"UPDATE pick_off SET link_in='$link' WHERE user_id='$us'") or die(mysqli_error($con));

while($counttot=mysqli_fetch_assoc($runquery)){

?>	
	
	<pre class="prec">
	<h3 style="color:#66cc00;"><?php echo $counttot['topic']; ?></h3>
	<p><?php echo $counttot['body']; ?></p>
	
  </pre>
  

<?php } ?></div>
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
      <footer class="sticky-footer" style="background: #ccc;">
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
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>
  
  <script>
  w3CodeColor(document.getElementById("myDiv"));
  <?php include "../../js/highlighter.js"; ?>
  </script>
</body>
</html>