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
<?php

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

  <title>Post-Partum - Book Appointment</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../w3.css">
  <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

  <!-- Livechat for this template-->
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- <link href="bootstrap4/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" media="screen" href="css/chat_style.css" /> 
  <script src="js/jquery-3.3.1.js"></script>
  <script src="bootstrap4/js/bootstrap.js"></script>
  <script src="js/main.js"></script> -->
  <!-- Livechat end-->


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
          <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
            <h1 class="h3 mb-0 text-gray-800">Book a Doctor's Appointment </h1>

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
                  <h6 class="m-0 font-weight-bold text-primary">Book Appointment</h6>
                  <div class="dropdown no-arrow">


                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row pb-5 container">
                    <div class="w3-card col-md-6" style="border:1px solid #ccc; padding:20px;">

                      <?php

                      if (isset($_POST['bk'])) {

                        //form validation to avoid exploit
                        function test_input($data)
                        {
                          $data = trim($data);
                          $data = stripslashes($data);
                          $data = htmlspecialchars($data);
                          return $data;
                        }
                        //exploit ends

                        $doc = test_input($_POST["doc"]);
                        $dept = test_input($_POST["stage"]);
                        $fullname = test_input($_POST["fullname"]);
                        $phone = test_input($_POST["phone"]);
                        $email = test_input($_POST["email"]);
                        $date = test_input($_POST["date"]);
                        $time = test_input($_POST["time"]);
                        $qus = test_input($_POST["qus"]);

                        $check2 = mysqli_query($con, "select * from book_app where appdate ='" . mysqli_real_escape_string($con, $date) . "' and apptime ='" . mysqli_real_escape_string($con, $time) . "' and docname ='" . mysqli_real_escape_string($con, $doc) . "' ");

                        $row2 = mysqli_num_rows($check2);
                        if ($row2 > 0) {
                          echo "<script>alert('Sorry this day has been booked... Do change it')</script>";
                        } else {

                          $senddata2 = mysqli_query($con, "insert into book_app (docname,dept,fullname,phone,email,appdate,apptime,appnote) values
    ('" . mysqli_real_escape_string($con, $doc) . "','" . mysqli_real_escape_string($con, $dept) . "','" . mysqli_real_escape_string($con, $fullname) . "','" . mysqli_real_escape_string($con, $phone) . "','" . mysqli_real_escape_string($con, $email) . "','" . mysqli_real_escape_string($con, $date) . "','" . mysqli_real_escape_string($con, $time) . "','" . mysqli_real_escape_string($con, $qus) . "')") or die(mysqli_error($con));
                        }
                        if (@$senddata2) {
                          // Echo JavaScript alert
                          echo "<script>alert('$fullname, Your Appointment was successfully Booked.')</script>";

                          // Use JavaScript to redirect to follow-up page
                          echo "<script>window.location.href = 'follow-up-page.php?date=" . urlencode($date) . '&email=' . urlencode($email) . "';</script>";
                        } else {
                          echo "<script>alert('An error occurred')</script>";
                        }
                      }

                      ?>

                      <?php
                      // Assuming this variable holds the user's ID

                      // Fetch the address from session data where userid matches $us
                      $addr = ""; // Default value if address is not found

                      // Execute the SQL query to fetch the address
                      $query = "SELECT addr FROM usr WHERE user_id = '" . mysqli_real_escape_string($con, $us) . "'";
                      $result = mysqli_query($con, $query);

                      // Check if the query executed successfully
                      if ($result) {
                        // Fetch the address from the result
                        $row = mysqli_fetch_assoc($result);
                        if ($row) {
                          $addr = $row['addr'];
                        }
                      }

                      // echo $addr;
                      ?>

                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="user">
                        
                      <div class="form-group">
            <select id="doctors" name="doc" class="form-control" required="required">
                <?php
                // Fetch doctor's name from URL parameter
                $doctorName = isset($_GET['doctor']) ? htmlspecialchars($_GET['doctor']) : '';

                // Populate the select option with the doctor's name
                if (!empty($doctorName)) {
                    echo "<option value='" . $doctorName . "'>" . $doctorName . "</option>";
                } else {
                    echo "<option value=''>------- Choose Doctor ------</option>";
                }
                ?>
            </select>
        
<button id="redirectButton" class="btn btn-primary">Go to Map</button>
</div>
<script>
  document.getElementById('redirectButton').addEventListener('click', function() {
    window.location.href = '../maps/map.php';
  });
</script>


                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <select style="font-size:px;" name="stage" class="form-control" required="required">
                                <option value=""> Choose Department </option>
                                <option value="Post-Partum">Post-Partum</option>
                              </select>
                            </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control form-control" name="fullname" value="<?php echo $sn . " " . $fn . " " . $ln; ?>" readonly>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <input type="text" class="form-control form-control" name="phone" value="<?php echo $ph; ?>" readonly>
                            </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control form-control" name="email" value="<?php echo $mail; ?>" readonly>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <span class="fa fa-calendar"></span> date
                              <input type="date" class="form-control form-control" name="date" placeholder="date" required>
                            </div>
                            <div class="col-md-6">
                              <span class="fa fa-clock-o"></span> time
                              <input type="time" class="form-control form-control" name="time" placeholder="time" required>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <textarea style="resize:none;" class="form-control " name="qus" rows=4 placeholder="Enter Appointment Note here..."></textarea>
                        </div>

                        <button class="btn btn-primary btn-user btn-block" name="bk"><b><span class="fa fa-send"></span> Book Appointment</b></button>
                    </div>
                    </form>

                    <script>
                      function fetchDoctors() {
                        var address = document.getElementById('address').value;
                        var doctorsDropdown = document.getElementById('doctors');
                        doctorsDropdown.innerHTML = '<option value="">------- Choose Doctor ------</option>';

                        if (address !== "") {
                          var xhr = new XMLHttpRequest();
                          xhr.open("POST", "fetch_doctors.php", true);
                          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                          xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                              var doctors = JSON.parse(xhr.responseText);
                              doctors.forEach(function(doctor) {
                                var option = document.createElement('option');
                                option.value = doctor.fullname;
                                option.textContent = doctor.fullname + " - " + doctor.address;
                                doctorsDropdown.appendChild(option);
                              });
                            }
                          };

                          xhr.send("address=" + encodeURIComponent(address));
                        }
                      }
                    </script>



                    <div class="col-md-1"></div>

                    <div class=" col-md-5">
                      <div class="w3-card">
                        <div class="w3-container w3-blue text-center pt-3 pb-2">
                          <h6 style="font-weight: bold;">Doctors & their Department</h6>
                        </div>
                        <div class="">
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Doctor</th>
                                <th>Department</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- php here -->
                              <?php
                              $mysqli1 = "select * from  ad_in ";
                              $myquery1 = mysqli_query($con, $mysqli1) or die(mysqli_error($con));
                              while ($row2 = mysqli_fetch_object($myquery1)) {

                              ?>
                                <tr class="">
                                  <td><?php echo $row2->fullname; ?></td>
                                  <td><?php echo $row2->stage; ?></td>
                                </tr>
                              <?php  } ?>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row container">
                    <div class="col-md-12" style="overflow-x: auto;">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%;">

                        <thead>
                          <tr>
                            <th>Doctor</th>
                            <th>Department</th>
                            <th>Appointment Note</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- php here -->
                          <?php
                          $mysqli1 = "select * from  book_app where email='$mail' ";
                          $myquery1 = mysqli_query($con, $mysqli1) or die(mysqli_error($con));
                          while ($row2 = mysqli_fetch_object($myquery1)) {

                          ?>
                            <tr class="" style="color: #444;">
                              <td><?php echo $row2->docname; ?></td>
                              <td><?php echo $row2->dept; ?></td>
                              <td><?php echo $row2->appnote; ?></td>
                              <td><?php echo $row2->appdate; ?></td>
                              <td><?php echo $row2->apptime; ?></td>
                              <td>
                                <?php
                                if ($row2->status == "Approved") {
                                  echo "$row2->status <span class='fa fa-check text-success'></span>";
                                } else {
                                  echo "$row2->status <span class='fa fa-close text-danger'></span>";
                                }
                                ?>
                              </td>
                              <td><a onclick="return confirm('Are you sure you want to delete?')" href="deletebooking.php?id=<?php echo $row2->id; ?>"><span class="fa fa-trash"></span></a></td>

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

    <script src="../../adm/s/js/dataTables/jquery.dataTables.js"></script>
    <script src="../../adm/s/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
      $(document).ready(function() {
        $('#dataTables-example').dataTable();
      });
    </script>

    <!-- Page level plugins -->


    <!-- Page level custom scripts -->

    <!-- Livechat for this template-->
    <?php
    //        include_once('foot.php');
    ?>
    <!-- Livechat end -->


</body>

</html>