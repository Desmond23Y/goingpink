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
        <input type='button' value="Find traveled distance" onclick="CalculatedRecommededDistance()"></input>
    </div>
    <br>
    <div>
        <strong>Recommended Route Total Distance</strong>
    </div>
    <div id="outputRecommended"></div>
    <div>
        <strong>Longest Route Total Distance</strong>
    </div>
    <div id="output"></div>

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
                        // Insert the address into the selected input box
                        if (selectedLocation === 'departure') {
                            document.getElementById('originautocomplete').value = results[0].formatted_address;
                        } else if (selectedLocation === 'arrival') {
                            document.getElementById('destinationautocomplete').value = results[0].formatted_address;
                        }
                    }
                }
            });
        }

        function CalculatedRecommededDistance() {
            CalculateDistanceforAllAlternativeRoutes();

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
                var originList = response.originAddresses;
                var destinationList = response.destinationAddresses;
                var outputDiv = document.getElementById('outputRecommended');
                outputDiv.innerHTML = '';
                // Display distance recommended value
                for (var i = 0; i < originList.length; i++) {
                    var results = response.rows[i].elements;
                    for (var j = 0; j < results.length; j++) {
                        outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
                            ': ' + results[j].distance.text + ' in ' +
                            results[j].duration.text + '<br>';
                    }
                }
            });
        }

        function CalculateDistanceforAllAlternativeRoutes() {
            var directionsService = new google.maps.DirectionsService();
            var start = document.getElementById('originautocomplete').value;
            var end = document.getElementById('destinationautocomplete').value;
            var method = 'DRIVING';
            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.TravelMode.DRIVING,
                provideRouteAlternatives: true,
                unitSystem: google.maps.UnitSystem.METRIC,
                optimizeWaypoints: true
            };

            directionsService.route(request, function (response, status) {
                var routes = response.routes;
                var distances = [];
                for (var i = 0; i < routes.length; i++) {
                    var distance = 0;
                    for (var j = 0; j < routes[i].legs.length; j++) {
                        distance += routes[i].legs[j].distance.value;
                    }
                    // Convert into kilometer
                    distances.push(distance / 1000);
                }
                // Get all the alternative distances
                var maxDistance = distances.sort(function (a, b) {
                    return a - b;
                });
                // Display distance having the highest value
                var outputDiv = document.getElementById('output');
                outputDiv.innerHTML = Math.round(maxDistance[routes.length - 1]) + " KM";
            });
        }
    </script>
</body>

</html>

