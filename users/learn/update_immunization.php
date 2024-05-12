<?php
session_start();
$_SESSION['id'];
include "session_st.php";
include "../../connect.php";

if (!isset($_SESSION['passi'])) {
    header("location:../../login.php");
    exit();
}

if (!isset($_SESSION['cur_user'])) {
    $_SESSION['cur_user'] = $_SERVER['REMOTE_ADDR'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['immunizations'])) {
    $immunizations = $_POST['immunizations'];
    $user_id = $_SESSION['id']; // Assuming you have a session variable for the user's ID

    // Add the database connection and update the table with the immunization data
    include "../../connect.php"; // Make sure to include your database connection

    foreach ($immunizations as $immunization) {
        // Assuming you have a database table named 'user_immunizations' with columns 'user_id', 'immunization', and 'timestamp'
        $sql = "INSERT INTO user_immunizations (user_id, immunization, timestamp) VALUES ('$user_id', '$immunization', NOW())";
        mysqli_query($con, $sql) or die(mysqli_error($con));
    }

    // Redirect to the same page after updating
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
