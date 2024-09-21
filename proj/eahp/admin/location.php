<!DOCTYPE html>
<html>
<head>
    <title>Car GPS Tracker</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOfoQEnSeEMhNmp8NI6ZZGulHloVCIZUA&callback=initMap"></script>
    <script>
    function initMap() {
        // Define source and destination coordinates
        var sourceLocation = { lat: 24.9288595, lng: 67.0338113 };
        var destinationLocation = { lat: 25.9288594, lng: 68.0338113 };

        // Create the map, centered at the source location
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7, // Adjust zoom level as needed
            center: sourceLocation
        });

        // Create a DirectionsService object to use the route method
        var directionsService = new google.maps.DirectionsService();
        // Create a DirectionsRenderer object to display the route
        var directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        // Define the route from source to destination
        var request = {
            origin: sourceLocation, // Starting point
            destination: destinationLocation, // End point
            travelMode: 'DRIVING' // Can be changed to 'WALKING', 'BICYCLING', etc.
        };

        // Request for directions
        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(result);
            }
        });

        // Marker for the car, initially placed at the source location
        var carMarker = new google.maps.Marker({
            position: sourceLocation,
            map: map,
            title: "Car's Starting Location"
        });

        // Function to simulate car movement by updating the marker's position
        var step = 0;
        var steps = 500; // Total number of steps to animate the car
        var latIncrement = (destinationLocation.lat - sourceLocation.lat) / steps;
        var lngIncrement = (destinationLocation.lng - sourceLocation.lng) / steps;

        function moveCar() {
            if (step <= steps) {
                var newLat = sourceLocation.lat + latIncrement * step;
                var newLng = sourceLocation.lng + lngIncrement * step;
                var newPosition = new google.maps.LatLng(newLat, newLng);
                carMarker.setPosition(newPosition);
                map.setCenter(newPosition);
                step++;
                requestAnimationFrame(moveCar); // Move the car every frame
            }
        }

        // Start the car movement
        moveCar();
    }
    </script>
</head>
<body onload="initMap()">

<h3>Car's Route from Source to Destination</h3>
<!-- The div element for the map -->
<div id="map" style="height: 500px; width: 100%;"></div>

</body>
</html>