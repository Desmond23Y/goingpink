<!DOCTYPE html>
<html>

<head>
    <title>Distance Calculator</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS7LY-BaBKUS0xIRTNJKXtfsLEZv_5OG8&libraries=places&callback=initAutocomplete" async defer></script>
</head>

<body>
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
        <input type='button' value="Book a ride now" onclick="BookRide()"></input>
    </div>
    <br>
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
            CalculateDistance();

            var origin = document.getElementById('originautocomplete').value;
            var destination = document.getElementById('destinationautocomplete').value;

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
                    var price = (distance * 0.25).toFixed(2); // Calculate price (RM0.25 per km)
                    document.getElementById('output').innerHTML = 'Total Distance: ' + distance.toFixed(2) + ' KM';
                    document.getElementById('price').innerHTML = 'Total Price (RM): ' + price;
                } else {
                    alert('Error calculating distance: ' + status);
                }
            });
        }
    </script>
</body>

</html>
