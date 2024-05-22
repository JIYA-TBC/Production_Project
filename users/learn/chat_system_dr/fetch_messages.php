<?php
include '../../../connect.php';

$query = "SELECT * FROM chats ORDER BY timestamp ASC";
$result = $con->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="message">';
        echo '<strong>' . ($row['sender'] === 'Mother' ? 'You' : 'Doctor') . ':</strong><br>';
        echo '<p>' . htmlspecialchars($row['message']) . '</p>';
        echo '</div>';
        echo '<p>' . $row['timestamp'] .'</p>';
    }
} else {
    echo "No messages.";
}

$con->close();
?>
