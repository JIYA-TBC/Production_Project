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

  <title>Post Partum - Question</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../w3.css">
  <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

  <!-- Livechat for this template-->
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
          

          <!-- Topbar Navbar -->
          <?php include "connect/nav.php"; ?>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ask Question / Complain </h1>
            
          </div>
          <div class="row">
			
            <div class="col-xl-12 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Question / Complain</h6>
                  <div class="dropdown no-arrow">
                   
                   
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
				<div class="row pb-5">
						<div class="col-md-2"></div>
        <div class="col-md-6" style="border:1px solid #ccc; padding:20px;">

        <?php
             
             if (isset($_POST['assin'])){
       
       //form validation to avoid exploit
function test_input($data) {
     $data = trim($data);
   $data = stripslashes($data);
 $data = htmlspecialchars($data);
return $data;
}
//exploit ends
     
  $top=test_input($_POST["title"]);
  $text=test_input($_POST["qus"]);
  $fullname=test_input($_POST["fname"]);
  $date=test_input($_POST["dat"]);
  
 
 
$senddata2 = mysqli_query($con,"insert into que_st (stage,title,question,fullname,questdate,email) values
('".mysqli_real_escape_string($con,$stage)."','".mysqli_real_escape_string($con,$top)."','".mysqli_real_escape_string($con,$text)."','".mysqli_real_escape_string($con,$fullname)."','".mysqli_real_escape_string($con,$date)."','".mysqli_real_escape_string($con,$mail)."')")or die(mysqli_error($con));	


if(@$senddata2){
echo"<script>alert('$fn, question was successfully Submitted')</script>";	
}
else{
echo"<script>alert('An error occured')</script>";
}
     }

?>
				    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="user">
                    
                    <div class="form-group">
                      <input type="text" class="form-control form-control" name="title" placeholder="Title..." required="">
                    </div>
                    
                    
					          <div class="form-group" >
                     <textarea style="resize:none;" class="form-control " name="qus" rows=4 placeholder="Enter question / complain here..."></textarea>
                    </div>
                    
                    <div class="form-group">
                      <input type="hidden" class="form-control form-control" name="dat" value="<?php echo date("d M, Y"); ?>" readonly="readonly">
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control form-control" name="fname" value="<?php echo $sn." ".$fn." ".$ln; ?>" readonly="readonly">
                    </div>

                    <button class="btn btn-primary btn-user btn-block" name="assin"><b><span class="fa fa-send"></span> Submit</b>
                    </button>

                    <hr> 
                    </div>                 
              </form>
                 
	</div>
    <div class="row">
						
      <div class="col-md-9" style="overflow-x: auto;" >
        <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%;">
    
        <thead>
        <tr>
        <th>Fullname</th>
        <th>Title</th>
        <th>Question</th>
        <th> View</th>     
        <th>Status</th>
	      <th>Delete</th>        
        </tr>
        </thead>
      <tbody>
      <!-- php here -->
      <?php
          $mysqli1="select * from  que_st where stage='$stage' and email='$mail' ";
          $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
          while($row2 = mysqli_fetch_object($myquery1)){

      ?>
      <tr class="" style="color: #444;">    
          <td><?php echo $row2->fullname; ?></td>
          <td><?php echo $row2->title; ?></td>
          <td><?php echo $row2->question; ?></td>
          <td>
            <?php
            if($row2->status == "Replied"){ 

            echo "<div style='text-align: center;'><a href='assinview.php?id=$row2->id;'><span class='fa fa-eye text-primary'></span></a></div>"; 
            }else{ 
              echo "<div style='text-align: center; cursor: not-allowed;'><span class='fa fa-eye-slash text-danger' '></span></div>"; 
              }
            ?>
          </td>
          <td><?php echo $row2->status; ?></td>
          <td><a onclick="return confirm('Are you sure you want to delete?')" href="deletepdf.php?id=<?php echo $row2->id; ?>"><span class="fa fa-trash"></span></a></td>
                  
      </tr>
      <?php  } ?>

      </tbody>
    </table>
				 
	</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php include "connect/foot.php"; ?>
    </div>
  </div>

  <script src="../../adm/s/js/dataTables/jquery.dataTables.js"></script>
  <script src="../../adm/s/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</body>
</html>