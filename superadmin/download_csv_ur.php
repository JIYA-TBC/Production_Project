<?php
// download_csv.php

// Include database connection file
include_once "connect.php";

// Fetch data from the changes_report table
$query = "SELECT * FROM changes_report";
$result = mysqli_query($con, $query);

// Check if data was fetched successfully
if ($result) {
    // Fetch data as associative array
    $changesData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Create CSV file
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="user_changes_report.csv"');

    $output = fopen('php://output', 'w');
    fputcsv($output, array('ID','Table Name', 'Operation', 'Rows Affected', 'Date/Time', 'Description','Email','Name'));
    foreach ($changesData as $change) {
        fputcsv($output, $change);
    }

    fclose($output);
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}

// Close database connection
mysqli_close($con);
?>
