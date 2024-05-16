<?php
session_start();
include "session_st.php";

include "../../connect.php";
include "count.php";

if (!isset($_SESSION['passi'])) {
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

  <title>PMS E-learn - Change Password</title>

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
        <div class="sidebar-brand-text mx-3">PMS E-Learn </div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
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
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Tutorials</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-blue py-2 collapse-inner rounded">
            <h6 class="collapse-header">Learning Format:</h6>

            <a class="collapse-item" href="text.php">Text</a>
            <a class="collapse-item" href="videos.php">Videos</a>
            <a class="collapse-item" href="pdf.php">PDFs</a>
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
            <h6 class="collapse-header">Test Your Ability:</h6>
            <a class="collapse-item" href="test.php">Test</a>
            <a class="collapse-item" href="exam.php">Exam</a>
          </div>
        </div>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Settings</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="profile.php">Profile</a>
            <a class="collapse-item" href="changepass.php">Change Password</a>
            <a class="collapse-item" href="editprofile.php">Edit Profile</a>
            <a class="collapse-item" href="activity.php">Activity Login</a>
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure you want to logout?')">
          <i class="fas fa-fw fa-trash"></i>
          <span>Logout</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button id="sidebarToggle" style="border-radius: 20px;"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

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
                    <span class="font-weight-bold"><?php echo $sn; ?>, Welcome to PHP E-Learn</span>
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
                    <div class="text-truncat"><?php echo $sn . ", you registered as " . $stage; ?></div>
                    <div class="small text-gray-500">Some Moment Ago</div>
                  </div>
                </a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $sn . " " . $fn; ?></span>
                <img src="../../<?php echo $pi; ?>" class="img-profile rounded-circle">
              </a>
            </li>
          </ul>
        </nav>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
          </div>
          <div class="row">
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $sn . "'s"; ?> Domain</h6>
                  <div class="dropdown no-arrow"><span class="fa fa-user"></span></div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div style="">

                    <form action="" method="POST">
                      <div class="form-group">
                        <input class="form-control" placeholder="Old Password" name="old" type="text" required>
                      </div>
                      <div class="form-group">
                        <input class="form-control" placeholder="New Password" name="new" type="password" required>
                      </div>
                      <button class="btn btn-info" name="change" type="submit">Change Password</button>
                    </form>

                    <?php

                    if (isset($_POST['change'])) {
                      function test_input($data)
                      {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                      }

                      $old = test_input($_POST['old']);
                      $new = test_input($_POST['new']);

                      $query = mysqli_query($con, "select pass from usr where pass='$old' AND user_id='$us'") or die(mysqli_error($con));

                      $check = mysqli_num_rows($query);

                      if ($check > 0) {
                        $queryup = mysqli_query($con, "UPDATE usr SET pass='$new' where user_id='$us'");
                      } else {
                        echo "<p style='color:red;'>That is not your old password</p>";
                      }
                      if (@$queryup) {
                        echo "<script>alert('your password has been changed from $old to $new.. You will be automatically Logged out')</script>";
                        echo "<script>location.replace('logout.php')</script>";
                      } else {
                        echo "<script>alert('An error Occured')</script>";
                      }
                    }
                    ?>
                  </div>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PMS E-Learn <?php echo date("y"); ?> ~~ Developed By <a href="www.facebook.com/jcworld55">JC WORLD</a></span>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>

</html>