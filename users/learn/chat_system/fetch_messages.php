<?php
include '../../../connect.php';

$query = "SELECT * FROM messages ORDER BY timestamp ASC";
$result = $con->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div><strong>" . htmlspecialchars($row['user']) . "</strong>: " . htmlspecialchars($row['message']) . " <em>(" . $row['timestamp'] . ")</em></div>";
    }
} else {
    echo "No messages.";
}

$con->close();
?>
