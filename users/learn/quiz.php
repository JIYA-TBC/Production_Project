<?php
session_start();
include "session_st.php";
include "../../connect.php";

// Check if the user is logged in
if (!isset($_SESSION['passi'])) {
    header("location:../../login.php");
    exit();
}

// Check if the user has already answered the questions today
$user_ip = session_id();
$date_today = date('Y-m-d');

$query_check_response = "SELECT * FROM user_responses WHERE user_ip = '$user_ip' AND DATE(response_date) = '$date_today'";
$result_check_response = mysqli_query($con, $query_check_response);

if (mysqli_num_rows($result_check_response) > 0) {
    // User has already answered the questions today
    $already_answered_today = true;
} else {
    $already_answered_today = false;
}

// Function to retrieve mood data for the last 30 days
function getMoodData()
{
    global $con, $user_ip;
    $mood_data = array();

    for ($i = 29; $i >= 0; $i--) {
        $date = date('Y-m-d', strtotime("-$i days"));
        $query = "SELECT AVG(total_score) AS avg_score FROM user_responses WHERE user_ip = '$user_ip' AND DATE(response_date) = '$date'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $avg_score = $row['avg_score'] ? $row['avg_score'] : 0;
        $mood_data[$date] = $avg_score;
    }

    return $mood_data;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user hasn't already answered the questions today
    if (!$already_answered_today) {
        // Gather user responses
        $responses = array(
            'question1' => isset($_POST['question1']) ? intval($_POST['question1']) : 0,
            'question2' => isset($_POST['question2']) ? intval($_POST['question2']) : 0,
            'question3' => isset($_POST['question3']) ? intval($_POST['question3']) : 0,
            'question4' => isset($_POST['question4']) ? intval($_POST['question4']) : 0,
            'question5' => isset($_POST['question5']) ? intval($_POST['question5']) : 0,
            'question6' => isset($_POST['question6']) ? intval($_POST['question6']) : 0,
        );

        // Calculate total score
        $totalScore = $responses['question1'] + $responses['question2'] + $responses['question3'] +
            $responses['question4'] + $responses['question5'] + $responses['question6'];

        // Insert the user's response into the database
        $insert_query = "INSERT INTO user_responses (user_ip, total_score, response_date) VALUES ('$user_ip', '$totalScore', NOW())";
        mysqli_query($con, $insert_query);

        // Redirect to the same page to prevent form resubmission
        header("Location: $_SERVER[PHP_SELF]");
        exit();
    }
}

// Retrieve mood data for the last 30 days
$mood_data = getMoodData();
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
                                    <h6 class="m-0 font-weight-bold text-primary">Quiz</h6>
                                    <div class="dropdown no-arrow"></div>
                                </div>
                                <?php if ($already_answered_today) : ?>
                                    <div class="alert alert-warning" role="alert">
                                        You have already answered the questions today.
                                    </div>
                                <?php else : ?>
                                    <form id="moodAssessmentForm" method="post">
                                        <label for="question1">Question 1: Do you often feel sad or depressed?</label>
                                        <select id="question1" name="question1">
                                            <option value="0">Not at all</option>
                                            <option value="1">Several days</option>
                                            <option value="2">More than half the days</option>
                                            <option value="3">Nearly every day</option>
                                        </select>

                                        <label for="question2">Question 2: Do you have trouble sleeping, or do you sleep too much?</label>
                                        <select id="question2" name="question2">
                                            <option value="0">Not at all</option>
                                            <option value="1">Several days</option>
                                            <option value="2">More than half the days</option>
                                            <option value="3">Nearly every day</option>
                                        </select>

                                        <label for="question3">Question 3: Do you feel tired or have little energy?</label>
                                        <select id="question3" name="question3">
                                            <option value="0">Not at all</option>
                                            <option value="1">Several days</option>
                                            <option value="2">More than half the days</option>
                                            <option value="3">Nearly every day</option>
                                        </select>

                                        <label for="question4">Question 4: Do you feel down, depressed, or hopeless?</label>
                                        <select id="question4" name="question4">
                                            <option value="0">Not at all</option>
                                            <option value="1">Several days</option>
                                            <option value="2">More than half the days</option>
                                            <option value="3">Nearly every day</option>
                                        </select>

                                        <label for="question5">Question 5: Do you have trouble concentrating or making decisions?</label>
                                        <select id="question5" name="question5">
                                            <option value="0">Not at all</option>
                                            <option value="1">Several days</option>
                                            <option value="2">More than half the days</option>
                                            <option value="3">Nearly every day</option>
                                        </select>

                                        <label for="question6">Question 6: Do you have thoughts of harming yourself or others?</label>
                                        <select id="question6" name="question6">
                                            <option value="0">Not at all</option>
                                            <option value="1">Several days</option>
                                            <option value="2">More than half the days</option>
                                            <option value="3">Nearly every day</option>
                                        </select>

                                        <!-- Submit button -->
                                        <button type="submit">Submit</button>
                                    </form>
                                <?php endif; ?>
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
    </div>
    <!-- End of Page Wrapper -->

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>