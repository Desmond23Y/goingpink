<?php
session_start(); // Start the session at the beginning of the file
include('conn.php'); 

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

// Fetch pricing information for transport types from the database
$result = mysqli_query($con, "SELECT * FROM transport_information");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
$transportTypes = [];

// Extract transport types and their prices
while ($row = mysqli_fetch_assoc($result)) {
    $transportTypes[$row['transport_type']] = $row['transport_price_perKM'];
$_SESSION['transportpricing'] = $transportTypes;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Going Pink Transport Booking</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS7LY-BaBKUS0xIRTNJKXtfsLEZv_5OG8&libraries=places&callback=initAutocomplete" async defer></script>
</head>

<body>
    <?php
    include('../navi_bar.php');
    ?>
    <div>
        <h2>
            Departure Location
        </h2>
    </div>
    <div id="locationField">
        <input id="originautocomplete" class="query" placeholder="Enter your address" type="text" autocomplete="off" />
        <!-- Button to set departure location on the map -->
        <button onclick="setLocation('departure')">Set Departure</button>
    </div>

    <div>
        <h2>
            Arrival Location
        </h2>
    </div>
    <div id="destinationLocationField">
        <input id="destinationautocomplete" class="query" placeholder="Enter your destination" type="text" autocomplete="off" />
        <!-- Button to set arrival location on the map -->
        <button id="arrivalButton" onclick="setLocation('arrival')" disabled>Set Arrival</button>
    </div>
    <br>
    <div>
        <select id="transportType">
            <?php
            // Populate the dropdown menu with transport types and prices
            foreach ($transportTypes as $type => $price) {
                echo '<option value="' . $type . '">' . $type . ' (RM ' . $price . ' per KM)</option>';
            }
            ?>
        </select>
    </div>
    <br>
    <div>
        <input type="button" value="Calculate Price and Time" onclick="BookRide()" />
    </div>
    <div>
        <input type="button" id="bookRideNow" value="Book Ride Now" onclick="bookRideNow()" disabled />
    </div>
    <br>
    <div>
        <strong>Estimated Arrival Time (UTC +8)</strong>
    </div>
    <input type="text" id="arrivalTime" readonly />
    <div>
        <strong>Total Distance</strong>
    </div>
    <input type="text" id="output" readonly />
    <div>
        <strong>Total Price (RM)</strong>
    </div>
    <input type="text" id="price" readonly />

    <!-- Add a map container -->
    <div id="map" style="height: 400px;"></div>

    <script>
        var _originautocomplete = document.getElementById("originautocomplete");
        var _destinationautocomplete = document.getElementById("destinationautocomplete");

        var placeSearch, originautocomplete, destinationautocomplete, map, marker, selectedLocation;

        function initAutocomplete() {
            originautocomplete = new google.maps.places.Autocomplete(
                document.getElementById('originautocomplete'), {
                    fields: ["address_components", "geometry"],
                    types: ['street_address', 'point_of_interest']
                });

            originautocomplete.setComponentRestrictions({
                'country': ['MY'] // Change the country code to MY (Malaysia)
            });

            destinationautocomplete = new google.maps.places.Autocomplete(
                document.getElementById('destinationautocomplete'), {
                    fields: ["address_components", "geometry"],
                    types: ['street_address', 'point_of_interest']
                });

            destinationautocomplete.setComponentRestrictions({
                'country': ['MY'] // Change the country code to MY (Malaysia)
            });

            // Initialize the map
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 3.1390, lng: 101.6869 }, // Default center (Kuala Lumpur, Malaysia)
                zoom: 10 // Default zoom level
            });

            // Initialize marker
            marker = new google.maps.Marker({
                map: map,
                draggable: true, // Allow the marker to be draggable
                animation: google.maps.Animation.DROP // Add a drop animation to the marker
            });

            // Initialize selected location to 'departure' by default
            selectedLocation = 'departure';

            // Add a click event listener to the map to set locations
            google.maps.event.addListener(map, 'click', function (event) {
                setMarkerAndInputBox(event.latLng);
            });

        }

        function setLocation(locationType) {
            selectedLocation = locationType;

            // Enable or disable the arrival button based on the selected location
            if (selectedLocation === 'departure') {
                document.getElementById('arrivalButton').disabled = false;
            } else {
                document.getElementById('arrivalButton').disabled = true;
            }
        }

        function setMarkerAndInputBox(clickedLocation) {
            // Set the marker position to the clicked location
            marker.setPosition(clickedLocation);

            // Use reverse geocoding to get the address for the clicked location
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': clickedLocation }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        // Check if the location is within Malaysia
                        var addressComponents = results[0].address_components;
                        var isWithinMalaysia = addressComponents.some(function (component) {
                            return component.short_name === 'MY'; // 'MY' is the country code for Malaysia
                        });

                        if (isWithinMalaysia) {
                            // Insert the address into the selected input box
                            if (selectedLocation === 'departure') {
                                document.getElementById('originautocomplete').value = results[0].formatted_address;
                            } else if (selectedLocation === 'arrival') {
                                document.getElementById('destinationautocomplete').value = results[0].formatted_address;
                            }
                        } else {
                            alert('Please select a location within Malaysia.');
                        }
                    }
                }
            });
        }

function BookRide() {
    var origin = document.getElementById('originautocomplete').value;
    var destination = document.getElementById('destinationautocomplete').value;
    var transportType = document.getElementById('transportType').value;

    var geocoder = new google.maps.Geocoder();
    var service = new google.maps.DistanceMatrixService();

    service.getDistanceMatrix({
        origins: [origin],
        destinations: [destination],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false,
        avoidFerries: false
    }, function (response, status) {
        if (status === 'OK') {
            var distance = response.rows[0].elements[0].distance.value / 1000; // Convert to kilometers

            // Make an AJAX request to calculate the total price
            var xhr = new XMLHttpRequest();
            var url = 'calculate_price.php'; // Replace with the actual URL of the PHP script
            var params = 'distance=' + encodeURIComponent(distance) +
                '&transportType=' + encodeURIComponent(transportType);

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Calculate price based on the response
                            var price = response.price.toFixed(2);

                            // Calculate estimated arrival time (current time + fixed travel time)
                            var currentTime = new Date();
                            var travelTimeMinutes = Math.round(distance / 40 * 60); // Assuming an average speed of 40 km/h
                            var estimatedArrivalTime = new Date(currentTime.getTime() + (travelTimeMinutes * 60 * 1000));

                            // Format the estimated arrival time as a string (UTC +8)
                            var options = { timeZone: 'Asia/Kuala_Lumpur', hour12: false };
                            var estimatedArrivalTimeString = estimatedArrivalTime.toLocaleTimeString('en-US', options);

                            document.getElementById('arrivalTime').value = '' + estimatedArrivalTimeString;
                            document.getElementById('output').value = '' + distance.toFixed(2) + ' KM';
                            document.getElementById('price').value = 'RM' + price;
                        } else {
                            alert('Error calculating price: ' + response.message);
                        }
                    } else {
                        alert('Error calculating price');
                    }
                }
            };

            xhr.send(params);

        } else {
            alert('Error calculating distance: ' + status);
        }
    });

    document.getElementById('bookRideNow').disabled = false;
}


        function bookRideNow() {
            var origin = document.getElementById('originautocomplete').value;
            var destination = document.getElementById('destinationautocomplete').value;
            var transportType = document.getElementById('transportType').value;
            var estimatedArrivalTime = document.getElementById('arrivalTime').value;

            // Make an AJAX request to retrieve the transport_id
            var xhr = new XMLHttpRequest();
            var url = 'get_transport_id.php';
            var params = 'transport_type=' + encodeURIComponent(transportType);

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.transport_id) {
                            // Transport_id retrieved successfully, now proceed to book the ride
                            var transportId = response.transport_id;
                            var full_arrival_time = new Date().toISOString().slice(0, 11) + estimatedArrivalTime;

                            var bookXhr = new XMLHttpRequest();
                            var bookUrl = './transportbooking.php'; 
                            var bookParams = 'user_id=' + encodeURIComponent(<?php echo "'". $_SESSION['user_id']."'"; ?>) +
                                '&transport_id=' + encodeURIComponent(transportId) +
                                '&arrival_location=' + encodeURIComponent(destination) +
                                '&departure_location=' + encodeURIComponent(origin) +
                                '&arrival_time=' + encodeURIComponent(full_arrival_time) +
                                '&departure_time=' + encodeURIComponent(new Date().toISOString());

                            bookXhr.open('POST', bookUrl, true);
                            bookXhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                            bookXhr.onreadystatechange = function () {
                                if (bookXhr.readyState === 4) {
                                    if (bookXhr.status === 200) {
                                        var bookResponse = JSON.parse(bookXhr.responseText);
                                        if (bookResponse.success) {
                                            // Display a success message
                                            alert('Booking successful');

                                            // Redirect to index.php after a delay (e.g., 2 seconds)
                                            setTimeout(function () {
                                                window.location.href = '../index.php';
                                            }, 2000);
                                        } else {
                                            alert('Booking failed');
                                        }
                                    } else {
                                        alert('Error booking the ride');
                                    }
                                }
                            };

                            bookXhr.send(bookParams);
                        } else {
                            alert('Error retrieving transport ID');
                        }
                    } else {
                        alert('Error retrieving transport ID');
                    }
                }
            };

            xhr.send(params);
        }
    </script>
</body>

</html>
