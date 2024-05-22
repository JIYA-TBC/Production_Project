<?php
// Include database connection file
include_once "../connect.php";

// Check if the form is submitted and report ID is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['report_id'])) {
    $reportId = $_POST['report_id'];

    // Prepare the delete query
    $query = "DELETE FROM ad_in WHERE id = ?";
    $stmt = $con->prepare($query);

    // Bind the parameter
    $stmt->bind_param("i", $reportId);

    // Execute the query and check the result
    if ($stmt->execute()) {
        // Redirect to the bookapp_log page with success message
        header("Location: doctors_list.php?status=success");
    } else {
        // Redirect to the bookapp_log page with error message
        header("Location: doctors_list.php?status=error");
    }

    // Close the statement and database connection
    $stmt->close();
    $con->close();
} else {
    // Redirect to the bookapp_log page if the request method is not POST or report ID is not provided
    header("Location: doctors_list.php");
}
?>
