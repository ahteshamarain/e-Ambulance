<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Map with Hospital Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #googleMap {
            width: 100%;
            height: 400px;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
        }
        .search-container {
            text-align: center;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<h1>Google Map with Hospital Search</h1>

<div class="search-container">
    <input type="text" id="hospitalSearch" placeholder="Search for hospitals" required>
</div>

<div id="googleMap"></div>

<script>
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(24.9273, 67.0330), // Karachi coordinates
        zoom: 10, // Set an appropriate zoom level
        mapTypeId: google.maps.MapTypeId.ROADMAP // Set the map type
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

    var autocomplete = new google.maps.places.Autocomplete(document.getElementById('hospitalSearch'), {
        types: ['establishment'], // To include hospitals
        componentRestrictions: { country: 'pk' } // Restrict to Pakistan
    });

    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            console.log("No details available for input: '" + place.name + "'");
            return;
        }

        // Center the map on the selected hospital
        map.setCenter(place.geometry.location);
        map.setZoom(15); // Zoom in on the selected hospital

        // Optionally, add a marker for the selected hospital
        var marker = new google.maps.Marker({
            position: place.geometry.location,
            map: map,
            title: place.name
        });

        console.log("Selected Hospital:", place.name, place.geometry.location);
    });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOfoQEnSeEMhNmp8NI6ZZGulHloVCIZUA&libraries=places&callback=myMap" async defer></script>

</body>
</html>
