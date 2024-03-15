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

  <title>EMP E-learn - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../styles/main_styles.css">
  

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
          <?php include "connect1/nav.php"; ?>
          

          <!-- Topbar Navbar -->
         

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Upload Test questions &nbsp;&nbsp;&nbsp;&nbsp;<a href="viewtest.php"><button class="btn btn-success">View Already Set Tests</button></a></h1>
            
          </div>

          <!-- Content Row -->
          
          <!-- Content Row -->

          

          <!-- Content Row -->
          <div class="row">
		  
		  <div class="col-md-6">


		  
		  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control qui" name="number" placeholder="Number of question to set" required="">
                    </div>
                   
                    <button class="btn btn-success btn-user qui" name="pro"><b>
                      PROCEED</b>
                    </button><br>
          </form>
          
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method='POST'>
          
          <br>
                    <select style="opacity:0.6;" name="subj" class="form-control comment_input" required="required">
                      <option value="">-------------- Choose Subject ----------</option>
                      <?php
                        $mysqli1="select * from  sub_j where level='$stage' ";
                        $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
                        while($row2 = mysqli_fetch_object($myquery1)){
                      ?>
                      <option value="<?php echo $row2->subject; ?>"><?php echo $row2->subject; ?></option>      <?php } ?>
                    </select><br>
 		
					<?php

					 if(isset($_POST["pro"])){
					 	$num=$_POST["number"];

					 	if ($num <= 20) {

					 		echo "<style>.qui{display:none;}</style>";

					 	for ($i=1; $i <= $num ; $i++) { 
					 		
					 		echo "<textarea placeholder='Question $i' name='question[]' class='form-control' rows=5 required='' ></textarea><br>";
					 		echo "<span class='form-inline'>";
					 		echo "<input type='text' class='form-control' name='option1[]'  placeholder='option 1' required=''>";
					 		echo "<input type='text' class='form-control' name='option2[]'  placeholder='option 2' required=''>";
					 		echo "<input type='text' class='form-control' name='option3[]'  placeholder='option 3' required=''>";
					 		echo "<input type='text' class='form-control' name='option4[]'  placeholder='option 4' required=''>";
					 		echo "<select class='form-control' name='reans[]' required=''>
							<option value=''>select answer</option>
							<option value='opt1'>option 1</option>
							<option value='opt2'>option 2</option>
							<option value='opt3'>option 3</option>
							<option value='opt4'>option 4</option>
							</select>";
					 		echo "</span><hr><hr><br>";
					 	}
					 	echo " <button class='btn btn-success btn-user' name='sub'><b>
                      SUBMIT QUESTION(S)</b>
                    </button>";
                    echo "</form>";

					 	}

					 	else{
					 		echo "<script>alert('Number can not exceed 20')</script>";
					 	}
					 	

					 }


					?>

					<?php

					if (isset($_POST['sub'])){
						$val1="true";
						$val2="false";

					$count= count($_POST['question']);
          $sub= $_POST['subj'];
      
					for ($i=0; $i <$count ; $i++) { 
					
					if($_POST['reans'][$i]=="opt1"){
						$query = "INSERT INTO te_st (level,question,opt1,opt2,opt3,opt4,op1,op2,op3,op4,year,term,subject) VALUES 
('".$stage."','".mysqli_real_escape_string($con,$_POST['question'][$i])."','".mysqli_real_escape_string($con,$_POST['option1'][$i])."',
'".mysqli_real_escape_string($con,$_POST['option2'][$i])."','".mysqli_real_escape_string($con,$_POST['option3'][$i])."',
'".mysqli_real_escape_string($con,$_POST['option4'][$i])."','".$val1."','".$val2."','".$val2."','".$val2."','".$yr."','".$tm."','".$sub."') ";
     
     $enter=mysqli_query($con,$query) or die(mysqli_error($con));
						
					}
					
					elseif($_POST['reans'][$i]=="opt2"){
						
						$query = "INSERT INTO te_st (level,question,opt1,opt2,opt3,opt4,op1,op2,op3,op4,year,term,subject) VALUES 
('".$stage."','".mysqli_real_escape_string($con,$_POST['question'][$i])."','".mysqli_real_escape_string($con,$_POST['option1'][$i])."',
'".mysqli_real_escape_string($con,$_POST['option2'][$i])."','".mysqli_real_escape_string($con,$_POST['option3'][$i])."',
'".mysqli_real_escape_string($con,$_POST['option4'][$i])."','".$val2."','".$val1."','".$val2."','".$val2."','".$yr."','".$tm."','".$sub."') ";
     
     $enter=mysqli_query($con,$query) or die(mysqli_error($con));
						
					}
					
					elseif($_POST['reans'][$i]=="opt3"){
						
$query = "INSERT INTO te_st (level,question,opt1,opt2,opt3,opt4,op1,op2,op3,op4,year,term,subject) VALUES 
('".$stage."','".mysqli_real_escape_string($con,$_POST['question'][$i])."','".mysqli_real_escape_string($con,$_POST['option1'][$i])."',
'".mysqli_real_escape_string($con,$_POST['option2'][$i])."','".mysqli_real_escape_string($con,$_POST['option3'][$i])."',
'".mysqli_real_escape_string($con,$_POST['option4'][$i])."','".$val2."','".$val2."','".$val1."','".$val2."','".$yr."','".$tm."','".$sub."') ";
     
     $enter=mysqli_query($con,$query) or die(mysqli_error($con));					
					
					}
					
					elseif($_POST['reans'][$i]=="opt4"){
						
					$query = "INSERT INTO te_st (level,question,opt1,opt2,opt3,opt4,op1,op2,op3,op4,year,term,subject) VALUES 
('".$stage."','".mysqli_real_escape_string($con,$_POST['question'][$i])."','".mysqli_real_escape_string($con,$_POST['option1'][$i])."',
'".mysqli_real_escape_string($con,$_POST['option2'][$i])."','".mysqli_real_escape_string($con,$_POST['option3'][$i])."',
'".mysqli_real_escape_string($con,$_POST['option4'][$i])."','".$val2."','".$val2."','".$val2."','".$val1."','".$yr."','".$tm."','".$sub."') ";
     
     $enter=mysqli_query($con,$query) or die(mysqli_error($con));		
					}
					
						


					}

if($enter){
	echo "<script>alert('Good..Test set!')</script>";

}
else{
	echo "<script>alert('An error occured')</script>";
}


}

					?>
					
					
</div>
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
</body>
</html>