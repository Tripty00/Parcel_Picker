<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Map</title>
    <style>
        #map {
            height: 100vh;
            width: 100%;
        }
    </style>
    <script>
        function initMap() {
            const initialLocation = { lat: -34.397, lng: 150.644 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
                center: initialLocation,
            });

            const marker = new google.maps.Marker({
                position: initialLocation,
                map: map,
                title: "Your Location"
            });

            // Example update logic
            setInterval(() => {
                const newLocation = {
                    lat: initialLocation.lat + (Math.random() - 0.5) * 0.01,
                    lng: initialLocation.lng + (Math.random() - 0.5) * 0.01
                };
                marker.setPosition(newLocation);
                map.setCenter(newLocation);
            }, 5000);
        }
    </script>
</head>
<body>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
</body>
</html>
