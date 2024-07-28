<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-bottom: 20px;
        }
        .button-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="header">
            <h1>DELIVERY</h1>
        </div>
        <div class="content">
            <h4>Masukan Alamat Anda</h4>
            <div class="alamat">
                <br>
                <label>Alamat:</label>
                <input type="text" id="alamat" value="">
            </div>
            <div id="map"></div>
            <div class="button-container">
                <button id="selanjutnya" class="btn btn-primary ml-2">Selanjutnya</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-6.900530969441438, 107.61808965446419], 12); // Set view to Bandung

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([-6.900530969441438, 107.61808965446419], { draggable: true }).addTo(map)
            .bindPopup('Lokasi Saya')
            .openPopup();

        // Function to update address input based on marker position
        function updateAddress(latlng) {
            var lat = latlng.lat.toFixed(6);
            var lng = latlng.lng.toFixed(6);
            var address = '';

            // Reverse geocode using Nominatim
            $.getJSON('https://nominatim.openstreetmap.org/reverse?format=json&lat=' + lat + '&lon=' + lng)
                .done(function(data) {
                    if (data && data.display_name) {
                        address = data.display_name;
                        $('#alamat').val(address);
                    }
                })
                .fail(function() {
                    console.log('Reverse geocoding failed.');
                });
        }

        // Update marker position and address on map click
        map.on('click', function(e) {
            marker.setLatLng(e.latlng)
                .bindPopup('Custom Location')
                .openPopup();

            updateAddress(e.latlng);
        });

        // Update address when marker is dragged
        marker.on('dragend', function(e) {
            updateAddress(marker.getLatLng());
        });

        // Event listener for the address input
        $('#alamat').on('input', function() {
            var address = $(this).val();
            geocodeAddress(address).done(function(data) {
                if (data.length > 0) {
                    var latLng = [data[0].lat, data[0].lon];
                    marker.setLatLng(latLng)
                        .bindPopup(address)
                        .openPopup();

                    map.setView(latLng, 13);
                }
            }).fail(function() {
                console.log('Geocoding service failed.');
            });
        });

        // Function to geocode address using Nominatim
        function geocodeAddress(address) {
            return $.getJSON('https://nominatim.openstreetmap.org/search?format=json&q=' + address);
        }

        // Debounce function to limit the rate of geocoding requests
        function debounce(func, delay) {
            let timeout;
            return function() {
                const context = this;
                const args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(context, args), delay);
            };
        }

        // Event listener for the next button
        $('#selanjutnya').on('click', function() {
            var address = $('#alamat').val();
            window.location.href = '/nextpage?address=' + encodeURIComponent(address);
        });

        // Initialize address input based on default marker position
        updateAddress(marker.getLatLng());
    </script>
</body>
</html>
