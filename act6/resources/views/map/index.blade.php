<!DOCTYPE html>
<html>
<head>
    <title>Google Maps in Laravel</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">My Google Map</h2>
    <div id="map"></div>

    <script>
        function initMap() {
            const location = { lat: 14.5995, lng: 120.9842 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: location,
            });
            const marker = new google.maps.Marker({
                position: location,
                map: map,
            });
        }
    </script>

    <script async
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
</script>

</body>
</html>
