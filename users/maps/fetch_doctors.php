<?php
// Include database connection details
include_once "../learn/connect.php";

// Query to fetch doctor names and addresses
$sql = "SELECT fullname, address FROM ad_in";
$result = $con->query($sql);

$doctors = array();

if ($result->num_rows > 0) {
    // Fetch all results into an array
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }
}

// Close connection
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctors List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Doctors List</h2>
        <div class="form-group">
            <select id="doctors" name="doc" class="form-control" required="required">
                <option value="">------- Choose Doctor ------</option>
                <?php
                foreach ($doctors as $doctor) {
                    echo "<option value='" . htmlspecialchars($doctor['address']) . "'>" . htmlspecialchars($doctor['name']) . "</option>";
                }
                ?>
            </select>
        </div>
        <button id="redirectButton" class="btn btn-primary">Go to Map</button>
        <h3>Doctor Details</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($doctors as $doctor) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($doctor['fullname']) . "</td>";
                    echo "<td>" . htmlspecialchars($doctor['address']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        document.getElementById('redirectButton').addEventListener('click', function() {
            const selectedDoctor = document.getElementById('doctors').value;
            if (selectedDoctor) {
                window.location.href = 'map.php?address=' + encodeURIComponent(selectedDoctor);
            } else {
                alert('Please select a doctor.');
            }
        });
    </script>
</body>
</html>
