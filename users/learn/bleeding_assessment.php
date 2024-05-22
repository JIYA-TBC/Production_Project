<?php
session_start();
include "session_st.php";
include "../../connect.php";

// Function to evaluate safety level based on bleeding data
function evaluateSafetyLevelForBleeding($pad_count, $saturation_level, $large_clots) {
    // Example logic to evaluate safety level based on bleeding data
    if ($pad_count >= 3 && $saturation_level === "Heavy") {
        return "Unsafe - Seek immediate medical attention!";
    } elseif ($pad_count >= 2 && $saturation_level === "Moderate") {
        return "Borderline - Monitor closely and contact healthcare provider if condition worsens.";
    } else {
        return "Safe - Continue monitoring and follow postpartum care instructions.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the bleeding assessment form has been submitted
    if (isset($_POST["pad_count"]) && isset($_POST["saturation_level"])) {
        // Store bleeding data in session
        $_SESSION["bleeding_data"] = [
            "pad_count" => $_POST["pad_count"],
            "saturation_level" => $_POST["saturation_level"],
            "large_clots" => isset($_POST["large_clots"]) ? $_POST["large_clots"] : ""
        ];

        // Evaluate safety level based on bleeding data
        $safety_level = evaluateSafetyLevelForBleeding($_POST["pad_count"], $_POST["saturation_level"], isset($_POST["large_clots"]) ? $_POST["large_clots"] : "");

        // Redirect to the same page to display the bleeding confirmation result
        header("Location: $_SERVER[PHP_SELF]");
        exit();
    }
}

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
                        <h1 class="h3 mb-0 text-gray-800">Track Bleeding</h1>

                    </div>
                    <div class="row">

                        <div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Track Bleeding</h6>
                                    <div class="dropdown no-arrow">
                                    </div>
                                </div>
                                <!-- Card Body -->
                                
                                <div class="col-md-6">
			<div class="w3-card">
                    <div class="w3-container w3-blue text-center pt-3 pb-2" >
                        <h6 style="font-weight: bold;">Answer the Questions</h6>
                    </div>
                    <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
        <label for="pad_count">Number of Pads Used:</label>
        <input type="number" id="pad_count" name="pad_count" required><br>
        </div>
        <div class="form-group">

        <label for="saturation_level">Pad Saturation Level:</label>
        <select id="saturation_level" name="saturation_level" required>
            <option value="Light">Light</option>
            <option value="Moderate">Moderate</option>
            <option value="Heavy">Heavy</option>
        </select><br>
        </div>
        <div class="form-group">
        <label for="large_clots">Large Blood Clots Passed (if any):</label>
        <input type="text" id="large_clots" name="large_clots"><br>

        <input type="submit" value="Submit">
        </div>
        
    </form>
    <div class="alert alert-info mt-4">
    <?php if (isset($_SESSION['bleeding_data'])): 
            $bleeding_data = $_SESSION['bleeding_data'];
            $safety_level = evaluateSafetyLevelForBleeding($bleeding_data['pad_count'], $bleeding_data['saturation_level'], $bleeding_data['large_clots']);
    ?>
    
        <h2>Bleeding Confirmation</h2>
        <p>Your bleeding assessment data has been successfully recorded:</p>
        <ul>
            <li>Number of Pads Used: <?php echo $bleeding_data["pad_count"]; ?></li>
            <li>Pad Saturation Level: <?php echo $bleeding_data["saturation_level"]; ?></li>
            <li>Large Blood Clots Passed (if any): <?php echo $bleeding_data["large_clots"]; ?></li>
        </ul>

        <p>Safety Level: <?php echo $safety_level; ?></p>
    <?php endif; ?>

    
                                            
    </div>
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
