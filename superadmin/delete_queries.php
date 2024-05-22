<?php
// Include database connection file
include_once "../connect.php";

// Check if the form is submitted and report ID is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['report_id'])) {
    $reportId = $_POST['report_id'];

    // Prepare the delete query
    $query = "DELETE FROM que_st WHERE id = ?";
    $stmt = $con->prepare($query);

    // Bind the parameter
    $stmt->bind_param("i", $reportId);

    // Execute the query and check the result
    if ($stmt->execute()) {
        // Redirect to the immunization page with success message
        header("Location: question_reports.php?status=success");
    } else {
        // Redirect to the immunization page with error message
        header("Location: question_reports.php?status=error");
    }

    // Close the statement and database connection
    $stmt->close();
    $con->close();
} else {
    // Redirect to the immunization page if the request method is not POST or report ID is not provided
    header("Location: question_reports.php");
}
?>
