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
// $date_today = date('Y-m-d H:i:s');

// $query_check_response = "SELECT * FROM user_responses WHERE user_ip = '$user_ip' AND DATE(response_date) = '$date_today'";
// $result_check_response = mysqli_query($con, $query_check_response);
// $already_answered_today = mysqli_num_rows($result_check_response) > 0 ? true : false;

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
        $insert_query = "INSERT INTO user_responses (user_ip, total_score) VALUES ('$user_ip', '$totalScore')";
        mysqli_query($con, $insert_query);

        // Store total score in session for displaying suggestions
        $_SESSION['totalScore'] = $totalScore;

        // Redirect to the same page to prevent form resubmission
        header("Location: $_SERVER[PHP_SELF]");
        exit();
    
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
                        <h1 class="h3 mb-0 text-gray-800">Test yourself </h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Quiz</h6>
                                    <div class="dropdown no-arrow"></div>
                                </div>
                                <div class="card-body">
                                   
                                        <form id="moodAssessmentForm" method="post">
                                        <div class="form-group">
                                            <label for="question1"><strong>Question 1: Do you often feel sad or depressed?</strong></label>
                                            <select id="question1" name="question1">
                                                <option value="0">Not at all</option>
                                                <option value="1">Several days</option>
                                                <option value="2">More than half the days</option>
                                                <option value="3">Nearly every day</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="question2"><strong>Question 2: Do you have trouble sleeping, or do you sleep too much?</strong></label>
                                            <select id="question2" name="question2">
                                                <option value="0">Not at all</option>
                                                <option value="1">Several days</option>
                                                <option value="2">More than half the days</option>
                                                <option value="3">Nearly every day</option>
                                            </select>
</div>
<div class="form-group">
                                            <label for="question3"><strong>Question 3: Do you feel tired or have little energy?</strong></label>
                                            <select id="question3" name="question3">
                                                <option value="0">Not at all</option>
                                                <option value="1">Several days</option>
                                                <option value="2">More than half the days</option>
                                                <option value="3">Nearly every day</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="question4"><strong>Question 4: Do you feel down, depressed, or hopeless?</strong></label>
                                            <select id="question4" name="question4">
                                                <option value="0">Not at all</option>
                                                <option value="1">Several days</option>
                                                <option value="2">More than half the days</option>
                                                <option value="3">Nearly every day</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="question5"><strong>Question 5: Do you have trouble concentrating or making decisions?</strong></label>
                                            <select id="question5" name="question5">
                                                <option value="0">Not at all</option>
                                                <option value="1">Several days</option>
                                                <option value="2">More than half the days</option>
                                                <option value="3">Nearly every day</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="question6"><strong>Question 6: Do you have thoughts of harming yourself or others?</strong></label>
                                            <select id="question6" name="question6">
                                                <option value="0">Not at all</option>
                                                <option value="1">Several days</option>
                                                <option value="2">More than half the days</option>
                                                <option value="3">Nearly every day</option>
                                            </select>
</div>
                                            <!-- Submit button -->
                                            <button type="submit">Submit</button>
                                        </form>
                                   

                                    <?php if (isset($_SESSION['totalScore'])): ?>
                                        <?php
                                            $totalScore = $_SESSION['totalScore'];
                                            unset($_SESSION['totalScore']);
                                            $suggestions = "";
                                            $riskLevel = "";

                                            if ($totalScore <= 8) {
                                                $riskLevel = "Low";
                                                $suggestions = "It seems like you are doing well.The postpartum period, often referred to as the fourth trimester,
                                                 can be a time of significant adjustment and change. It's important to prioritize self-care and recovery during this time.
                                                  Ensure you are getting adequate rest, as sleep is crucial for your physical and emotional well-being. Accept help from
                                                   family and friends to manage daily tasks and childcare, allowing you to focus on healing and bonding with your baby.
                                                    Maintain a balanced diet rich in nutrients to support your recovery and energy levels. Stay hydrated by drinking plenty of 
                                                    water throughout the day. Incorporate gentle exercises, like walking or postpartum yoga, to aid in physical recovery and boost
                                                     your mood. Regularly check in with your healthcare provider to monitor your physical and mental health. It's also beneficial
                                                      to connect with other new mothers for support and shared experiences. Lastly, be patient with yourself and your body as you navigate 
                                                      this new chapter, recognizing that every postpartum journey is unique and takes time. Keep up with your good habits!";
                                            } elseif ($totalScore <= 12) {
                                                $riskLevel = "Moderate";
                                                $suggestions = "It appears you might be experiencing some mood disturbances. 
                                                It appears you might be experiencing some mood disturbances, which is not uncommon during the postpartum period. This phase can 
                                                bring about a range of emotions, and it's important to take steps to care for your mental health. Consider reaching out to a 
                                                trusted friend or family member to share your feelings and experiences. Talking to someone who understands can provide much-needed
                                                 support and perspective. Additionally, it might be beneficial to speak with a counselor or therapist who specializes in postpartum
                                                  mental health. They can offer professional guidance and coping strategies tailored to your needs. Remember to take care of your physical
                                                   health as well by ensuring you get adequate rest, nutrition, and exercise, as these can significantly impact your mood. Engaging in relaxing 
                                                   activities that you enjoy and taking small breaks for self-care can also make a positive difference. If your feelings persist or worsen, don't hesitate
                                                    to seek further professional help to ensure you receive the support you need.Consider talking to a friend or a counselor.";
                                            } else {
                                                $riskLevel = "High";
                                                $suggestions = "You may be experiencing significant distress. In postpartum, experiencing high-risk symptoms can significantly impact your
                                                 well-being and parenting journey. If you find yourself grappling with overwhelming emotions, persistent sadness, or thoughts 
                                                 of harming yourself or others, it's crucial to seek professional help promptly. High-risk postpartum symptoms may indicate conditions like 
                                                postpartum depression or postpartum psychosis, which require immediate intervention for your safety and the well-being of your baby. Connecting
                                                 with a healthcare provider, therapist, or support group specialized in postpartum mental health can provide essential guidance, support, and 
                                                 treatment options tailored to your needs. Remember, seeking help is not a sign of weakness but a proactive step towards healing and recovery,
                                                  allowing you to nurture yourself and your newborn with the care and support you both deserve.It is important to seek professional help.";
                                            }
                                        ?>
                                        <div class="alert alert-info mt-4">
                                            <h5>Risk Level: <strong><?php echo $riskLevel; ?></strong></h5>
                                            <p><?php echo $suggestions; ?></p>
                                        </div>
                                    <?php endif; ?>
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
    </div>
    <!-- End of Page Wrapper -->

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
