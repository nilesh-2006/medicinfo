<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Map</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        #map {
            height: 500px;
            width: 100%;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .location-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        #distance-info {
            padding: 10px;
            background-color: #e9f7fe;
            border-radius: 5px;
            margin-top: 10px;
        }
        .btn-back {
            margin-top: 20px;
        }
        .map-error {
            padding: 20px;
            background-color: #f8d7da;
            border-radius: 5px;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="location-header">
            <h3 id="location-title">Medical Store Location</h3>
            <p class="mb-1"><strong>Address:</strong> <span id="address-details"></span></p>
            <p class="mb-1"><strong>Contact:</strong> <span id="contact-details"></span></p>
            <div id="distance-info">
                <p class="mb-1"><strong>Distance from your location:</strong> <span id="distance-value">Calculating...</span></p>
                <p class="mb-1"><strong>Approximate travel time:</strong> <span id="duration-value">Calculating...</span></p>
            </div>
        </div>
        
        <div id="map-container">
            <div id="map"></div>
            <div id="map-error" class="map-error" style="display:none;"></div>
        </div>
        
        <div class="text-center btn-back">
            <a href="javascript:history.back()" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Back to Results
            </a>
        </div>
    </div>

    <script>
        // Configuration - Replace with your actual API key
        const config = {
            googleMapsApiKey: 'AIzaSyBzBq_ZWy9IhXZxi653yV7VROvul3Avgy0',
            libraries: 'places,geocoding' // Removed distanceMatrix as it's not a separate library
        };

        // Global flag to prevent multiple loads
        let googleMapsLoaded = false;
        let mapInitializationAttempted = false;

        // Display location details from URL parameters
        function displayLocationDetails() {
            const urlParams = new URLSearchParams(window.location.search);
            document.getElementById('location-title').textContent = 
                urlParams.get('name') || 'Medical Store';
            document.getElementById('address-details').textContent = 
                urlParams.get('address') || 'Address not available';
            document.getElementById('contact-details').textContent = 
                urlParams.get('contact') || 'Contact not available';
        }

        // Load Google Maps API with proper error handling
        function loadGoogleMapsAPI() {
            return new Promise((resolve, reject) => {
                if (googleMapsLoaded) {
                    resolve();
                    return;
                }

                const script = document.createElement('script');
                script.src =` https://maps.googleapis.com/maps/api/js?key=${config.googleMapsApiKey}&libraries=${config.libraries}&callback=initMap`;
                script.async = true;
                script.defer = true;
                script.onerror = () => {
                    reject(new Error('Failed to load Google Maps API'));
                };

                window.initMap = () => {
                    googleMapsLoaded = true;
                    resolve();
                };

                document.head.appendChild(script);
            });
        }

        // Main initialization function
        async function initializeMap() {
            if (mapInitializationAttempted) return;
            mapInitializationAttempted = true;

            try {
                // First display the static location info
                displayLocationDetails();

                // Then load the API
                await loadGoogleMapsAPI();

                // Now safe to use google.maps
                const urlParams = new URLSearchParams(window.location.search);
                const locationQuery = urlParams.get('location') || urlParams.get('address') || 'New York';

                const geocoder = new google.maps.Geocoder();
                const destinationPlace = await new Promise((resolve, reject) => {
                    geocoder.geocode({ address: locationQuery }, (results, status) => {
                        if (status === 'OK' && results[0]) {
                            resolve(results[0]);
                        } else {
                            reject(new Error('Geocode failed: ' + status));
                        }
                    });
                });

                const map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: destinationPlace.geometry.location,
                    mapTypeControl: true,
                    streetViewControl: true
                });

                new google.maps.Marker({
                    map: map,
                    position: destinationPlace.geometry.location,
                    title: urlParams.get('name') || 'Medical Store'
                });

                // Try to get user's location for distance calculation
                try {
                    const userPosition = await new Promise((resolve, reject) => {
                        navigator.geolocation.getCurrentPosition(resolve, reject, {
                            timeout: 5000
                        });
                    });

                    const userPos = {
                        lat: userPosition.coords.latitude,
                        lng: userPosition.coords.longitude
                    };

                    new google.maps.Marker({
                        map: map,
                        position: userPos,
                        title: "Your Location",
                        icon: {
                            url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                        }
                    });

                    // Distance Matrix is part of the core API, no need for library
                    const service = new google.maps.DistanceMatrixService();
                    const response = await new Promise((resolve, reject) => {
                        service.getDistanceMatrix({
                            origins: [userPos],
                            destinations: [destinationPlace.geometry.location],
                            travelMode: 'DRIVING',
                            unitSystem: google.maps.UnitSystem.METRIC
                        }, (response, status) => {
                            if (status === 'OK') {
                                resolve(response);
                            } else {
                                reject(new Error('DistanceMatrix failed: ' + status));
                            }
                        });
                    });

                    if (response.rows[0].elements[0].status === 'OK') {
                        document.getElementById('distance-value').textContent = 
                            response.rows[0].elements[0].distance.text;
                        document.getElementById('duration-value').textContent = 
                            response.rows[0].elements[0].duration.text;
                    }
                } catch (error) {
                    console.warn("User location not available:", error);
                    document.getElementById('distance-value').textContent = 
                        "Enable location access to see distance";
                    document.getElementById('duration-value').textContent = "Not available";
                }

            } catch (error) {
                console.error("Map initialization failed:", error);
                document.getElementById('map').style.display = 'none';
                const errorElement = document.getElementById('map-error');
                errorElement.style.display = 'block';
                errorElement.textContent =` Error loading map: ${error.message}`;
                
                if (error.message.includes('InvalidKey') || error.message.includes('API key')) {
                    errorElement.innerHTML += '<br><br>Please check your Google Maps API key configuration.';
                }
            }
        }

        // Start the initialization when the page loads
        document.addEventListener('DOMContentLoaded', initializeMap);
    </script>
</body>
</html>