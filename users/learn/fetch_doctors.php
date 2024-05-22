<?php
include "../../connect.php";

if (isset($_POST['address'])) {
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $query = "";

    if ($address == 'near_me') {
        // Fetch doctors near the user's address
        // Replace 'user_address' with the actual user's address variable
        $user_address = $_SESSION['addr']; // This should be dynamically fetched based on the logged-in user
        $query = "SELECT fullname, address FROM ad_in WHERE address='$user_address'";
    } else {
        // Fetch doctors based on the selected address
        $query = "SELECT fullname, address FROM ad_in WHERE address='$address'";
    }

    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $doctors = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $doctors[] = $row;
    }

    echo json_encode($doctors);
}
