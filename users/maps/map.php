<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map with Location Search</title>
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        #mapid {
            height: 600px;
        }
        /* Customize the background color and dimensions of Leaflet Control Search */
        .leaflet-control-geocoder.leaflet-bar {
            background-color: white !important;
            width: 325px !important; /* Increase the width */
        }
        .leaflet-control-geocoder-form input {
            width: 300px !important;
            height: 30px !important; /* Increase the input height */
            margin: 5px; /* Add some margin for better spacing */
        }
        .leaflet-control-geocoder-form button {
            height: 30px !important; /* Set button height to match input */
            margin: 5px; /* Add some margin for better spacing */
        }
        .leaflet-control-geocoder-alternatives {
            background-color: white !important; /* Ensure the alternatives dropdown has a white background */
            max-height: 200px; /* Limit the height of the dropdown */
            overflow-y: auto; /* Enable vertical scrolling if needed */
            width: 315px !important; /* Increase the width of the results */
        }
        .leaflet-control-geocoder-alternatives ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .leaflet-control-geocoder-alternatives li {
            padding: 5px;
            cursor: pointer;
            white-space: nowrap; /* Prevent text wrapping */
        }
        .leaflet-control-geocoder-alternatives li:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<!-- Map Container -->
<div id="mapid"></div>
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
<!-- Include Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<!-- Include Leaflet Control Search JavaScript -->
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
    // Initialize the map
    var map = L.map('mapid').setView([27.7172, 85.324], 7); // Kathmandu, Nepal

    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Add Leaflet Control Search with Nominatim as the geocoding service
    var geocoder = L.Control.geocoder({ 
        defaultMarkGeocode: false,
        geocoder: L.Control.Geocoder.nominatim()
    }).on('markgeocode', function(e) {
        var bbox = e.geocode.bbox;
        var poly = L.polygon([
            bbox.getSouthEast(),
            bbox.getNorthEast(),
            bbox.getNorthWest(),
            bbox.getSouthWest()
        ]).addTo(map);
        map.fitBounds(poly.getBounds());

        var selectedLocation = e.geocode.name; // Get the selected location name
        // Send the selected location to select_location.php
        // window.location.href = "select_location.php?location=" + encodeURIComponent(selectedLocation);
    }).addTo(map);

    // Doctor data from PHP
    var doctors = <?php echo json_encode($doctors); ?>;

    // Function to geocode an address and add a marker
    function geocodeAddress(address, name) {
        geocoder.options.geocoder.geocode(address, function(results) {
            if (results.length > 0) {
                var latlng = results[0].center;
                var marker = L.marker(latlng)
                    .addTo(map)
                    .bindPopup("<b>Doctor:</b> " + name + "<br><b>Address:</b> " + address);

                // Add hover event to the marker
                marker.on('mouseover', function() {
                    marker.openPopup();
                });

                marker.on('mouseout', function() {
                    marker.closePopup();
                });

                 // Add click event to the marker
                 marker.on('click', function() {
                    // Redirect to select_doctor.php with the doctor's name
                    window.location.href = "../learn/bookapp.php?doctor=" + encodeURIComponent(name);
                });
            }
        });
    }

    // Iterate through doctors and geocode their addresses
    doctors.forEach(function(doctor) {
        geocodeAddress(doctor.address, doctor.fullname);
    });
</script>

</body>
</html>