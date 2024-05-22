<?php
session_start();
if (!isset($_SESSION['super_admin'])) {
    echo "<script>alert('You are not authorized to access this page. Please log in as a super admin.'); window.location.href = '../superadmin.php';</script>";
    exit();
}
// Include database connection file
include_once "connect.php";

// Fetch data from the changes_report table
$query = "SELECT * FROM imm_uze";
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
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #28a745; /* Green color */
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .table thead {
            background-color: #28a745; /* Green color */
            color: #fff;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .alert-info {
            background-color: #e2f0d9;
            color: #155724;
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-green bg-green fixed-top">
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
                    <a class="nav-link" href="bookapp_log.php">Appointment Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mother_list.php">Mother's List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctors_list.php">Doctor's List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="immunization.php">Immunization Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="question_reports.php">Queries Report</a>
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
                <a href="download_csv_im.php" class="btn btn-primary mb-3">Download Report as CSV</a>
                <button class="btn btn-primary mb-3" onclick="printReport()">Print Report</button>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Error: <?php echo $error; ?>
                    </div>
                <?php else : ?>
                    <?php if (!empty($changesData)) : ?>
    <?php if (isset($_GET['status'])) : ?>
        <?php if ($_GET['status'] == 'success') : ?>
            <script>
                alert("Immunization deleted successfully.");
            </script>
        <?php elseif ($_GET['status'] == 'error') : ?>
            <script>
                alert("Error deleting the report.");
            </script>
        <?php endif; ?>
    <?php endif; ?>
                        <div id="reportContent">
                        <table class="table" >
                            <thead class="thead-green">
                                <tr>
                                    <th>Vaccination name</th>
                                    <th>Description</th>
                                    <th>Vaccage</th>
                                    <th>Dose</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                    
                                    <!-- Add more columns if needed -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($changesData as $change) : ?>
                                    <tr>
                                        <td><?php echo $change['vaccname']; ?></td>
                                        <td><?php echo $change['description']; ?></td>
                                        <td><?php echo $change['vaccage']; ?></td>
                                        <td><?php echo $change['dose']; ?></td>
                                        <td><?php echo $change['timestamp']; ?></td>
                                        <td>
                                                <form method="post" action="delete_immu.php">
                                                    <input type="hidden" name="report_id" value="<?php echo $change['id']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>

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
