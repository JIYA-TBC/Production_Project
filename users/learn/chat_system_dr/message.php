<?php
session_start();
include '../../../connect.php';
echo $_SESSION['username'];
echo $_POST['message'];
if (isset($_POST['message']) && isset($_SESSION['username'])) {
    $message = $con->real_escape_string($_POST['message']);
    $user = $_SESSION['username'];
    $sender = 'Mother'; // Assuming 'Mother' is a string value

    $query = "INSERT INTO chats (user, message, sender) VALUES ('$user', '$message', '$sender')";
    if ($con->query($query) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $con->error;
    }
} else {
    echo "No message or user not logged in.";
}

$con->close();
?>
