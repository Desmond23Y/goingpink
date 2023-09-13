<!DOCTYPE html>
<html>

<head>
    <title>Distance Calculator</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS7LY-BaBKUS0xIRTNJKXtfsLEZv_5OG8&libraries=places&callback=initAutocomplete" async defer></script>
</head>

<body>
    <?php 
        include('navi_bar.php');
    <?
    <div>
        <h2>
            Departure Location
        </h2>
    </div>
    <div id="locationField">
        <input id="originautocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
        <!-- Button to set departure location on the map -->
        <button onclick="setLocation('departure')">Set Departure</button>
    </div>

    <div>
        <h2>
            Arrival Location
        </h2>
    </div>
    <div id="locationField">
        <input id="destinationautocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
        <!-- Button to set arrival location on the map -->
        <button id="arrivalButton" onclick="setLocation('arrival')" disabled>Set Arrival</button>
    </div>
    <br>
    <div>
        <select id="transportType">
            <option value="Van">Van</option>
            <option value="6-seater car">6-seater car</option>
            <option value="4-seater car">4-seater car</option>
            <option value="Luxury 4-seater car">Luxury 4-seater car</option>
            <option value="Luxury 6-seater car">Luxury 6-seater car</option>
        </select>
    </div>
    <br>
    <div>
        <input type='button' value="Calculate Price and Time" onclick="BookRide()"></input>
    </div>
    <br>
    <div>
        <strong>Estimated Arrival Time (UTC +8)</strong>
    </div>
    <input type="text" id="arrivalTime" readonly>
    <div>
        <strong>Total Distance</strong>
    </div>
    <input type="text" id="output" readonly>
    <div>
        <strong>Total Price (RM)</strong>
    </div>
    <input type="text" id="price" readonly>

    <!-- Add a map container -->
    <div id="map" style="height: 400px;"></div>

    <script>
        var placeSearch, originautocomplete, destinationautocomplete, map, marker, selectedLocation;

        function initAutocomplete() {
            originautocomplete = new google.maps.places.Autocomplete(
                document.getElementById('originautocomplete'), {
                    types: ['geocode']
                });

            originautocomplete.setComponentRestrictions({
                'country': ['MY'] // Change the country code to MY (Malaysia)
            });

            destinationautocomplete = new google.maps.places.Autocomplete(
                document.getElementById('destinationautocomplete'), {
                    types: ['geocode']
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
                    var pricePerKm = 1.5; // Default price per km

                    // Adjust the price per km based on the selected transport type
                    if (transportType === 'Van') {
                        pricePerKm = 2.0;
                    } else if (transportType === '6-seater car') {
                        pricePerKm = 1.8;
                    } else if (transportType === '4-seater car') {
                        pricePerKm = 1.6;
                    } else if (transportType === 'Luxury 4-seater car') {
                        pricePerKm = 2.2;
                    } else if (transportType === 'Luxury 6-seater car') {
                        pricePerKm = 2.5;
                    }
                    

                    var price = (distance * pricePerKm).toFixed(2); // Calculate price

                    // Calculate estimated arrival time (current time + fixed travel time)
                    var currentTime = new Date();
                    var travelTimeMinutes = Math.round(distance / 40 * 60); // Assuming an average speed of 40 km/h
                    var estimatedArrivalTime = new Date(currentTime.getTime() + (travelTimeMinutes * 60 * 1000));

                    // Format the estimated arrival time as a string (UTC +8)
                    var options = { timeZone: 'Asia/Kuala_Lumpur', hour12: false };
                    var estimatedArrivalTimeString = estimatedArrivalTime.toLocaleTimeString('en-US', options);

                    document.getElementById('arrivalTime').value = 'Estimated Arrival Time (UTC +8): ' + estimatedArrivalTimeString;
                    document.getElementById('output').value = 'Total Distance: ' + distance.toFixed(2) + ' KM';
                    document.getElementById('price').value = 'Total Price (RM): ' + price;
                } else {
                    alert('Error calculating distance: ' + status);
                }
            });
        }
    </script>
</body>

</html>

