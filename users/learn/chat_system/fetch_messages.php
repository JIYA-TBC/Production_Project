<?php
include '../../../connect.php';

$query = "SELECT * FROM messages ORDER BY timestamp ASC";
$result = $con->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // echo "<div><strong>" . htmlspecialchars($row['user']) . "</strong>: " . htmlspecialchars($row['message']) . " <em>(" . $row['timestamp'] . ")</em></div>";
        // echo "<div><strong>" . htmlspecialchars($row['user']) . "</strong><p>" . htmlspecialchars($row['message']) . "</p><p>(" . $row['timestamp'] . ")</p></div>";
        // echo '<strong>' . htmlspecialchars($row['user']) . ':</strong><br>';
        echo '<div class="message">';
        echo '<strong>' . htmlspecialchars($row['user'])  . ':</strong><br>';
        echo '<p>' . htmlspecialchars($row['message']) . '</p>';
        echo '</div>';
        echo '<p>' . $row['timestamp'] . '</p>';
    }
} else {
    echo "No messages.";
}

$con->close();
