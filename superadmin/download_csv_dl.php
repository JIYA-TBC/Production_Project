<?php
// download_csv.php

// Include database connection file
include_once "connect.php";

// Fetch data from the changes_report table
$query = "SELECT id,fullname,use_r,phone,address FROM ad_in";
$result = mysqli_query($con, $query);

// Check if data was fetched successfully
if ($result) {
    // Fetch data as associative array
    $changesData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Create CSV file
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="doctor_report.csv"');

    $output = fopen('php://output', 'w');
    fputcsv($output, array('ID','Name', 'Email','Phone','Address'));

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
