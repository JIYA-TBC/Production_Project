<?php
// Include database connection file
include_once "connect.php";

// Fetch data from the changes_report table
$query = "SELECT * FROM report_bookapp";
$result = mysqli_query($con, $query);

// Check if data was fetched successfully
if ($result) {
    // Fetch data as associative array
    $changesData = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Handle error if data fetching fails
    $error = mysqli_error($con);
}

// Close database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Add custom CSS styles here */
        body {
            padding-top: 60px; /* Adjust based on navbar height */
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Super Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">User's Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Appointment Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mother_list.php">Mother's List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="immunization.php">Immunization Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a href="download_csv.php" class="btn btn-primary mb-3">Download Report as CSV</a>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Error: <?php echo $error; ?>
                    </div>
                <?php else : ?>
                    <?php if (!empty($changesData)) : ?>
                        <div id="reportContent">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Table Name</th>
                                        <th>Operation</th>
                                        <th>Date/Time</th>
                                        <th>Description</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Time</th>
                                        <th>Doctor appointed</th>
                                        <th>Phone</th>
                                        <th>Mother's Name</th>
                                        <th>Mother's Email</th>
                                        <th>Status</th>
                                        <!-- Add more columns if needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($changesData as $change) : ?>
                                        <tr>
                                            <td><?php echo $change['table_name']; ?></td>
                                            <td><?php echo $change['operation']; ?></td>
                                            <td><?php echo $change['change_time']; ?></td>
                                            <td><?php echo $change['description']; ?></td>
                                            <td><?php echo $change['appdate']; ?></td>
                                            <td><?php echo $change['apptime']; ?></td>
                                            <td><?php echo $change['docname']; ?></td>
                                            <td><?php echo $change['phone']; ?></td>
                                            <td><?php echo $change['name']; ?></td>
                                            <td><?php echo $change['email']; ?></td>
                                            <td><?php echo $change['status']; ?></td>
                                            <!-- Add more columns if needed -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-info" role="alert">
                            No changes data available.
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS for print functionality -->
    <script>
        function printReport() {
            var reportContent = document.getElementById('reportContent').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = reportContent;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload(); // Reload the page to restore the original content
        }
    </script>
</body>
</html>
