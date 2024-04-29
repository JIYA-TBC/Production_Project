<?php
session_start();
include "session_st.php";
include "../../connect.php";

$user_ip = session_id();
// Check if the user is logged in
if (!isset($_SESSION['passi'])) {
    header("location:../../login.php");
    exit();
}

// Retrieve mood swing data from the database for the same user IP
$query = "SELECT response_date, total_score FROM user_responses WHERE user_ip = '$user_ip' ORDER BY response_date DESC";
$result = mysqli_query($con, $query);

// Initialize arrays to store dates and scores
$dates = array();
$scores = array();

// Process retrieved data
while ($row = mysqli_fetch_assoc($result)) {
    $dates[] = $row['response_date'];
    $scores[] = $row['total_score'];
}

// Close database connection
mysqli_close($con);
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
    <title>Post Partum - Mood Swing Analysis</title>

    <!-- FusionCharts -->
    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
                    <!-- Topbar Navbar -->
                    <?php include "connect/nav.php"; ?>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Mood Swing Analysis</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <!-- Chart -->
                                    <div id="chart-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Row -->
            <div class="row"></div>
        </div>
    </div>
    <!-- Footer -->
    <?php include "connect/foot.php"; ?>
    </div></div>
    <!-- End of Page Wrapper -->

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        // Prepare data for FusionCharts
        var chartData = <?php echo json_encode(array_map(function($date, $score) {
            return array("label" => $date, "value" => $score);
        }, $dates, $scores)); ?>;

        // Check if data is empty
        if (chartData.length === 0) {
            document.getElementById('chart-container').innerHTML = "No data available for mood swing analysis.";
        } else {
            // Instantiate the chart
            var chartInstance = new FusionCharts({
                type: 'Column2D',
                renderAt: 'chart-container',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    chart: {
                        caption: 'Mood Swing Analysis',
                        subcaption: 'Scores over Time',
                        theme: 'fusion'
                    },
                    data: chartData
                }
            });

            // Render the chart
            chartInstance.render();
        }
    </script>
</body>

</html>
