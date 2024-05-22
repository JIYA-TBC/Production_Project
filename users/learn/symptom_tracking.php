<?php
session_start();
include "session_st.php";
include "../../connect.php";

// Function to suggest improvements based on symptoms
function suggestImprovementsForSymptoms($symptoms) {
    $suggestions = array();

    // Example suggestions based on symptoms
    if (in_array("Excessive Bleeding", $symptoms)) {
        $suggestions[] = "Apply firm pressure to the bleeding area and seek medical attention immediately.";
    }
    if (in_array("Dizziness", $symptoms) || in_array("Fainting", $symptoms)) {
        $suggestions[] = "Sit or lie down to prevent injury from falling and rest until symptoms improve.";
    }
    if (in_array("Rapid Heart Rate", $symptoms)) {
        $suggestions[] = "Stay calm and try deep breathing exercises to help regulate your heart rate.";
    }

    return $suggestions;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve symptom data
    $symptoms = $_POST["symptoms"];

    // Store symptom data in session
    $_SESSION["symptoms"] = $symptoms;

    // Redirect to confirmation page
    header("Location: $_SERVER[PHP_SELF]");
    exit();
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
                        <h1 class="h3 mb-0 text-gray-800">Track Symptoms</h1>

                    </div>
                    <div class="row">

                        <div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Track Symptoms</h6>
                                    <div class="dropdown no-arrow">


                                    </div>
                                </div>
                                <!-- Card Body -->

                                <div class="col-md-6">
                                    <div class="w3-card">
                                        <div class="w3-container w3-blue text-center pt-3 pb-2">
                                            <h6 style="font-weight: bold;">Answer the questions</h6>
                                        </div>

                                        <div class="card-body">
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                <div class="form-group">
                                                    <label for="excessive_bleeding">Excessive Bleeding:</label>
                                                    <input type="checkbox" id="excessive_bleeding" name="symptoms[]" value="Excessive Bleeding"><br>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dizziness">Dizziness:</label>
                                                    <input type="checkbox" id="dizziness" name="symptoms[]" value="Dizziness"><br>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fainting">Fainting:</label>
                                                    <input type="checkbox" id="fainting" name="symptoms[]" value="Fainting"><br>
                                                </div>
                                                <div class="form-group">
                                                    <label for="rapid_heart_rate">Rapid Heart Rate:</label>
                                                    <input type="checkbox" id="rapid_heart_rate" name="symptoms[]" value="Rapid Heart Rate"><br>
                                                </div>
                                                <input type="submit" value="Submit">
                                            </form>

                                            <?php if (isset($_SESSION['symptoms'])) : ?>
                                                <div class="alert alert-info mt-4">
                                                    <h2>Symptom Confirmation</h2>
                                                    <p>Your symptoms have been successfully recorded:</p>
                                                    <ul>
                                                        <?php
                                                        // Display recorded symptoms
                                                        foreach ($_SESSION['symptoms'] as $symptom) {
                                                            echo "<li>$symptom</li>";
                                                        }
                                                        ?>

                                                        <?php
                                                        // Get suggestions for improvement
                                                        $improvement_suggestions = suggestImprovementsForSymptoms($_SESSION['symptoms']);
                                                        // Display suggestions for improvement
                                                        if (!empty($improvement_suggestions)) {
                                                            echo "<h3>Suggestions for Improvement:</h3>";
                                                            echo "<ul>";
                                                            foreach ($improvement_suggestions as $suggestion) {
                                                                echo "<li>$suggestion</li>";
                                                            }
                                                            echo "</ul>";
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <br>
                                    <?php //cert(); 
                                    ?>
                                </div>
                            </div>
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
