<?php
session_start();
include '../../../connect.php';

if (isset($_POST['message']) && isset($_SESSION['username'])) {
    $message = $con->real_escape_string($_POST['message']);
    $user = 'Mom';
    
    $query = "INSERT INTO messages (user, message) VALUES ('$user', '$message')";
    if ($con->query($query) === TRUE) {
        echo "Message sent";
    } else {
        echo "Error: " . $con->error;
    }
} else {
    echo "No message or user not logged in.";
}

$con->close();
?>
