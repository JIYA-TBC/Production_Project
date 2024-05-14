<?php
session_start();

// Check if OTP is entered
if (isset($_POST['otp'])) {
    // Check if entered OTP matches the stored OTP
    if ($_POST['otp'] == $_SESSION['otp']) {
        // OTP is correct, redirect to desired page
        header("Location: users/learn/index.php");
        exit();
    } else {
        // OTP is incorrect, show error message
        echo "<script>alert('Incorrect OTP. Please try again.')</script>";
    }
} else {
    // Redirect user if OTP is not entered
    header("Location: index.php");
    exit();
}
?>
