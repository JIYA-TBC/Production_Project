<?php
session_start();
include "session_st.php";
include "../../connect.php";


if (!isset($_SESSION['passi'])) {
    header("location:../../login.php");
    exit();
}

if (!isset($_SESSION['cur_user'])) {
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
                                
                                <div class="col-md-6">
			<div class="w3-card">
                    <div class="w3-container w3-blue text-center pt-3 pb-2" >
                        <h6 style="font-weight: bold;">Immunization Vaccine and Age</h6>
                    </div>
                    <div class="" >
                        <table class="table table-striped table-bordered table-hover" >
                                <thead>
                                <tr>
                                <th>Vaccine Name</th>
                                <th>Vaccine Age in weeks</th>
                                </tr>
                                </thead>
                            <tbody>
                        <!-- php here -->
                        <?php
                            $mysqli1="select * from  imm_uze where stage ='$stage' ";
                            $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
                            while($row2 = mysqli_fetch_object($myquery1)){

                        ?>
                                <tr class="">    
                                <td><?php echo $row2->vaccname; ?></td>
                                <td><?php echo $row2->vaccage; ?></td>
                                </tr>
                        <?php  } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
      <br>
      <?php //cert(); ?>
			</div>
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
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>
</body>

</html>