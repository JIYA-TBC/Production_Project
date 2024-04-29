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
                                    <h6 class="m-0 font-weight-bold text-primary">Quiz</h6>
                                    <div class="dropdown no-arrow">


                                    </div>
                                </div>
                                <!-- Card Body -->

                                <div class="col-md-6">
                                    <h2>Postpartum Depression Quiz</h2>

                                    <form method="post" action="">
                                        <?php
                                        // Define postpartum depression questions as an array
                                        $questions = array(
                                            "Do you often feel sad or hopeless?",
                                            "Do you have trouble sleeping even when the baby is sleeping?",
                                            "Do you find it difficult to bond with your baby?",
                                            "Do you feel overwhelmed or unable to cope with daily tasks?",
                                            "Do you have thoughts of harming yourself or your baby?",
                                            "Do you experience frequent mood swings?",
                                            "Do you feel constantly fatigued or lack energy?",
                                            "Do you have changes in appetite or weight?",
                                            "Do you have trouble concentrating or making decisions?",
                                            "Do you feel disconnected or numb?"
                                        );

                                        // Display each question and its options
                                        foreach ($questions as $index => $question) {
                                            echo "<p>" . ($index + 1) . ". $question</p>";
                                            // Display radio buttons for each option
                                            echo "<input type='radio' name='q$index' value='Yes'> Yes";
                                            echo "<input type='radio' name='q$index' value='No' checked> No<br><br>";
                                        }
                                        ?>

                                        <input type="submit" name="submit" value="Submit">
                                    </form>

                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Initialize score
                                        $score = 0;

                                        // Loop through each question and check the answer
                                        foreach ($questions as $index => $question) {
                                            // Check if the question has been answered
                                            if (isset($_POST["q$index"])) {
                                                // Check if the answer is "Yes"
                                                if ($_POST["q$index"] == 'Yes') {
                                                    $score++;
                                                }
                                            }
                                        }

                                        // Display the score
                                        echo "<p>Your score: $score out of " . count($questions) . " (number of 'Yes' responses)</p>";


                                        if ($score <= 3) {
                                            echo "<p>Your depression level: Normal</p>";
                                        } elseif ($score >= 4 && $score <= 6) {
                                            echo "<p>Your depression level: Stage 1 Depression</p>";
                                        } elseif ($score >= 7 && $score <= 9) {
                                            echo "<p>Your depression level: Stage 2 Depression</p>";
                                        } else {
                                            echo "<p>Your depression level: Stage 3 Depression</p>";
                                        }
                                    }
                                    ?>
                                    <br>
                                    <?php //cert(); 
                                    ?>
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